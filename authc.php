<?php
/*
 * $data ��Ҫ���ܻ���ܵĲ���
 * $key ���ܻ���ܵ���Կ
*/
	class authc {
		public $ks; //��Կ����
		public $td; //��������
		public $iv; //��ʼ����
		public $size;
		public function __construct() {

		}


		//����
		public function encode($data,$key) {
			$this->td = mcrypt_module_open(MCRYPT_DES,'', 'ecb', '');  //ʹ��MCRYPT_DES�㷨,ecbģʽ
			$this->size = mcrypt_enc_get_iv_size($this->td); //���ó�ʼ������С
			$this->iv = mcrypt_create_iv($this->size,MCRYPT_RAND); //������ʼ����
			$this->ks = mcrypt_enc_get_key_size($this->td); //������֧�ֵ�������Կ����(�ֽ�)
			$keys = substr($key, 0, $this->ks); //������Կ
			mcrypt_generic_init($this->td, $keys, $this->iv); //��ʼ����
            $data = mcrypt_generic($this->td, $data);  //����
            mcrypt_generic_deinit($this->td); //��������
            mcrypt_module_close($this->td); //����
			return $data;
		} 

		//����
		public function decode($data,$key) {
			$this->td = mcrypt_module_open(MCRYPT_DES,'', 'ecb', '');  //ʹ��MCRYPT_DES�㷨,ecbģʽ
			$this->size = mcrypt_enc_get_iv_size($this->td); //���ó�ʼ������С
			$this->iv = mcrypt_create_iv($this->size,MCRYPT_RAND); //������ʼ����
			$this->ks = mcrypt_enc_get_key_size($this->td); //������֧�ֵ�������Կ����(�ֽ�)
			$keys = substr($key, 0, $this->ks); //��ȡKEY����
			mcrypt_generic_init($this->td, $keys, $this->iv); //��ʼ���ܴ���
            $data = mdecrypt_generic($this->td, $data); //����
            $data = trim($data) . "\n"; //���ܺ�,���ܻ��к�����\0,��ȥ�� 
            mcrypt_generic_deinit($this->td); //����
            mcrypt_module_close($this->td); //����
            return $data;
		}
	}
	
?>