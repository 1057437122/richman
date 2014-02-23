<?php
/**
  * wechat php test
  */
#these for line is just for signature the website so ..
#define('TOKEN','leepine');
#$we=new Wechat();
#$we->valid();
#$we->responseMsg();
class Wechat extends CI_Controller
{
	public function __construct(){
		parent::__construct();
#		$this->load->helper('url');
		$this->load->library('wecore');
		$this->welcome='欢迎关注Leepine，回复“聚会时间”获得长春里教堂一周的聚会时间，回复“事工宣布”获得长春里教堂的事工';
	}
	public function valid1()
    {
        // $echoStr = $_GET["echostr"];

        //valid signature , option
        // if($this->checkSignature()){
        	// echo $echoStr;
        	// exit;
        // }
		// $request='fse';
		// $this->load->model('autoresponse_model');
		// $msg=$this->autoresponse_model->get_answer($request);
		// print_r($msg);
    }

    public function valid()
    {
	    $this->wecore->init();
		if($this->wecore->postObj->MsgType=='text'){//text type
			$request=(string)$this->wecore->postObj->Content;
			$this->load->model('autoresponse_model');
			if(!$msg=$this->autoresponse_model->get_answer($request)){
				$msg=array('answer'=>$this->welcome);
			}
		}else{//other type
			$msg=array('answer'=>$this->welcome);
		}
	    $this->wecore->response($msg['answer']);
    }
		
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}
/*End of file Wechat.php */
/*location:application/controller */
