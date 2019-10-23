<?php  
include "class/ajax.php";
if (isset($_POST['proid']) && !empty($_POST['proid'])) {
	$aj = new Ajax();
	$result = $aj->getProduct($_POST['proid']);
	if ($result) {
		echo "<option>--Select--</option>";
		while($row = $result->fetch_assoc()){
		echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
		}
	}else{
		echo "<option>No Product Found</option>";
	}
}

if (isset($_POST['price']) && !empty($_POST['price'])) {
	$aj = new Ajax();
	$result = $aj->getProductById($_POST['price']);
	if ($result) {
		while($row = $result->fetch_assoc()){
			echo $row['price'];
		}
	}else{
		echo "No Price";
	}
}






?>