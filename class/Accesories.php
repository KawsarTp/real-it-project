<?php 
	$filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');
  ?>

<?php

 
 	class Accesories{
 		
 		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
			public function checkExixts($data,$a){
			$query = "SELECT * FROM accessories WHERE name = '$data' OR model='$a' ";
			$result = $this->db->select($query);
			return $result;
						
		}
		public function productInsert($data){
			$productname = mysqli_real_escape_string($this->db->link , $data['proname']);
			$catId = mysqli_real_escape_string($this->db->link , $data['catId']);
			$brandId = mysqli_real_escape_string($this->db->link , $data['brandId']);
			$body = mysqli_real_escape_string($this->db->link , $data['body']);
			$price = mysqli_real_escape_string($this->db->link , $data['price']);
			$model = mysqli_real_escape_string($this->db->link , $data['model']);
			$camera = mysqli_real_escape_string($this->db->link , $data['camera']);
			$country = mysqli_real_escape_string($this->db->link , $data['country']);

			if (empty($productname) || empty($catId)|| empty($brandId)|| empty($body)|| empty($price)|| empty($model)|| empty($camera) || empty($country)) {
    		 			$err = "!!! Category Field must not be empty !!!";
						return $err;
    		 }

    		 if (!$this->checkExixts($productname,$model)) {
				$query = "INSERT INTO accessories (name,catagory,brand,description,price,model,camera,country) VALUES ('$productname','$catId','$brandId','$body','$price','$model','$camera','$country')";
    			$result = $this->db->insert($query);
    			if ($result) {
				$loginmsg = "!!!Product Field Successfully inserted!!!";
				return $loginmsg;
			}else{
				$loginmsg = "!!!Product Not inserted!!!";
				return $loginmsg;
			}
    		 }else{
    			$err = "!!! alredy have in database !!!";
						return $err;
    		}
    	}

			



		public function getAllAccessbyCatagory(){
			$query = "SELECT accessories.*, catagory.catName,brand.brandName 
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory = catagory.id
			INNER JOIN brand
			ON accessories.brand = brand.id
			ORDER BY accessories.id ASC";
			$result = $this->db->select($query);
			return $result;
		}

		

		public function getSingleProduct(){
			$query = "SELECT accessories.*, catagory.catname
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory= catagory.id
			WHERE catagory.catname = 'NVR'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getSingleProductForDvr(){
			$query = "SELECT accessories.*, catagory.catname
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory= catagory.id
			WHERE catagory.catname = 'HVR'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getSingleProductForHDD(){
			$query = "SELECT accessories.*, catagory.catname
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory= catagory.id
			WHERE catagory.catname = 'HDD'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getSingleProductForMonitor(){
			$query = "SELECT accessories.*, catagory.catname
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory= catagory.id
			WHERE catagory.catname = 'Monitor'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getSingleProductForAdapter(){
			$query = "SELECT accessories.*, catagory.catname
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory= catagory.id
			WHERE catagory.catname = 'Adapter'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getSingleProductForUps(){
			$query = "SELECT accessories.*, catagory.catname
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory= catagory.id
			WHERE catagory.catname = 'UPS'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getSingleProductForPoe(){
			$query = "SELECT accessories.*, catagory.catname
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory= catagory.id
			WHERE catagory.catname = 'POE switch'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getSingleProductForinjector(){
			$query = "SELECT accessories.*, catagory.catname
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory= catagory.id
			WHERE catagory.catname = 'POE injector'";
			$result = $this->db->select($query);
			return $result;
		}

		public function getSingleProductForCat(){
			$query = "SELECT accessories.*, catagory.catname
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory= catagory.id
			WHERE catagory.catname = 'Cable'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getSingleProductForRj(){
			$query = "SELECT accessories.*, catagory.catname
			FROM accessories
			INNER JOIN catagory
			ON accessories.catagory= catagory.id
			WHERE catagory.catname = 'Rj45 Connector'";
			$result = $this->db->select($query);
			return $result;
		}
		public function productDelete($data){
			$sql = "DELETE FROM accessories WHERE id='$data'";
			$result = $this->db->delete($sql);
			return $result;
		}
		
		public function productSearch($search){
			$catagory = $search['product'];
			$brand = $search['brand'];
			$model = $search['model'];
			$query = "SELECT * FROM tbl_products WHERE productname,model,catagory LIKE '$catagory','$brand','$model'";
			$result = $this->db->select($query);
			

			return $result;

		}

		public function getProduct(){
			$query = "SELECT tbl_products.*, catagory.catname,brand.brandname 
			FROM tbl_products
			INNER JOIN catagory
			ON tbl_products.catagoryID = catagory.id
			INNER JOIN brand
			ON tbl_products.brandId = brand.id";
			
			$result = $this->db->select($query);
			return $result;
		}


		public function getProductByIndoor(){
			$query = "SELECT tbl_products.*, catagory.catname,brand.brandname 
			FROM tbl_products
			INNER JOIN catagory
			ON tbl_products.catagoryID = catagory.id
			INNER JOIN brand
			ON tbl_products.brandId = brand.id WHERE camera=1 AND indout=1 ";
			
			$result = $this->db->select($query);
			return $result;
		}
		public function getProductByoutdoor(){
			$query = "SELECT tbl_products.*, catagory.catname,brand.brandname 
			FROM tbl_products
			INNER JOIN catagory
			ON tbl_products.catagoryID = catagory.id
			INNER JOIN brand
			ON tbl_products.brandId = brand.id WHERE camera=1 AND indout=2";
			
			$result = $this->db->select($query);
			return $result;
		}

		public function getProductByNonindoor(){
			$query = "SELECT tbl_products.*, catagory.catname,brand.brandname 
			FROM tbl_products
			INNER JOIN catagory
			ON tbl_products.catagoryID = catagory.id
			INNER JOIN brand
			ON tbl_products.brandId = brand.id WHERE camera=2 AND indout=1";
			
			$result = $this->db->select($query);
			return $result;
		}

		public function getProductByNonoutdoor(){
			$query = "SELECT tbl_products.*, catagory.catname,brand.brandname 
			FROM tbl_products
			INNER JOIN catagory
			ON tbl_products.catagoryID = catagory.id
			INNER JOIN brand
			ON tbl_products.brandId = brand.id WHERE camera=2 AND indout=2";
			
			$result = $this->db->select($query);
			return $result;
		}
		public function getItembyproid($data){
			$query = "SELECT camera FROM tbl_products WHERE id='$data'";
			$result = $this->db->select($query);
			return $result;
		}

		public function serialGenerate(){
			$i= rand(1,500);
				$serial= "RIT-".date("y")."-".$i;
			return $serial;
		}


		
 	}

 ?>