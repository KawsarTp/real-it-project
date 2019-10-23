
<?php 
     $filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');
 ?>

 <?php 

 class Ajax{
 	private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function getPrice($data){
			$sql="SELECT price FROM accessories WHERE id = '$data'";
			$result = $this->db->select($sql);
			return $result;
			
		}
		public function getPriceHvr($data){
			$sql="SELECT price FROM accessories WHERE id = '$data'";
			$result = $this->db->select($sql);
			return $result;
			
		}

		public function getPriceHdd($data){
			$sql="SELECT price FROM accessories WHERE id = '$data'";
			$result = $this->db->select($sql);
			return $result;
			
		}

		public function getPriceMonitor($data){
			$sql="SELECT price FROM accessories WHERE id = '$data'";
			$result = $this->db->select($sql);
			return $result;
			
		}

		public function getPriceUps($data){
			$sql="SELECT price FROM accessories WHERE id = '$data'";
			$result = $this->db->select($sql);
			return $result;
			
		}

		public function getPricePOE($data){
			$sql="SELECT price FROM accessories WHERE id = '$data'";
			$result = $this->db->select($sql);
			return $result;
			
		}


		public function getPriceAdapter($data){
			$sql="SELECT price FROM accessories WHERE id = '$data'";
			$result = $this->db->select($sql);
			return $result;
			
		}
		public function getName($data){
			$sql="SELECT id,name FROM accessories WHERE catagory = '$data'";
			$result = $this->db->select($sql);
			return $result;
			
		}

		public function getProduct($data){
			$sql="SELECT id,name FROM accessories WHERE catagory = '$data'";
			$result = $this->db->select($sql);
			return $result;
			
		}

		public function getProductById($data)
		{
			$sql="SELECT price FROM accessories WHERE id = '$data'";
			$result = $this->db->select($sql);
			return $result;
		}
		public function checkExixts($data,$a,$b){
			$query = "SELECT * FROM temp_quotation WHERE catagory='$a' AND productname='$b' AND session = '$data'";
			$result = $this->db->select($query);
			return $result;
			
		}
		public function datainsertajax($data)
		{
			$catagory =  mysqli_real_escape_string($this->db->link ,$data['catagory']);
			$product =  mysqli_real_escape_string($this->db->link ,$data['pro']);
			$Uprice =  mysqli_real_escape_string($this->db->link ,$data['Uprice']);
			$quantity =  mysqli_real_escape_string($this->db->link ,$data['quantity']);
			$totalprice =  mysqli_real_escape_string($this->db->link ,$data['totalprice']);
			
			$session = session_id();
			if ($this->checkExixts($session,$catagory,$product)) {
				$err = "You Have Already Add This";
				return $err;
			}else{

			if (empty($catagory) || empty($product) || empty($Uprice) || empty($quantity) || empty($totalprice)) {
				$loginmsg = "!!!  Field must not be empty !!!";
				return $loginmsg;
			}else{
				$query = "INSERT INTO temp_quotation(catagory,productname,unitprice,quantity,totalprice,session) VALUES ('$catagory','$product','$Uprice','$quantity','$totalprice','$session')";
				$result = $this->db->insert($query);

				if ($result) {
				$loginmsg = "!!!Field Successfully inserted!!!";
				return $loginmsg;
			}
			}
		}

		}

		public function getDataAjax($id)
		{

			$query = "SELECT temp_quotation.*,catagory.catname,accessories.name
			FROM temp_quotation
			INNER JOIN catagory ON temp_quotation.catagory = catagory.id
			INNER JOIN accessories ON temp_quotation.productname = accessories.id WHERE session='$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function getSum($id)
		{
			$query="SELECT SUM(totalprice) AS value_sum FROM temp_quotation Where session='$id'";
			$result = $this->db->select($query);
			return $result;
		}


		public function delPro($id)
		{
			$query="DELETE FROM temp_quotation WHERE id='$id'";
			$result = $this->db->delete($query);
			return $result;
		}


		public function getSearchData($data)
		{
			$sql = "SELECT * FROM tbl_products WHERE productname LIKE '%$data%'";
			$result = $this->db->select($sql);
			if ($result) {
				while ($getdata = $result->fetch_assoc()) {
					$data = "";
					$data .="<div class='item thumbnail'>";
        			$data .="<img src='admin/".$getdata['image']."'>";
        			$data .='<p>Name:'.$getdata['productname'].'</p>';
        			$data .="<p>Price:". $getdata['price'].'</p>';
        			$data .='<a href="productpage1.php?proid="'.$getdata['id'].'>View Details</a></div>';
	}
	echo $data;
			}else{
				echo "<span style='color:white ;background:teal;padding:10px;float:left;text-align:center'>Product not found</span>";
			}
		}


		
 }