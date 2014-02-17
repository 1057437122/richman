<?php if(! defined('BASEPATH')) exit('No Direct script access allowed');
/**
  * wechat core class 
  */

class Wecore
{
	public function __construct(){
		$MsgType='text';//default text message
		$ToUserName='';
		$FromUserName='';
		$Content='';
		$MsgId='';
	}
	public function init(){
		$postStr=$GLOBALS['HTTP_RAW_POST_DATA'];
		if(!empty($postStr)){
			$postObj=simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
			$this->FromUserName=$postObj->FromUserName;
			$this->ToUserName=$postObj->ToUserName;
			$this->MsgType=$postObj->MsgType;
			$this->MsgId=$postObj->MsgId;//for weight
		}
	}
	public function response(){
		$msg=$this->MsgType;
		$this->send_text_msg($msg);
	}
	public function send_text_msg($msg){//send text message
		$textTpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[text]]></MsgType>
			<Content><![CDATA[%s]]></Content>
			<FuncFlag>0</FuncFlag>
			</xml>";
		$time=time();
		$resultStr=sprintf($textTpl,$this->FromUserName,$this->ToUserName,$time,msg);
		echo $resultStr;
	}
	public function get_msg(){//get the 
	}
	public function tst(){
		echo 'nice';
	}
}
/*End of file Wecore.php */
/*location:application/libraries */
