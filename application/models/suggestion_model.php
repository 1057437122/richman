<?php
/*Suggestion_model Class
*@use:operation to questions table
*@author:leez
*@link:www.leepine.com
*/
class Suggestion_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		$this->table='rich_suggestion';
	}
	public function get_all_suggestion(){
		$query=$this->db->get($this->table);
		return $query->result_array();
	}
}
/*End of file suggestion_model.php
*Location:application/models/suggestion_model.php
*/