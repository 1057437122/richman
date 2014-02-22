<?php
/*Autoresponse_model Class
*@use:operation to questions table
*@author:leez
*@link:www.leepine.com
*/
class Autoresponse_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function get_answer($title=FALSE){
		if($title===FALSE){
			return '';
		}
		$query=$this->db->get_where('rich_autoresponse', array('title' => $title));
		return $query->row_array();
	}
	public function get_all_response(){	
		$query=$this->db->get('rich_autoresponse');
		return $query->result_array();
	}
	public function add(){
		$data=array(
			'title'=>$this->input->post('title'),
			'answer'=>$this->input->post('answer')
		);
		return $this->db->insert('rich_autoresponse',$data);
	}
}
/*End of file question_model.php
*Location:application/models/question_model.php
*/