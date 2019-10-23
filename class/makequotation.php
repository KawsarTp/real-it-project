<?php 
session_start();

 ?>
<?php 

    $filepath = realpath(dirname(__FILE__));
     include_once        ($filepath.'/../lib/Database.php');
	 include_once        ($filepath.'/../helper/Formate.php');
 ?>





<?php 



class makeQuotation{

		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function checkExixts($mobile,$session){
			$query = "SELECT * FROM tmp_user WHERE mobile = '$mobile'  AND session='$session' ";
			$result = $this->db->select($query);
			return $result;
						
		}

		public function InsertQuotaion($data)
		{
			$Mname = mysqli_real_escape_string($this->db->link , $data['Mname']);
			$Memail = mysqli_real_escape_string($this->db->link , $data['Memail']);
			$address = mysqli_real_escape_string($this->db->link , $data['address']);
			$mobile = mysqli_real_escape_string($this->db->link , $data['mobile']);
			$Cname = mysqli_real_escape_string($this->db->link , $data['Cname']);
			$Cmodel = mysqli_real_escape_string($this->db->link , $data['Cmodel']);
			$Cquantity = mysqli_real_escape_string($this->db->link , $data['Cquantity']);
			$Cprice = mysqli_real_escape_string($this->db->link , $data['Cprice']);
			$Ctotalprice = mysqli_real_escape_string($this->db->link , $data['Ctotalprice']);
			$date = date("Y/m/d");
			$i = substr($mobile,3,4);
			$serial = "RIT-".date("y")."-".$i;
			$session = session_id();
			if (!$this->checkExixts($session)) {
				
			$query = "INSERT INTO tmp_user (name,model,email, address,mobile,day,cameraname,quantity,unitprice,totalprice,serialNo,session) VALUES ('$Mname','$Cmodel','$Memail','$address','$mobile','$date','$Cname','$Cquantity','$Cprice','$Ctotalprice','$serial','$session')";
			$quot = $this->db->insert($query);
			return $quot;

		}else{
			$err = "<script>Mobile Number Already Exits</script>";
			return $err;
		}
	}

	public function getData()
	{
		$sid=session_id();
		$query = "SELECT * FROM tmp_user WHERE session = '$sid' LIMIT 1"; 
			$result = $this->db->select($query);
			return $result;
	}
	public function getaccess()
	{
		$sid=session_id();
		$query = "SELECT temp_quotation.*,catagory.catname,accessories.name
			FROM temp_quotation
			INNER JOIN catagory ON temp_quotation.catagory = catagory.id
			INNER JOIN accessories ON temp_quotation.productname = accessories.id WHERE session ='$sid'";
			$result = $this->db->select($query);
			return $result;
			
	}

	public function FunctionName()
	{
		$id = session_id();
    	$sql = "DELETE FROM tmp_user WHERE session='$id'";
    	$result = $this->db->delete($query);
    	return $result;
	}

	public function DeleteTwoTable()
	{
		$id = session_id();
		$sql ="DELETE tmp_user.*, temp_quotation.* FROM tmp_user
        INNER JOIN temp_quotation ON tmp_user.session = tmp_user.session; 
  		WHERE session ='$id'";
    	$result = $this->db->delete($sql);
    	
    	return $result;
	}
	public function SaveToDb($value,$mobile)
	{

		$day = date("Y/m/d");
		$sql = "INSERT INTO quotation(phone,quotation,Quotdate) VALUES('$mobile','$value','$day')";
		$result = $this->db->insert($sql);
		return $result;
	}
}