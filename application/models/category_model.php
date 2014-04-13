<?php
//category model contains all the category
class Category_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		$this->autoresponse_table='rich_category';
	}
}
/*End of file category_model.php
*Location:application/models/category_model.php
*/