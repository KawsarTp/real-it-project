<?php 
	$filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');
  ?>

<?php

class Tempclass{
	private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function dataInsert($data, $file){
			$productname = mysqli_real_escape_string($this->db->link , $data['productname']);
			$model = mysqli_real_escape_string($this->db->link , $data['model']);
			$catId = mysqli_real_escape_string($this->db->link , $data['catId']);
			$brandId = mysqli_real_escape_string($this->db->link , $data['brandId']);
			$body = mysqli_real_escape_string($this->db->link , $data['body']);
			$price = mysqli_real_escape_string($this->db->link , $data['price']);
			$quantity = mysqli_real_escape_string($this->db->link , $data['quantity']);
			$accses = mysqli_real_escape_string($this->db->link , $data['acces']);
			$camera = mysqli_real_escape_string($this->db->link , $data['camera']);
			$inout = mysqli_real_escape_string($this->db->link , $data['inout']);
			$type = mysqli_real_escape_string($this->db->link , $data['type']);


			$permited  = array('jpg', 'jpeg', 'png', 'gif');
    		$file_name = $file['image']['name'];
    		$file_size = $file['image']['size'];
   			 $file_temp = $file['image']['tmp_name'];

    		$div = explode('.', $file_name);
   		 		$file_ext = strtolower(end($div));
   		 		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    			$uploaded_image = "uploads/".$unique_image;
    		 if ($productname == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $uploaded_image == "" || $quantity=="" || $model == "" || $accses==""){
    		 	$loginmsg = "!!!Product Field Must Not be Empty!!!";
				return $loginmsg;
    		 } else{
    			move_uploaded_file($file_temp, $uploaded_image);
    			$query = "INSERT INTO tbl_products (productName,model,image,description,quantity,price,catagoryID,brandId,accesories,camera,indout,type) VALUES ('$productname','$model','$uploaded_image','$body','$quantity','$price','$catId','$brandId','$accses','$camera','$inout','$type')";
    			$result = $this->db->insert($query);
    			if ($result) {
				$loginmsg = "!!!Product Field Successfully inserted!!!";
				return $loginmsg;
			}else{
				$loginmsg = "!!!Product Not inserted!!!";
				return $loginmsg;
			}
    		}

			
		}
}