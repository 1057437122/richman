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
	public function index()
	{
		$this->load->view('admin');
	}
	public function wechat($item='',$op=''){
		switch($item){
			case '':
				echo 'add pages later ,wechat background index page';
				break;//index page
			case 'autoresponse':
				if($op=='add'){//add auto response items
					if(!file_exists('application/views/admin/wechat/autoreponse/add.php')){
						show_404();
					}
					
					$this->load->view('admin/wechat/autoreponse/add.php');
					
				}elseif($op=='del'){
					echo 'del autoresonse item ,unfinished';
				}else{
					echo 'other operations';
				}
				break;//case autoresponse
			default:
				show_404();
		}
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
