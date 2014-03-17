<?php if(! defined('BASEPATH')) exit('No Direct script access allowed');
/**
  * wechat core class 
  * define array msg:$msg=array('type'=>'text','item'=>array('answer'=>text)) || $msg=array('type'=>'pic','item'=>array('0'=>array('title','answer','picurl','url'),'1'=>array('title','answer','picurl','url')))
  
  */

class Wecore
{
	public function __construct(){
		$postObj='';//contains all the information of the message user sent
	}
	public function init(){
		$postStr=$GLOBALS['HTTP_RAW_POST_DATA'];
		if(!empty($postStr)){
			$this->postObj=simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
		}else{
			exit('Not Allowed');
		}
	}
	public function response($msg=FALSE){//$msg is an array which contains the information about the msg
		if($msg===FALSE){
			$ret='welcome to subscribe me~~~';
			$this->send_text_msg($ret);
		}else{
			if($msg['type']=='pic' && is_array($msg['item'])){
				$this->send_pic_msg($msg['item']);
			}else{
				$this->send_text_msg($msg['item']['answer']);
			}
		}
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
		$resultStr=sprintf($textTpl,$this->postObj->FromUserName,$this->postObj->ToUserName,$time,$msg);
		echo $resultStr;
	}
	public function send_pic_msg($msg){//$msg=array(0=>array('title'=>,'answer'=>,'picurl'=>..),1=>array(...))
		$picTplHead="<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[news]]></MsgType>
					<ArticleCount>%d</ArticleCount>";
		$picTplContent="<Articles>
					<item>
					<Title><![CDATA[%s]]></Title>
					<Description><![CDATA[%s]]></Description>
					<PicUrl><![CDATA[%s]]></PicUrl>
					<Url><![CDATA[%s]]></Url>
					</item>
					</Articles>";
		$picTplFooter="</xml>";
		$time=time();
		$header=sprintf($picTplHead,$this->postObj->FromUserName,$this->postObj->ToUserName,$time,count($msg));
		$content='';
		foreach($msg as $item){
			$content.=sprintf($picTplContent,$item['title'],$item['answer'],$item['picurl'],$item['url']);
		}
		$resultStr=$header.$content.$picTplFooter;
		echo $resultStr;
	}
}
/*End of file Wecore.php */
/*location:application/libraries */
