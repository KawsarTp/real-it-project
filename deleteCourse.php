<?php 
include "class/ajax.php";
$aj = new Ajax();
if(isset($_GET['delid'])){
    $id=$_GET['delid'];
    $id = mysql_escape_string($id);

    $result = $aj->delPro($id);
}