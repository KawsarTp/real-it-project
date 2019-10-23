<?php 

    $filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');
 ?>


<?php 
	class ChangePassword{

		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function checkpass($pass){
			$sql = "SELECT password FROM admin WHERE password = '$pass'";
			$result = $this->db->select($sql);
			return $result;
		}

		public function changePass($data){
			$old = $data['password'];
			if ($this->checkpass($old)) {
				$new = $data['newpass'];
			$confirm = $data['confirmpass'];
			if ($old == "" || $new == "") {
					$err ="Password Can't be empty";
					return $err;
				}else{
					$sql = "UPDATE admin
							SET password = $new";
					$result = $this->db->update($sql);
					return $result;	
				}
			}else{

				$err ="Old password error";
				return $err;
			
			}
		}
	}

?>