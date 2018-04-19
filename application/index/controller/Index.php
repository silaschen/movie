<?php
namespace app\index\controller;
use think\Db;
use think;
use think\Request;
use app\index\controller\Common;

class Index extends Common
{
	/**
	*主页函数
	*主要是去数据库请求各个模块数据
	*Db::query()  数据库查询sql执行
	*/
    public function index(){
    	//导航推荐,及在线影视推荐
    	$this->navdata();
		//首页大图轮播，公告，轮播购票，在线视频
		list($slides,$notice,$movie,$online,$top) = self::FetchData();
		//正在热映，本周，即将热映
		list($now,$week,$will) = self::buydata($movie);
		//博客排行数据
		$blog = self::Blogdata();
		//传递数据
		$this->assign(array(
			'slides'=>$slides,
			'notice'=>$notice,
			'slidetwo'=>$movie,
			'blog'=>$blog,
			'now'=>$now,
			'week'=>$week,
			'will'=>$will,
			'online'=>$online,
			'top'=>$top
		));

		//渲染视图
		return $this->fetch('index');
    }


    /**
    *首页所需数据，封装私有函数
    */
    private static function FetchData(){
    	$slides = Db::query('select * from slides order by id desc');//查询轮播图

		//首页公告
		$notice = Db::query("select * from notice order by id desc limit 6");//选取最新6条公告信息

		//轮播购票
		$movie = Db::query("select * from video where cate=1 order by id desc limit 8");//轮播购票，选取最新的8条电影票
		//在线视频,6条
		$online = Db::query("select * from video where cate=2 order by id desc limit 6");
		$top = Db::query("select id,title,view from video where cate=1 order by view desc limit 6");
        return array($slides,$notice,$movie,$online,$top);

    }



    /**
    *首页所需数据，封装私有函数
    */
    private static function buydata($movie){
    	$weekfinal = strtotime(date('Y-m-d', (time() + (7 - (date('w') == 0 ? 7 : date('w'))) * 24 * 3600+86400)));//本周末24:00时间戳

		$daystart = strtotime(date('Y-m-d',time()));//今天的0:00时间戳

		$dayover = $daystart+86400;//今天24:00时间戳

		$now=$week=$will = array();
		foreach($movie as $k=>$v){
			if($v['publishtime'] <$dayover && $v['publishtime']>= $daystart){
				$v['publishtime'] = date('Y-m-d',$v['publishtime']);
				$now[] = $v;//今日正在放映

			}else if($v['publishtime'] >= $dayover && $v['publishtime'] < $weekfinal){
					$v['publishtime'] = date('Y-m-d',$v['publishtime']);
					 $week[] = $v;//本周放映

			}else if($v['publishtime']>=$weekfinal){
					$v['publishtime'] = date('Y-m-d',$v['publishtime']);
					 $will[] = $v;//即将放映
			}

		}
		return array($now,$week,$will);
    }


       /**
    *首页所需数据，封装私有函数,博客排行数据
    */
    private static function Blogdata(){
    	//博客，这一块采用了redis存储，redis的好处请百度。会首先从redis中读取博客信息，若存在直接读取，若不存在则从数据库中读取，并写入redis。
		$redis = \redisObj\redisTool::getRedis();//创建一个redis的对象
		if($redis->get('blogindex')){//redis中若存在blog的信息
			$blog = json_decode($redis->get('blogindex'),true);
		}else{
			//redis中不存在，数据库读取5条
			$blog = Db::query("select * from blog order by addtime desc limit 5");
			//写入redis
			$redis->setkey('blogindex',3600,json_encode($blog));
		}

		//读取博客的点赞数据
		$daystart = strtotime(date("Y-m-d",time()));
		$dayover = $daystart+24*3600;
		for ($i=0; $i < count($blog); $i++) {
			$countsql = "select count(*) as total from likes where blogid={$blog[$i]['id']}";
			$blog[$i]['likecount'] = Db::query($countsql)[0]['total'];
			//查询对于目前登录用户今天是否点赞
			$existsql =    sprintf("select * from likes where userid=%d and blogid=%d and addtime between %d and %d" ,\think\Session::get('login_uid'),$blog[$i]['id'],$daystart,$dayover);
			$existstatus=Db::query($existsql);
			$blog[$i]['likestatus'] = \think\Session::get('login_uid') ? ($existstatus?1:0):0;
		}
		return $blog;
    }


    //搜索,函数，前端的视频搜索会发起ajax请求到这个函数，很简单一个sql like模糊查询，将结果返回给前端，前端js将结果遍历展示即可
    public function search(){

    		$key=input('keytext');
    		$data = Db::query(sprintf("select * from video where title like '%%%s%%' and cate=2",$key));
    		//%%在''中表示一个%
    		if(empty($data)) exit(json_encode(['code'=>-1]));
    		exit(json_encode(['code'=>1,'list'=>$data]));
    }



    //注册,exit,josn_encode($param)
	public function register(){
			$data = \think\Request::instance()->post();//获取前端传过来的的值，数组
			//格式判断，不能随意输入，这里就很好玩儿了，不能用户输个什么就是什么
			//主要使用正则表达式进行过滤，正则表达式是很大一部分，可以在写论文的时候，用到很多了
			$user_pattern = "/^[A-Za-z]+\w*/";
			if(!preg_match($user_pattern, $data['nickname'])){
				exit(json_encode(['code'=>-10,'msg'=>'用户名格式不对，再试一次']));
			}

			$phone_pattern = "/^1(3|5|7|9|6|8)\d{9}$/";
			if(!preg_match($phone_pattern, $data['phone'])){
				exit(json_encode(['code'=>-10,'msg'=>'请输入11位大陆手机号码']));
			}

			$data['password'] = md5($data['password']);
			$findsql = "SELECT * from user where nickname='{$data['nickname']}'";
			//Db::query($sql)  执行sql语句
			$status = Db::query($findsql);
			if($status){
				exit(json_encode(array('code'=>-10,'msg'=>'此昵称已被注册')));
			}
			//插入sql
			$addsql=sprintf("insert into user(nickname,email,phone,password,sex,addtime) VALUES ('%s','%s','%s','%s','%s','%s')",$data['nickname'],$data['email'],$data['phone'],$data['password'],$data['sex'],time());
			//执行插入sql语句
			$db = Db::execute($addsql);
			if($db){
				exit(json_encode(['code'=>1]));
			}else{
				exit(json_encode(['code'=>0]));
			}

	}


	//登录函数，session
	public function login(){
		$email = \think\Request::instance()->post('email');
		$password =\think\Request::instance()->post('password');
		$pwd = md5($password);
		$user = Db::query("select * from user where email='$email' AND password='$pwd'");
		if($user){
			$this->SetUserLogin($user);
			exit(json_encode(['code'=>1,'nickname'=>$user[0]['nickname']]));
		}else{

			exit(json_encode(['code'=>0]));
		}
	}


	//设置状态
	public function SetUserLogin($user){

		\think\Session::set('login_uid',$user[0]['id']);
		\think\Session::set('login_nick',$user[0]['nickname']);

	}



	/**
	 *购票详情页
	*/
	public function selectshow(){
		//导航推荐,及在线影视推荐
    	$this->navdata();//每个函数都要用，所以封装一个新的函数，复用即可

		$id = input('id');
		$film = Db::query("select * from video where id='$id'");
		$sql = "select b.id, b.time,b.cinemaid,b.btime,b.etime,c.name,c.address from  tickets b  JOIN cinemas c ON b.cinemaid=c.id where b.videoid='$id'";
		$res = Db::query($sql);
		foreach($res as $k=>$v){
			$res[$k]['time']= json_decode($v['time']);
			$res[$k]['ablebuy']  = ($v['etime']+86400)<time() ? false : true;
		}
		$this->UpdateVideoView($id);
		$this->assign('moviedates',$res);
		$this->assign('film',$film);
		$this->assign('webserver',\Think\Config::get('WEBSERVER')."/");
		return $this->fetch('selectshow');
	}

	//下单页
	public function payment(){
		//导航推荐,及在线影视推荐
    	$this->navdata();//每个函数都要用，所以封装一个新的函数，复用即可

		if(Request::instance()->isGet()){
			$vid = input('vid');
			$cid = input('cid');
			$tid = input('tid');
			$ticket = Db::name('tickets')->where(['id'=>$tid])->find();
			$time = input('time');
			$film = Db::name('video')->where(['id'=>$vid])->find();
			$cinema = Db::name('cinemas')->where(['id'=>$cid])->find();
			$this->assign(['cid'=>$cid,'film'=>$film,'time'=>$time,'cinema'=>$cinema,'ticket'=>$ticket]);
			$this->assign('webserver',\Think\Config::get('WEBSERVER')."/");
			return $this->fetch('payment');
		}

	}




	//检测是否登录
	//已登录返回true,否则false
	protected function LoginStstus(){
		if(\think\Session::get('login_uid') === null){
			return false;
		}
		return true;

	}



	//下单
	public function orderfilm(){

		if(!$this->LoginStstus()){
			exit(json_encode(['code'=>0,'msg'=>'未登录，请先登录再购票']));
		}
		$data = $_POST;
		$data['uid'] = \think\Session::get('login_uid');
		$data['money'] = Db::query("select price from video where id='{$data['videoid']}'")[0]['price'];
		$data['addtime'] = time();
		$data['status'] = 2;//支付无法演示，直接默认已付款
		$data['payinfo'] = json_encode(['banknum'=>$data['banknum'],'bankname'=>$data['bankname']]);
		$data['orderid'] = md5($data['uid'].$data['money'].$data['videoid'].time());
		unset($data['bankname']);
		unset($data['banknum']);
		Db::name('film_order')->insert($data);
		exit(json_encode(['code'=>1,'msg'=>'下单成功']));
	}


	//blog
	public function blog(){
		//导航推荐,及在线影视推荐
    	$this->navdata();//每个函数都要用，所以封装一个新的函数，复用即可
		$blog = Db::name('blog')->order('id desc')->paginate(6);
		$page = $blog->render();
		$hot = Db::query("select id,title from blog order by id asc limit 10");
		$this->assign('webserver',\think\Config::get('WEBSERVER')."/");
		return $this->fetch('blog',['blog'=>$blog,'page'=>$page,'hot'=>$hot]);
	}

	//movies
	public function movies(){
		return $this->fetch('movies');
	}


	//读博客
	public function readblog(){
		//导航推荐,及在线影视推荐
    	$this->navdata();//每个函数都要用，所以封装一个新的函数，复用即可
		$id = input('id');
		$blog = Db::name('blog')->where(array('id'=>$id))->find();
		$this->assign('blog',$blog);
		$comment = Db::query("select a.content,a.addtime,b.nickname from blog_comment a left join user b ON a.uid=b.id where a.blogid='{$id}'");
		$this->assign('webserver',\Think\Config::get('WEBSERVER')."/");
		$this->assign('comments',$comment);
		//最新博客
		$latest = Db::query("select id,title from blog order by addtime desc limit 15");
		$this->assign('latest',$latest);
		return $this->fetch('single');
	}



	//评论
	public function comment(){
		if(Request::instance()->isPost()){
			$data = Request::instance()->post();
			$sql = sprintf("insert into blog_comment (blogid,uid,content,addtime) VALUES (%d,%d,'%s',%d)",$data['blogid'],\think\Session::get('login_uid'),$data['comment'],time());
			$flag = Db::execute($sql);
			exit(json_encode(['code'=>1]));

		}
	}


	public function myticket(){
		//导航推荐,及在线影视推荐
    	$this->navdata();//每个函数都要用，所以封装一个新的函数，复用即可

		$sql = sprintf("select o.id,o.orderid,o.addtime,o.status,v.title,c.name,o.time,o.money,t.btime,t.etime from film_order o join video v ON o.videoid=v.id join cinemas c ON o.cinemaid=c.id join tickets t ON o.ticketid=t.id where o.uid=%d",\think\Session::get('login_uid'));
		$ticket = Db::query($sql);
		return $this->fetch('myticket',['ticket'=>$ticket]);
	}


	public function UpdateVideoView($id){
			$old = Db::name('video')->where(['id'=>$id])->find();
			$old = $old['view'];
			$sql = sprintf("update video set view='%d' where id='%d'",$old+1,$id);
			Db::execute($sql);
	}


    /**
     * video list
     */
    public function videolist(){
    	//导航推荐,及在线影视推荐
    	$this->navdata();//每个函数都要用，所以封装一个新的函数，复用即可

    	$p = input('p') ? input('p'):1;
	  	$map['cate'] = 2;
		$model = Db::name('video');
		$list = $model
		->where($map)->paginate(6,false,['query' => request()->param()])->toArray();
		// 获取分页显示
		$page = $model
        ->where($map)->paginate(6,false,['query' => request()->param()])->render();
		// 模板变量赋值
		$this->assign('list', $list);
		$this->assign('page', $page);
		return $this->fetch('videolist',['title'=>"videolist"]);
    }

    //公告阅读
    public function readnotice(){
    	//导航推荐,及在线影视推荐
    	$this->navdata();//每个函数都要用，所以封装一个新的函数，复用即可
    	$id = input('id');
    	$notice = Db::query("select * from notice where id=$id")[0];
    	$this->assign('notice',$notice);
    	return $this->fetch('readnotice');
    }


    /**
		*在线播放视频函数
		*拿到视频id，读取数据库此条视频信息，并把信息传递到前端
		*并读取8条视频信息，展示在播放器右侧
		*渲染playonline.html播放界面
    */
    public function playonline(){
    	//导航推荐,及在线影视推荐
    	$this->navdata();//每个函数都要用，所以封装一个新的函数，复用即可
		$id = input('id');
		$video = Db::name('video')->where(['id'=>$id])->find();
			$this->assign('webserver',\Think\Config::get('WEBSERVER')."/"); $this->assign('video',$video);
		$this->UpdateVideoView($id);
		$recommend = Db::query("select id,title from video where cate=2 and id not in ($id) order by view desc limit 8");
		return $this->fetch('playonline',['recommend'=>$recommend]);
	}


	/**
		*about,关于我们，
		*没有数据信息，纯静态界面展示
		*return $this->fetch('abput'),渲染about.html出来
	*/
    public function about(){
        return $this->fetch('about');
    }


    /**
		*公用方法，主要是获取4个购票信息，4个在线播放信息，并传递到前端视图，
		*由于很多方法都需要这两条信息，因此单独拿出封装函数

    */
    private  function navdata(){
    	$navbuy = Db::query("select * from video where cate=1 order by id desc limit 4");
    	$this->assign('navbuy',$navbuy);
    	$navonline = Db::query("select * from video where cate=2 order by id desc limit 4");
    	$this->assign('navonline',$navonline);
    }

/*
******************************************************************************************************************************************************************************************************************************************************************************************/
	/**
	*点赞函数
	*首先判断有没有登录，没登录不能点赞
	*再去判断当前用户今日是否有点赞记录，若存在记录则不能再次点赞
	*/
	public function like(){
		//判断登录状态，不登录不能点赞
		if(!\think\Session::get('login_uid')){
			exit(json_encode(array('code'=>-1,'msg'=>'你还没有登录')));

		}
		//strtotime() y-m-d 时间格式转化成时间戳

		$blogid = input('blogid');
		$daystart = strtotime(date("Y-m-d",time()));
		$dayover = $daystart+24*3600;

		$existsql=sprintf("select * from likes where userid=%d and blogid=%d and addtime between %d and %d" ,\think\Session::get('login_uid'),$blogid,$daystart,$dayover);
		$existstatus=Db::query($existsql);
		if($existstatus){
			exit(json_encode(array('code'=>-1,'msg'=>'您今天已经点赞')));
		}
		$sql = sprintf("INSERT INTO likes(blogid,userid,addtime) VALUES (%d,%d,%d)",$blogid,\think\Session::get('login_uid'),time());
		$status=Db::execute($sql);
		if ($status) {
			$sq = "select count(*) as total from likes where blogid=$blogid";
			$huizhi2=Db::query($sq);

			exit(json_encode(array('code'=>1,'likecount'=>$huizhi2[0]['total'])));

		}else{
			exit(json_encode(['code'=>0]));
		}

	}


	//登出
	public function logout(){
		//即消除登录相关session信息，有关session请百度
		\think\Session::set('login_uid',null);
		\think\Session::set('login_nick',null);
		exit(json_encode(array('code'=>1)));

	}
}
