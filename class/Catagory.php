<?php 

    $filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');
 ?>


<?php 
	class Catagory{

		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		
		public function checkExixts($data){
			$query = "SELECT * FROM catagory WHERE catname = '$data'";
			$result = $this->db->select($query);
			return $result;
			
		}

		public function catInsert($catname){
			$catname = $this->fm->validation($catname);
			$catname = mysqli_real_escape_string($this->db->link , $catname);

			if ($this->checkExixts($catname)) {
				$err = "Already have this Catagory";
				return $err;
			}else{

			if (empty($catname)) {
				$loginmsg = "!!! Category Field must not be empty !!!";
				return $loginmsg;
			}else{
				$query = "INSERT INTO catagory(catname) VALUES ('$catname')";
				$result = $this->db->insert($query);

				if ($result) {
				$loginmsg = "!!!Category Field Successfully inserted!!!";
				return $loginmsg;
			}
			}
		}
			


		}


		public function getAllCat(){
			$query = "SELECT * FROM catagory";
			$result = $this->db->select($query);

			return $result;
		}

		public function getCatById($id){
			$query = "SELECT * FROM catagory WHERE catId=$id";
			$result = $this->db->select($query);
			return $result;
		}

		public function catUpdate($catname , $id){

			$catname = $this->fm->validation($catname);
			$catname = mysqli_real_escape_string($this->db->link , $catname);
			$id = mysqli_real_escape_string($this->db->link , $id);
			if (empty($catname)) {
				$loginmsg = "!!!Category Field must not be empty!!!";
				return $loginmsg;
			}else{
			$query = "UPDATE tbl_catagory 
							SET 
							catName = '$catname'
							WHERE catId = '$id'
							;";
			$result = $this->db->update($query);
			if ($result) {
				$loginmsg = "!!!Category Field Successfully Updated!!!";
				return $loginmsg;
			}else{
				$loginmsg = "!!!Category Field Not Updated!!!";
				return $loginmsg;
			}
		}
		}
		public function delGetById($id){
			$query = "DELETE FROM catagory WHERE id='$id'";
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