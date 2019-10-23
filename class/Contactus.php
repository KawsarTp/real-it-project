<?php 

     $filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');


 ?>
<?php 

class Contactus{
	
	private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addContactInfo($data){
			$address = mysqli_real_escape_string($this->db->link , $data['address']);
			$phone  = mysqli_real_escape_string($this->db->link , $data['phone']);
			$email = mysqli_real_escape_string($this->db->link , $data['email']);

			$query = "INSERT INTO tbl_info (address,phone,email) VALUES ('$address','$phone','$email')";
    			$result = $this->db->insert($query);
    			if ($result) {
				$loginmsg = "!!!Successfully inserted!!!";
				return $loginmsg;
			}else{
				$loginmsg = "!!!Product Not inserted!!!";
				return $loginmsg;
			}

		}

		public function getContact(){
			$query = "SELECT * FROM tbl_info";
			$result = $this->db->select($query);
			return $result;
		}


		public function addContact($data){
			$name = mysqli_real_escape_string($this->db->link , $data['name']);
			$email  = mysqli_real_escape_string($this->db->link , $data['email']);
			$phone = mysqli_real_escape_string($this->db->link , $data['mobile']);
			$text = mysqli_real_escape_string($this->db->link , $data['text']);
			$query = "INSERT INTO tbl_contact (conName,conMobile,conEmail,conSubject) VALUES ('$name','$phone','$email','$text')";
    			$result = $this->db->insert($query);
    			if ($result) {
				$loginmsg = "!!!Successfully inserted!!!";
				return $loginmsg;
			}else{
				$loginmsg = "!!!Product Not inserted!!!";
				return $loginmsg;
			}

		}
	}

 ?>




