<?php 

include 'class/makequotation.php';

$mak=new makeQuotation();

if (isset($_POST['submit'])) {
$result = $mak->InsertQuotaion($_POST);
if ($result) {
	header("location:qotpdf.php");
}
}


 ?>