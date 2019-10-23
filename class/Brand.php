<?php 
     $filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');
 ?>

<?php 

	class Brand{
		
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function checkExixts($data){
			$query = "SELECT * FROM brand WHERE brandname = '$data'";
			$result = $this->db->select($query);
			return $result;
			
		}

		public function brandInsert($brandname){
			$brandname = $this->fm->validation($brandname);
			$brandname = mysqli_real_escape_string($this->db->link , $brandname);
			if ($this->checkExixts($brandname)) {
				$err = "Already Have this Brand";
				return $err;
			}else{
			if (empty($brandname)) {
				$loginmsg = "!!!Brand Field must not be empty!!!";
				return $loginmsg;
			}else{
				$query = "INSERT INTO brand(brandName) VALUES ('$brandname')";
				$result = $this->db->insert($query);
			}
			if ($result) {
				$loginmsg = "!!!Brand Field Successfully inserted!!!";
				return $loginmsg;
			}
		}

		}

		public function getAllBrand(){
			$query = "SELECT * FROM brand";
			$result = $this->db->select($query);
			return $result;
		}

		public function getbrandById($id){
			$query = "SELECT * FROM tbl_brand WHERE brandId=$id";
			$result = $this->db->select($query);
			return $result;
		}

		public function brandUpdate($brandname , $id){

			$brandname = $this->fm->validation($brandname);
			$brandname = mysqli_real_escape_string($this->db->link , $brandname);
			$id = mysqli_real_escape_string($this->db->link , $id);
			if (empty($brandname)) {
				$loginmsg = "!!!Category Field must not be empty!!!";
				return $loginmsg;
			}else{
			$query = "UPDATE tbl_brand 
							SET 
							brandName = '$brandname'
							WHERE brandId = '$id'
							;";
			$result = $this->db->update($query);
			if ($result) {
				$loginmsg = "!!!Brand Field Successfully Updated!!!";
				return $loginmsg;
			}else{
				$loginmsg = "!!!Brand Field Not Updated!!!";
				return $loginmsg;
			}
		}
		}


		public function delGetById($id){
			$query = "DELETE FROM brand WHERE id='$id'";
			$result = $this->db->delete($query);

			if ($result) {
				$loginmsg = "!!!Category Field Successfully Deleted!!!";
				return $loginmsg;
			}else{
				$loginmsg = "!!!Category Field Not Deleted!!!";
				return $loginmsg;
			}
		}
	}


 ?>