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
		$this->load->view('admin');
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
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
