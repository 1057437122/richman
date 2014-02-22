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
	}
	public function valid1()
    {
        // $echoStr = $_GET["echostr"];

        //valid signature , option
        // if($this->checkSignature()){
        	// echo $echoStr;
        	// exit;
        // }
		$this->load->model('autoresponse_model');
		$msg=$this->autoresponse_model->get_answer('rich_autoresponse', array('title' => $request));
		print_r($msg);
    }

   # public function responseMsg()
    public function valid()
    {
	    //$this->Wecore->tst();
	    $this->wecore->init();
		$request=$this->wecore->postObj->Content;
		$this->load->model('autoresponse_model');
		$msg=$this->autoresponse_model->get_answer('rich_autoresponse', array('title' => $request));
		$msg=array('0'=>array('answer'=>'nice'));
	    $this->wecore->response($msg[0]['answer']);
		//get post data, May be due to the different environments
#	$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
#
#      	//extract post data
#	if (!empty($postStr)){
#                
#		$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
#		$fromUsername = $postObj->FromUserName;
#		$toUsername = $postObj->ToUserName;
#		$keyword = trim($postObj->Content);
#		$time = time();
#		$textTpl = "<xml>
#			<ToUserName><![CDATA[%s]]></ToUserName>
#			<FromUserName><![CDATA[%s]]></FromUserName>
#			<CreateTime>%s</CreateTime>
#			<MsgType><![CDATA[%s]]></MsgType>
#			<Content><![CDATA[%s]]></Content>
#			<FuncFlag>0</FuncFlag>
#			</xml>";             
#		if(!empty( $keyword ))
#		{
#			$msgType = "text";
#			$contentStr = "Welcome to wechat world!";
#			$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
#			echo $resultStr;
#		}else{
#			echo "Input something...";
#		}
#
#        }else {
#        	echo "aaa";
#        	exit;
#        }
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
