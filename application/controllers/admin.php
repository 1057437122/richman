<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->data['base_url']=$this->config->item('base_url');
		
	}
	public function index()
	{
		$this->load->view('admin/index');
	}
	public function weweb($item='',$op='',$id=''){//for the we site
		switch($item){
			case '':
				echo 'add later';
				break;
			case 'cat':
				$this->load->model('category_model');
				if($op=='add'){//add category
					$this->data['catid']=array('1'=>'nice','2'=>'secon','4'=>'what');
					$this->data['swfupload']=1;
					$this->load->helper('form');
					$this->load->library('form_validation');
					
					$this->form_validation->set_rules('name','name','required');

					if($this->form_validation->run()==false){
						$this->load->view('admin/header',$this->data);
						$this->load->view('admin/weweb/cat/add',$this->data);
						$this->load->view('admin/footer');
					}else{
						echo 'add in database~~';
					}
					
				}
				break;
			default:
				echo 'none';
		}
	}
	
	public function wechat($item='',$op='',$id=''){
		switch($item){
			case '':
				echo 'add pages later ,wechat background index page';
				break;//index page
			case 'autoresponse':
				$this->load->model('autoresponse_model');
				if($op=='add'){//add auto response items
					$this->load->helper('form');
					$this->load->library('form_validation');
					
					$this->form_validation->set_rules('title','title','required');
					$this->form_validation->set_rules('answer','answer','required');
					$this->form_validation->set_rules('introduce','introduce','required');
					
					if($this->form_validation->run()===false){
						$this->load->view('admin/header',$this->data);
						$this->load->view('admin/wechat/autoreponse/add',$this->data);
						$this->load->view('admin/footer');
					}else{
						//execute the sql and insert item
						if($this->autoresponse_model->add()){
							$this->load->view('admin/success');
						}else{
							$this->load->view('admin/fail');
						}
						
					}
					
				}elseif($op=='edit'){
					$this->load->helper('form');
					$this->load->library('form_validation');
					
					$this->form_validation->set_rules('title','title','required');
					$this->form_validation->set_rules('answer','answer','required');
					$this->form_validation->set_rules('introduce','introduce','required');
					
					$this->data['id']=$id;
					$this->data['info']=$this->autoresponse_model->get_item_by_id($id);
					
					if($this->form_validation->run()===false){
						$this->load->view('admin/header',$this->data);
						$this->load->view('admin/wechat/autoreponse/edit',$this->data);
						$this->load->view('admin/footer');
					}else{
						//execute the sql and insert item
						if($this->autoresponse_model->edit($id)){
							$this->load->view('admin/success');
						}else{
							$this->load->view('admin/fail');
						}
						
					}
				}elseif($op=='Setinactive'){
					$this->autoresponse_model->Setinactive($id);
					$this->data['autoresponse_list']=$this->autoresponse_model->get_all_response();
					
					$this->load->view('admin/header.php',$this->data);
					$this->load->view('admin/wechat/autoreponse/index.php',$this->data);
					$this->load->view('admin/footer.php');
				}elseif($op=='Setactive'){
					$this->autoresponse_model->Setactive($id);
					$this->data['autoresponse_list']=$this->autoresponse_model->get_all_response();
					
					$this->load->view('admin/header.php',$this->data);
					$this->load->view('admin/wechat/autoreponse/index.php',$this->data);
					$this->load->view('admin/footer.php');
				}elseif($op=='add_single'){
					$this->load->helper('form');
					$this->load->library('form_validation');
					
					$this->form_validation->set_rules('title','title','required');
					$this->form_validation->set_rules('answer','answer','required');
					$this->form_validation->set_rules('introduce','introduce','required');
					
					if($this->form_validation->run()===false){
						$this->load->view('admin/header',$this->data);
						$this->load->view('admin/wechat/autoreponse/add_single',$this->data);
						$this->load->view('admin/footer');
					}else{
						//execute the sql and insert item
						// if($this->autoresponse_model->add()){
							// $this->load->view('admin/success');
						// }else{
							// $this->load->view('admin/fail');
						// }
						
					}
				}else{//show all the autoresonse items
					if(!file_exists('application/views/admin/wechat/autoreponse/index.php')){
						show_404();
					}
					$this->data['autoresponse_list']=$this->autoresponse_model->get_all_response();
					
					$this->load->view('admin/header.php',$this->data);
					$this->load->view('admin/wechat/autoreponse/index.php',$this->data);
					$this->load->view('admin/footer.php');
				}
				break;//case autoresponse
			case 'suggestion':
				$this->load->model('suggestion_model');
				if($op=='Setactive'){
				}else{//show index
					if(!file_exists('application/views/admin/wechat/suggestion/index.php')){
						show_404();
					}
					$this->data['suggestion_list']=$this->suggestion_model->get_all_suggestion();
					
					$this->load->view('admin/header.php',$this->data);
					$this->load->view('admin/wechat/suggestion/index.php',$this->data);
					$this->load->view('admin/footer.php');
				}
				break;
			default:
				show_404();
		}
	}//public function wechat
	public function uploadimg($flag=''){
		
		$uptypes=array(  
			'image/jpg',  
			'image/jpeg',  
			'image/png',  
			'image/pjpeg',  
			'image/gif',  
			'image/bmp',  
			'image/x-png'  
		); 
		//$destination_folder=$this->data['base_url']."static/upload/";
		$destination_folder="./static/upload/";
		if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0) {
			echo "ERROR:invalid upload";
			exit(0);
		}
		//print_r($_FILES);
		$file = $_FILES["Filedata"];
		$filename=$file["tmp_name"];  
		$image_size = getimagesize($filename);  
		$pinfo=pathinfo($file["name"]);  
		$ftype=$pinfo['extension'];  
		$destination = $destination_folder.time().".".$ftype; 
		
		if(!move_uploaded_file ($filename, $destination))  
		{  
			echo "�ƶ��ļ�����";  
			exit;  
		}
	}//uploadimg
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
