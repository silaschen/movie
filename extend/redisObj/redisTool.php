<?php
namespace redisObj;
class redisTool{
	private static $redis;
	private $redisw;
	private $config = array(
		'host'=>'127.0.0.1','port'=>'6379'
	);
	private function __construct(){
		$this->redisw = new \Redis();
		$this->redisw->connect('127.0.0.1',6379);
		$this->redisw->select(1);

	}
	private function __clone(){}
	
	//get redis
	public static function getRedis(){
		if(self::$redis){
			self::$redis=self::$redis;
		}else{
			self::$redis = new redisTool();
		}
		
		return self::$redis;
	}


	//get
	public function get($key){
		return $this->redisw->get($key);
	}
	
	//set key
	public function setkey($key,$timeout=false,$value){
		if(is_integer($timeout) && $timeout>0){

			$this->redisw->setex($key,$timeout,$value);
		}else{
			$this->redisw->set($key,$value);
		}

	}

	//lpush
	public function lpush($key,$value){
		return $this->redisw->lpush($key,$value);

	}
	
	public function llen($key){
		
		return $this->redisw->llen($key);

	}

	public function range($key,$start,$end){
	
		return $this->redisw->lrange($key,$start,$end);

	}








}
