<?php
namespace app\index\controller;
use think\Db;
use think;
use think\Request;
use app\index\controller\Common;

class Index extends Common
{

	public function test(){

		
	try {
            $img = "bb";
		throw new \Exception('error'); 
        } catch (\Exception $e) {
            $img =  "aaaaa";
        }
	var_dump($img);



	}
	

	public function playonline(){
		$id = input('id');
		$video = Db::name('video')->where(['id'=>$id])->find();
			$this->assign('webserver',\Think\Config::get('WEBSERVER')."/"); $this->assign('video',$video);
		$this->UpdateVideoView($id);
		return $this->fetch('playonline');
	}


    public function index(){
		$slides = Db::name('slides')->select();
		$this->assign('slides',$slides);
		$movie = Db::name('video')->where(['cate'=>1])->select();
		$this->assign('slidetwo',$movie);
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

		//blog
		$redis = \redisObj\redisTool::getRedis();
	
		if($redis->get('blogindex')){

			$blog = json_decode($redis->get('blogindex'),true);
		}else{

			$blog = Db::query("select * from blog order by addtime desc limit 3");
			$redis->setkey('blogindex',3600*24,json_encode($blog));
		}

		$logined = \redisObj\redisTool::getRedis()->range('loginuser',0,-1);
		//online
		$online = Db::name('video')->where(['cate'=>2])->select();
		$this->assign(['now'=>$now,'week'=>$week,'will'=>$will,'day'=>$day,'blog'=>$blog,'online'=>$online]);	
		$this->assign('webserver',\Think\Config::get('WEBSERVER')."/");
		//top moview
		$top_total = Db::query("select sum(view) as total from video where cate=1");
		$top = Db::query("select id,title,view from video where cate=1 order by view desc limit 6");
		$this->assign(['top'=>$top]);
		return $this->fetch('index');
    }
	

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
	


	public function SetUserLogin($user){
		
		\think\Session::set('login_uid',$user[0]['id']);
		\think\Session::set('login_nick',$user[0]['nickname']);
	//	\redisObj\redisTool::getRedis()->lpush('loginuser',$user['id']);
	}
	/**
	 *show select
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
	
	//payment
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
        for ($i=0; $i < count($list['data']); $i++) { 
             //get the thumb for video
                $list['data'][$i]['cover'] = $this->thumb($list['data'][$i]['key']);
        }	


		// 获取分页显示
		$page = $model
        ->where($map)->paginate(6,false,['query' => request()->param()])->render();

		// 模板变量赋值
		$this->assign('list', $list);
		$this->assign('page', $page);
		return $this->fetch('videolist',['title'=>$tag?$tag:"videolist"]);
    }

    public function play(){
    	$id = input('id');
    	$video = Db::name('video')->where(array('id'=>$id))->find();
        $video['url'] = $this->MakeUrl($video['key'],60*10);
        $video['cover'] = $this->thumb($video['key']);
        $video['detail'] = $this->detail($video['key']);


        $tags = Db::name('video_tag')->where(array('videoid'=>$id))->select();
        $tagarr = array_column($tags, 'tagid');
        // 启动事务
        Db::startTrans();
        try{
            //update video views
            Db::name('video')->where(array('id'=>$id))->setInc('views',1);
            Db::name('tag')->where(array('id'=>['in',$tagarr]))->setInc('see',1);
            // 提交事务
            Db::commit();    
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
        }
    	$tagvideo = Db::name('tag')->where(array('id'=>['in',array_column($tags, 'tagid')]))->select();
    	$this->assign('tags',$tagvideo);
    	$this->assign('video',$video);

        $videoarr = Db::name('video_tag')->where(['tagid'=>['in',$tagarr]])->select();
        $relation = Db::name("video")->where(['status'=>1,'id'=>['in',array_column($videoarr, 'videoid')]])->select();
        foreach ($relation as $key => $value) {
            $relation[$key]['cover'] = $this->thumb($value['key']);
        }
        $this->assign('list',$relation);
        $this->assign('title',$video['title']);
    	return $this->fetch('play');
    }


    private function MakeUrl($key,$time){
        $accessKey ="mjX2MSYCMedaxEWcbwLeroF3PxTtw6TAz-KEtgd";
        $secretKey = "6_z9j-xvludVNPrfMtlEv2YsRrOtnWe8m9TKxsu1";
        // 构建Auth对象
        $auth = new Auth($accessKey, $secretKey);
        // 私有空间中的外链 http://<domain>/<file_key>
        $baseUrl = 'http://p0ffo13yi.bkt.clouddn.com/'.$key;
        // 对链接进行签名
        $signedUrl = $auth->privateDownloadUrl($baseUrl,$time);
        return $signedUrl;
    }

    private function thumb($key){
        $accessKey ="mjX2MSYCMedaxEWcbawLeroF3PxTtw6TAz-KEtgd";
        $secretKey = "6_z9j-xvludVNPrfMtlEv2YsRrOtnWe8m9TKxsu1";
        // 构建Auth对象
        $auth = new Auth($accessKey, $secretKey);
        // 私有空间中的外链 http://<domain>/<file_key>
        $baseUrl = 'http://p0ffo13yi.bkt.clouddn.com/'.$key."?vframe/png/offset/35/w/700/h/480";
        // 对链接进行签名
        $signedUrl = $auth->privateDownloadUrl($baseUrl);
        return $signedUrl;

    }


    private function detail($key){
        $accessKey ="mjX2MSYCMedaxEWcbawLeroF3PxTtw6TAz-KEtgd";
        $secretKey = "6_z9j-xvludVNPrfMtlEv2YsRrOtnWe8m9TKxsu1";
        // 构建Auth对象
        $auth = new Auth($accessKey, $secretKey);
        // 私有空间中的外链 http://<domain>/<file_key>
        $baseUrl = 'http://p0ffo13yi.bkt.clouddn.com/'.$key."?avinfo";
        // 对链接进行签名
        $signedUrl = $auth->privateDownloadUrl($baseUrl);
        $detail = file_get_contents($signedUrl);
        $res = json_decode($detail,true);
        return $res['format'];

    }

    public function law(){
        return $this->fetch('law',['title'=>'law']);
    }

    public function sendm(){
        $body = "please click the link below to finish check"."\n"."http://www.liondog.cn";
        var_dump($this->sendmail('chensiwei1@outlook.com','CHECK account',$body));
    }



    private function registerweb($nickname,$password,$mail){
         $user = Db::name('users')->where(['name'=>$nickname])->find();
         if($user) exit(json_encode(['error'=>'nickname exists']));
         $user1 = Db::name('users')->where(['mail'=>$mail])->find();
           if($user1) exit(json_encode(['error'=>'mail exists']));
        $ret = Db::name('users')->insertGetId(['name'=>$nickname,'password'=>md5($password),'mail'=>$mail,'status'=>0,'logintime'=>time()]);
        if($ret){
            $link = "http://www.liondog.cn/index/index/verify?id=".$ret."&mail=".$mail;
            $body = "welcome to register swvideo and we hope our site may make you feel fine."."\n"."please click the link below to finish checking"."<br>"."<a href='{$link}'>".$link."</a>";
            $this->sendmail($mail,"Check account for SWvideo",$body);
            return true;
        }else{
            return false;
        }
    }


    public function verify(){
        $id = input('id');
        $mail = input('mail');
        $user = Db::name('users')->where(['id'=>$id,'mail'=>$mail])->find();
        if($user){
            Db::name('users')->where(['id'=>$id])->setField('status',1);
            exit("U check ur account successfully!!!NOw to login!");
        }else{
            exit("user does not exists");
        }

    }




}
