<?php 

     $filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');
  ?>


<?php 

class User{
	
	private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}



		public function addUser($data){
			$name = mysqli_real_escape_string($this->db->link , $data['name']);
			$username = mysqli_real_escape_string($this->db->link , $data['username']);
			$city = mysqli_real_escape_string($this->db->link , $data['city']);
			$zip = mysqli_real_escape_string($this->db->link , $data['zip']);
			$email = mysqli_real_escape_string($this->db->link , $data['email']);
			$address = mysqli_real_escape_string($this->db->link , $data['address']);
			$country = mysqli_real_escape_string($this->db->link , $data['country']);
			$phone = mysqli_real_escape_string($this->db->link , $data['phone']);
			$pass = mysqli_real_escape_string($this->db->link , $data['pass']);
			$pass = md5($pass);

			if ($name == "" || $username == "" || $city == "" || $zip == "" || $email =="" || $address == "" || $country == "" || $phone == "" || $pass == "") {
				$loginmsg = "!!!Resistration Field must not be empty!!!";
				return $loginmsg;
			}
				$mail = "SELECT * FROM tbl_user WHERE userEmail = '$email' LIMIT 1";
				$chkmail = $this->db->select($mail);

				if ($chkmail !== false) {
					echo "<span style='color:red;'>Email Already Exists";
				}else{
				
				$query = "INSERT INTO tbl_user(Name,userName,userAdd,userCity,userCon,userZip,userPhone,userEmail,userPass) VALUES ('$name','$username','$address','$city','$country','$zip','$phone','$email','$pass')";
				$result = $this->db->insert($query);

				if ($result) {
				$loginmsg = "!!!You are Successfully resisterd!!!";
				return $loginmsg;
		
		}
			}
			
		}

			public function userLogin($log){
			$email = $this->fm->validation($log['email']);
			$password = md5($this->fm->validation($log['password']));


			$email = mysqli_real_escape_string($this->db->link , $email);
			$password = mysqli_real_escape_string($this->db->link , $password);


			if ( $email==""|| $password=="" ) {
				$loginmsg = "!!!Field must not be empty!!!";
				return $loginmsg;
			}else{
				$query = "SELECT * FROM tbl_user WHERE userEmail ='$email' AND userPass ='$password'";
				$result = $this->db->select($query);

				if($result != false){
					$value = $result->fetch_assoc();
					Session::set("userLogin", true);
					Session::set("userId",  $value['userId']);
					Session::set("userName", $value['userName']);
					Session::set("Name",   $value['Name']);
					Session::set("userEmail", $value['userEmail']);
					header("Location:cart.php");
		
				}else{
					$loginmsg = "Username Or Password Wrong";
					return $loginmsg;
				}
			}
			}

			public function getUserData($id){
				$query = "SELECT * FROM tbl_user WHERE userId ='$id'";
				$result = $this->db->select($query);
				return $result;
			}

			public function userproUpdate($data,$id){
			$name =  $data['name'];
			$address = $data['address'];
			$city = $data['city'];
			$zip =  $data['zip'];
			$email =  $data['email'];
			$country = $data['country'];
			$phone =  $data['phone'];
			

			if ($name == "" ||$city == "" || $zip == "" || $email =="" || $address == "" || $country == "" || $phone == "") {
				$loginmsg = "!!!Field must not be empty!!!";
				return $loginmsg;
			}else{
				$query = "UPDATE tbl_user
							SET 
							Name = '$name',
							userAdd = '$address',
							userCity = '$city',
							userZip = '$zip',
							userEmail = '$email',
							userCon = '$country',
							userPhone = '$phone'
							WHERE userId = '$id'
							;";
				$result = $this->db->update($query);

				if ($result) {
				header("Location:profile.php");
		
		}
			}
			}

}
 ?>