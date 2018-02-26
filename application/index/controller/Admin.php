<?php 
namespace app\index\controller;
use app\index\controller\Common;
use think\Request;
use think\Db;
/**
* admin management system
*/
class Admin extends Common
{
	#logout#
	public function logout(){
		session('sys_uid',null);
		session('sys_user',null);
		session('sys_role',null);
		$this->redirect('admin/login');
		exit();
	}

	#登录#
	public function login(){
		if(Request::instance()->isGet()){
			if(session('sys_uid')){
				$this->redirect('Admin/index');exit();
			}

			return $this->fetch('login',['title'=>'登录']);
		}else{
			$user = input('user');
			$pwd = input('pwd');
			if(!$user || !$pwd) exit(json_encode(['code'=>0]));
			$info = Db::name('admin')
			->where(['user'=>$user,'pwd'=>md5($pwd)])->find();
			if(!$info) exit(json_encode(['code'=>0,'msg'=>'用户不存在']));
			if($info['status']){
					session('sys_uid',$info['id']);
					exit(json_encode(['code'=>1,'msg'=>'successfully']));
			}else{
				exit(json_encode(['code'=>0]));
			}
		}
	}
	

	public function userlist(){

		$list = Db::name('user')->paginate(3);
		// 把分页数据赋值给模板变量list
		
		// 渲染模板输出
		return $this->fetch('userlist',['eq'=>1,'title'=>'list','list'=>$list]);
	}
	

	public function addslide(){
		if(\think\Request::instance()->isGet()){
				
		return $this->fetch('addslide',['eq'=>1,'title'=>'slide']);


		}else{
			$cover = input('cover');
			$flag = Db::name('slides')->insert(['cover'=>$cover]);
			exit(json_encode(['code'=>1]));
		}
	

	}

	//add cinemas
	public function addcinema(){

		if(Request::instance()->isGet()){
			
			return $this->fetch('addcinema',['eq'=>1,'title'=>'addcinema']);			

		}else{
			$data = Request::instance()->post();
			$data['pwd'] = md5($data['pwd']);
			Db::name('cinemas')->insert($data);
			exit(json_encode(['msg'=>'successfully']));


		}



	}




	#addblog#
	public function addblog(){
		if(Request::instance()->isGet()){
			$id = Request::instance()->param('id');
			$info = Db::name('blog')->where(['id'=>$id])->find();
			return $this->fetch('addblog',['title'=>'addblog','eq'=>2,'info'=>$info]);
		}else{
			$data = Request::instance()->post();
			if($data['id'] >0){
				Db::name('blog')->update($data,['id'=>$data['id']]);
			}else{
				$data['addtime'] =time();
				$data['author'] = 'admin';
				Db::name('blog')->insert($data);
			}
			
			exit(json_encode(['code'=>1,'msg'=>'成功']));

		}
	}

	#文章列表#
	public function essaylist(){
		if(Request::instance()->isGet()){

			$list = Db::name('blog')->where(['status'=>['egt',0]])->paginate(10);
			// 把分页数据赋值给模板变量list

			// 渲染模板输出
			return $this->fetch('essaylist',['eq'=>1,'title'=>'文章列表','list'=>$list]);

		}else{
			$id = request()->post('id');
			$t = request()->post('t');
			$res = Db::name('blog')->where(['id'=>$id])->update(['status'=>$t]);
			exit(json_encode(['code'=>1]));
		}
	
	}



	public function videolist(){
		// $this->IsAdm();
		if(\think\Request::instance()->isGet()){
			$this->title = 'video列表';
			$p = input('p')?input('p'):1;
			$word = input('word');
			$map = array();
			if($word) $map['title'] = array('like','%'.$word.'%');
			$list = Db::name('video')->paginate(10);
			$page = $list->render();
			$this->assign('page',$page);// 赋值分页输出
			//分页跳转的时候保证查询条件
			$this->assign('list',$list);
			return $this->fetch('videolist',['title'=>'videolist','eq'=>1]);
		}else{
			$id = input('id');
			Db::name('video')->where(['id'=>$id])->delete();
			exit(json_encode(['ret'=>1,'msg'=>'删除成功']));
		}
	}

	
	public function addvideo(){
		// $this->IsAdm(true);
		if(\think\Request::instance()->isGet()){
			$id = input('id');
			$cinemas = Db::query('SELECT * from cinemas');
			$this->assign('cinemas',$cinemas);
			return $this->fetch('addvideo',['title'=>'add video','eq'=>1]);
		}else{
			$data = \think\Request::instance()->post();
			//var_dump($data);exit;
			// 新增
			$video['title'] = $data['title'];
			$video['price'] = $data['price'];
			$video['cover'] = $data['cover'];
			$video['cate'] = $data['cate'];		
			$video['publishtime'] = strtotime($data['publishtime']);
			$video['director'] = $data['director'];
				
			$r = Db::name('video')->insertGetId($video);

			if($r){
				$this->AddTicket($r,$data['cinemas']);
				exit(json_encode(['code'=>1,'msg'=>'successfully upload']));
			}else{
				exit(json_encode(['code'=>0,'msg'=>'failed upload']));
			}
		}
	}
	

	public function addonline(){

	
		if(\think\Request::instance()->isGet()){
			return $this->fetch('addonline',['title'=>'add video','eq'=>1]);
		}else{
			$data = \think\Request::instance()->post();
		
			// 新增
			$video['title'] = $data['title'];
			$video['cate'] = $data['cate'];
			$video['cover'] = $data['cover'];
			
			$video['publishtime'] = strtotime($data['publishtime']);
			$video['director'] = $data['director'];
			$video['address'] = $data['address'];
			$r = Db::name('video')->insertGetId($video);

			if($r){
	
				exit(json_encode(['code'=>1,'msg'=>'successfully upload']));
			}else{
				exit(json_encode(['code'=>0,'msg'=>'failed upload']));
			}
		}



	}


	public function AddTicket($r,$cinemas){
		if(!empty($cinemas)){
			foreach($cinemas as $k=>$v){

				$data = array(
					'cinemaid'=>$v['cid'],
					'time'=>json_encode($v['time']),
					'videoid'=>$r,
					'btime'=>strtotime($v['btime']),
					'etime'=>strtotime($v['etime']),
					'addtime'=>time()
				);

			Db::name('tickets')->insert($data);

			}
		}
	}


	
	public function addTag($video,$tagarr){
		if(!$tagarr) return false;
		for ($i=0; $i < count($tagarr); $i++) { 
				$tag = Db::name('tag')->where(['tag'=>$tagarr[$i]])->find();
				if($tag){
					Db::name('tag')->where(['tag'=>$tagarr[$i]])->setInc('count',1);
					Db::name('video_tag')->insert(['videoid'=>$video,'tagid'=>$tag['id']]);
				}else{
					$tagid = Db::name('tag')->insertGetId(['tag'=>$tagarr[$i],'count'=>1]);
					Db::name('video_tag')->insert(['videoid'=>$video,'tagid'=>$tagid]);
				}
		}

	}


	//博客列表
		public function bloglist(){
		// $this->IsAdm();
		if(\think\Request::instance()->isGet()){
			$this->title = ' 博客列表';
			$p = input('p')?input('p'):1;
			$word = input('word');
			$map = array();
			if($word) $map['title'] = array('like','%'.$word.'%');
			$list = Db::name('blog')->paginate(10);
			$page = $list->render();
			$this->assign('page',$page);// 赋值分页输出
			//分页跳转的时候保证查询条件
			$this->assign('list',$list);
			return $this->fetch('bloglist',['title'=>'博客列表','eq'=>2]);
		}else{
			$id = input('id');
			Db::name('blog')->where(['id'=>$id])->delete();
			exit(json_encode(['ret'=>1,'msg'=>'删除成功']));
		}
	}

	//判断是否影院登陆
	protected function IsCinema(){
			if(!\think\Session::get('login_cinema')){
				$this->redirect("index/admin/cinemalogin");
			}
	}


	//影院后台登录
	public function cinemalogin(){

		if($_SERVER['REQUEST_METHOD'] === 'GET'){

			return $this->fetch('cinema_login');
		}else{
			$user = input('user');
			$pwd = md5(input('pwd'));

			$cinema = Db::query("select * from cinemas where user='$user' AND pwd='$pwd'")[0];
			if($cinema){
				\think\Session::set('login_cinema',$cinema['id']);
				\think\Session::set('login_cinema_status',1);
				exit(json_encode(['code'=>1,'msg'=>'登陆成功']));
			}
			exit(json_encode(['code'=>0,'msg'=>'错误的用户名或密码']));



		}

	}


	//验票列表
		public function ordercheck(){
		$this->IsCinema();
		if(\think\Request::instance()->isGet()){
			$this->title = '订单列表';
			$p = input('p')?input('p'):1;
			$word = input('word');
			$map = array();
			// if($word) $map['v.title'] = array('like','%'.$word.'%');
			$map['fo.cinemaid'] = \think\Session::get('login_cinema');
			$list = Db::name('film_order')
			->alias('fo')
			->join("video v","fo.videoid=v.id")
			->join("cinemas c","fo.cinemaid=c.id")
			->join("user u","fo.uid=u.id")
			->field("fo.id,fo.orderid,fo.time,v.title,fo.money,c.name,fo.addtime,u.nickname,u.phone,fo.status")
			->where($map)
			->paginate(10);
			$page = $list->render();
			$this->assign('page',$page);// 赋值分页输出
			//分页跳转的时候保证查询条件
			$this->assign('list',$list);
			return $this->fetch('checklist',['title'=>'博客列表','eq'=>2]);
		}else{
			$id = input('id');
			$order = Db::query("select * from film_order where id='{$id}' AND status=2")[0];
			if($order){
				Db::execute("update film_order SET status=3 where id='$id'");
				exit(json_encode(['code'=>1,'msg'=>'出票成功']));
			}

			exit(json_encode(['code'=>0,'msg'=>'出票失败']));
		}
	}



}

 ?>
