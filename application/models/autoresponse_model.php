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