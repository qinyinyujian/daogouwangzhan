<?php
/*
 * $data 需要加密或解密的参数
 * $key 加密或解密的密钥
*/
	class authc {
		public $ks; //密钥长度
		public $td; //加密类型
		public $iv; //初始向量
		public $size;
		public function __construct() {

		}


		//加密
		public function encode($data,$key) {
			$this->td = mcrypt_module_open(MCRYPT_DES,'', 'ecb', '');  //使用MCRYPT_DES算法,ecb模式
			$this->size = mcrypt_enc_get_iv_size($this->td); //设置初始向量大小
			$this->iv = mcrypt_create_iv($this->size,MCRYPT_RAND); //创建初始向量
			$this->ks = mcrypt_enc_get_key_size($this->td); //返回所支持的最大的密钥长度(字节)
			$keys = substr($key, 0, $this->ks); //设置密钥
			mcrypt_generic_init($this->td, $keys, $this->iv); //初始处理
            $data = mcrypt_generic($this->td, $data);  //加密
            mcrypt_generic_deinit($this->td); //结束处理
            mcrypt_module_close($this->td); //结束
			return $data;
		} 

		//解密
		public function decode($data,$key) {
			$this->td = mcrypt_module_open(MCRYPT_DES,'', 'ecb', '');  //使用MCRYPT_DES算法,ecb模式
			$this->size = mcrypt_enc_get_iv_size($this->td); //设置初始向量大小
			$this->iv = mcrypt_create_iv($this->size,MCRYPT_RAND); //创建初始向量
			$this->ks = mcrypt_enc_get_key_size($this->td); //返回所支持的最大的密钥长度(字节)
			$keys = substr($key, 0, $this->ks); //获取KEY长度
			mcrypt_generic_init($this->td, $keys, $this->iv); //初始解密处理
            $data = mdecrypt_generic($this->td, $data); //解密
            $data = trim($data) . "\n"; //解密后,可能会有后续的\0,需去掉 
            mcrypt_generic_deinit($this->td); //结束
            mcrypt_module_close($this->td); //结束
            return $data;
		}
	}
	
?>