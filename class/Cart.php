<?php 

     $filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');
  ?>


<?php 

class Cart{
	
	private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addCart($quantity, $id){
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link , $quantity );
			$id   = mysqli_real_escape_string($this->db->link , $id );
			$sId = session_id();
			$squery = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$result = $this->db->select($squery)->fetch_assoc();
			$pName = $result['productName'];
			$price = $result['price'];
			$image = $result['image'];

			$void = "SELECT * FROM tbl_cart WHERE productId = '$id' AND  sId = '$sId'";
			$gvoid = $this->db->select($void);
			if ($gvoid) {
				$msg = "already added this product";
				return $msg; 
			}else{
			
			$query = "INSERT INTO tbl_cart (sId,productId,productName,price,quantity, image) VALUES ('$sId','$id','$pName','$price','$quantity','$image')";
    			$result = $this->db->insert($query);

    			if ($result) {
    				header("Location:cart.php");
    			}else{
    				header("Location:404.php");
    			}
    		}
			
		} 

		public function getCartProduct(){
			$sId= session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
			$result = $this->db->select($query);
			return $result;
		}


		public function updateCart($quantity, $cartid){
			$quantity = mysqli_real_escape_string($this->db->link , $quantity );
			$cartid = mysqli_real_escape_string($this->db->link , $cartid );
			$query = "UPDATE tbl_cart
							SET 
							quantity = '$quantity'
							WHERE cartId = '$cartid'
							;";
			$result = $this->db->update($query);
			if ($result) {
				header("Location:cart.php");
			}else{
				$loginmsg = "!!!Cart Not Updated!!!";
				return $loginmsg;
			}
			
		}
		public function deleteCart($data){
			$query = " DELETE FROM tbl_cart WHERE cartId ='$data'";
			$result = $this->db->delete($query);
			if ($result) {
				echo "<script>window.location = 'cart.php';<script>";
			}else{
				$loginmsg = "!!!Cart Not Deleted!!!";
				return $loginmsg;
			}
		}

		public function checkCartTable(){
			$sId= session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
			$result = $this->db->select($query);
			return $result;
		}


		public function deleteData(){
			$sId= session_id();
			$query = "DELETE FROM tbl_cart WHERE sId ='$sId'";
			$result = $this->db->delete($query);
			return $result;
		}
			public function getCartData(){
				$query = "SELECT * FROM tbl_cart";
			$result = $this->db->select($query);
			return $result;
			}

			public function orderProduct($id){
				$sId = session_id();
				$query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
				$result = $this->db->select($query);
				if ($result) {
					while($product = $result->fetch_assoc()){
						$name = $product['productName'];
						$proid = $product['productId'];
						$price = $product['price'];
						$quantity = $product['quantity'];
						$image = $product['image'];

						$sql="INSERT INTO tbl_order (userId,productId,productName,quantity,price, image) VALUES ('$id','$proid','$name','$quantity','$price','$image')";
						$insert_row = $this->db->insert($sql);
					}
				}
			}
		
}



 ?>