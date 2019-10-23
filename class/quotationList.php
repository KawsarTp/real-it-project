<?php 

     $filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');


 ?>

 <?php 

class quotationList{
	
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function getData()
		{
			$sql = "SELECT * FROM tmp_user";
			$result = $this->db->select($sql);
			return $result;
		}
		
}
