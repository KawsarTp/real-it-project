<?php 
include 'class/ajax.php';
$aj = new Ajax();
if (isset($_GET['live'])) {
	$live = $aj->getSearchData($_GET['live']);
	
}



 ?>