<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "leepine");
$wechatObj = new Wechat();
$wechatObj->valid();

class Wechat extends CI_Controller
{
	public function __construct(){
		$this->load->library('Wecore');
	}
	public function valid(){
		$this->Wecore->valid();
	}

/* End of wechat.php */
/*location:application/controller/wechat.php*/
