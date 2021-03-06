<?php
/*Autoresponse_model Class
*@use:operation to questions table
*@author:leez
*@link:www.leepine.com
*/
class Autoresponse_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		$this->autoresponse_table='rich_autoresponse';
	}
	public function get_answer($title=FALSE){
		if($title===FALSE){
			return '';
		}
		$query=$this->db->get_where($this->autoresponse_table, array('title' => $title,'isactive'=>'1'));
		return $query->row_array();
	}
	public function get_item_by_id($id){
		$query=$this->db->get_where($this->autoresponse_table,array('id'=>$id));
		return $query->row_array();
	}
	public function get_all_response(){
		$query=$this->db->get($this->autoresponse_table);
		return $query->result_array();
	}
	public function add(){
		$data=array(
			'title'=>$this->input->post('title'),
			'answer'=>$this->input->post('answer'),
			'introduce'=>$this->input->post('introduce')
		);
		if($this->db->get_where($this->autoresponse_table,array('title'=>$data['title']))->result_array()){//if exists
			return FALSE;
		}
		return $this->db->insert($this->autoresponse_table,$data);
	}
	public function edit($id){
		$data=array(
			'title'=>$this->input->post('title'),
			'answer'=>$this->input->post('answer'),
			'introduce'=>$this->input->post('introduce')
		);
		$this->db->where('id',$id);
		return $this->db->update($this->autoresponse_table,$data);
	}
	public function Setinactive($id){
		$data=array(
			'isactive'=>'0',
		);
		$this->db->where('id',$id);
		$this->db->update($this->autoresponse_table,$data);
	}
	public function Setactive($id){
		$data=array(
			'isactive'=>1,
		);
		$this->db->where('id',$id);
		$this->db->update($this->autoresponse_table,$data);
	}
}
/*End of file autoresponse_model.php
*Location:application/models/autoresponse_model.php
*/