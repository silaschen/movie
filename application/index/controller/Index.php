<?php
namespace app\index\controller;
use think\Db;
use think;
use think\Request;
use app\index\controller\Common;

class Index extends Common
{
	public function playonline(){
		$id = input('id');
		$video = Db::name('video')->where(['id'=>$id])->find();
			$this->assign('webserver',\Think\Config::get('WEBSERVER')."/"); $this->assign('video',$video);
		$this->UpdateVideoView($id);
		$recommend = Db::query("select id,title from video where cate=2 and id not in ($id) order by view desc limit 8");
		return $this->fetch('playonline',['recommend'=>$recommend]);
	}


    public function index(){
    	//首页大图轮播
		$slides = Db::name('slides')->select();
		$this->assign('slides',$slides);

		//首页公告

		$notice = Db::query("select * from notice order by id desc limit 6");
		$this->assign('notice',$notice);
		var_dump($notice);

		//轮播电影
		$movie = Db::name('video')->where(['cate'=>1])->select();
		$this->assign('slidetwo',$movie);


		//正在热映，本周，即将热映
		$weekfinal = strtotime(date('Y-m-d', (time() + (7 - (date('w') == 0 ? 7 : date('w'))) * 24 * 3600+86400)));
		$day = strtotime(date('Y-m-d',time()));
		$time = $day+86400;
		$now=$week=$will = array();
		foreach($movie as $k=>$v){
			if($v['publishtime'] <$time && $v['publishtime']>= $day){
				$v['publishtime'] = date('Y-m-d',$v['publishtime']);
				$now[] = $v;

			}else if($v['publishtime'] >= $time && $v['publishtime'] < $weekfinal){
					$v['publishtime'] = date('Y-m-d',$v['publishtime']);
					 $week[] = $v;

			}else if($v['publishtime']>=$weekfinal){
					$v['publishtime'] = date('Y-m-d',$v['publishtime']);
					 $will[] = $v;
			}

		}

		//博客
		$redis = \redisObj\redisTool::getRedis();
	
		if($redis->get('blogindex')){

			$blog = json_decode($redis->get('blogindex'),true);
		}else{

			$blog = Db::query("select * from blog order by addtime desc limit 3");
			$redis->setkey('blogindex',3600*24,json_encode($blog));
		}

		
		//在线视频
		$online = Db::name('video')->where(['cate'=>2])->select();
		$this->assign(['now'=>$now,'week'=>$week,'will'=>$will,'day'=>$day,'blog'=>$blog,'online'=>$online]);	
		$this->assign('webserver',\Think\Config::get('WEBSERVER')."/");
		//top moview
		$top_total = Db::query("select sum(view) as total from video where cate=1");
		$top = Db::query("select id,title,view from video where cate=1 order by view desc limit 6");
		$this->assign(['top'=>$top]);

		return $this->fetch('index');
    }
	


    //注册
	public function register(){
			$data = \think\Request::instance()->post();
			$data['password'] = md5($data['password']);
			$data['addtime'] = time();
			$db = Db::name('user')->insert($data);
			if($db){
				exit(json_encode(['code'=>1]));
			}else{
				exit(json_encode(['code'=>0]));
			}
		
	}


	//login
	public function login(){
		$email =\think\Request::instance()->post('email');
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
	//	\redisObj\redisTool::getRedis()->lpush('loginuser',$user['id']);
	}



	/**
	 *购票详情页
	*/
	public function selectshow(){
		$id = input('id');
		$film = Db::query("select * from video where id='$id'");
		$sql = "select b.id, b.time,b.cinemaid,b.btime,b.etime,c.name,c.address from  tickets b  JOIN cinemas c ON b.cinemaid=c.id where b.videoid='$id'";
		$res = Db::query($sql);
		foreach($res as $k=>$v){
			$res[$k]['time']= json_decode($v['time']);
		}
			$this->UpdateVideoView($id); $this->assign('moviedates',$res);
		$this->assign('film',$film);
		$this->assign('webserver',\Think\Config::get('WEBSERVER')."/");
		return $this->fetch('selectshow');
	}
	
	//下单页
	public function payment(){
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
		}else{
			$data = Request::instance()->post();
			var_dump($data);
		

		}

	}




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
		$data['status'] = 2;
		$data['payinfo'] = json_encode(['banknum'=>$data['banknum'],'bankname'=>$data['bankname']]);
		$data['orderid'] = md5($data['uid'].$data['money'].$data['videoid'].time());
		unset($data['bankname']);
		unset($data['banknum']);
		Db::name('film_order')->insert($data);
		exit(json_encode(['code'=>1,'msg'=>'下单成功']));
	}


	//blog
	public function blog(){
		$blogs = Db::query("select * from blog order by addtime desc");
		$this->assign('blogs',$blogs);
		$this->assign('webserver',\think\Config::get('WEBSERVER')."/");
		return $this->fetch('blog');
	}

	//movies
	public function movies(){
		return $this->fetch('movies');
	}
	

	//读博客
	public function readblog(){
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
     * taglist
     */
    public function taglist(){
    	$this->title= "tag list";
    	$list = Db::name('tag')->order('see desc,count desc')->select();
    	$style = [
    	"color:red;","color:pink","color:yellow;","color:green","color:blue","color:purple","color:#454545"
    	];
    	$this->assign('style',$style);
    	$this->assign('list',$list);
    	return $this->fetch('taglist',['title'=>'Tags']);
    }

    /**
     * video list
     */
    public function videolist(){
    	$p = input('p') ? input('p'):1;
    	$tag = input('tag');
		if($tag){
			$tagid = Db::name('tag')->where(['tag'=>$tag])->value('id');
			$videoid = Db::name('video_tag')->where(['tagid'=>$tagid])->select();
			$video = array_column($videoid, 'videoid');
			$map['id'] = array('in',$video);
		}   
		$map['status'] = 1;
		$model = Db::name('video');
		$list = $model
		->where($map)->paginate(6,false,['query' => request()->param()])->toArray();
		// 获取分页显示
		$page = $model
        ->where($map)->paginate(6,false,['query' => request()->param()])->render();

		// 模板变量赋值
		$this->assign('list', $list);
		$this->assign('page', $page);
		return $this->fetch('videolist',['title'=>$tag?$tag:"videolist"]);
    }

    //公告阅读
    public function readnotice(){
    	$id = input('id');
    	$notice = Db::query("select * from notice where id=$id")[0];
    	return $this->fetch('readnotice',['notice'=>$notice]);
    }


    public function sendm(){
        $body = "please click the link below to finish check"."\n"."http://www.liondog.cn";
        var_dump($this->sendmail('chensiwei1@outlook.com','CHECK account',$body));
    }






}
