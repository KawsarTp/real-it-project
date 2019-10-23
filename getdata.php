<?php 
session_start();
$id =session_id();
include "class/ajax.php";
$bj = new Ajax();

$result = $bj->getDataAjax($id);
if ($result) {
echo "<table class='table table-bordered col-md-12' style='margin-left:20px'>
<tr>
<th>Serial</th>
<th>Catagory</th>
<th>Product Name</th>
<th>Unit Price</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Action</th>
</tr>";
while($row = $result->fetch_assoc()) {
	static $i =1;
    echo "<tr>";
    echo "<td>".$i."</td>";
    echo "<td>" . $row['catname'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['unitprice'] . "</td>";
    echo "<td>" . $row['quantity'] . "</td>";
    echo "<td>" . $row['totalprice'] . "</td>";
    echo "<td>
    <a href='' class='btn btn-primary'>Edit</a>
    <a href='?delid=".$row['id']."' class='btn btn-danger'>Delete</a>
    </td>";
    echo "</tr>";
    $i++;
  } 
  	$result = $bj->getSum($id);
  	$data = $result->fetch_assoc(); 
  echo "<tr>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<th>Total:</th>
    	<td>";
    	echo $data['value_sum'];
    	echo "</td>
    	<td><button id='myBtn' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Create Quotation</button></td>
    </tr>";
echo "</table>";
}else{
	echo "<table class='table table-bordered col-md-12' style='margin-left:20px'>
<tr>
<th>Serial</th>
<th>Catagory</th>
<th>Product Name</th>
<th>Unit Price</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Action</th>
</tr>";
echo "<td colspan='7' class='text-center'>No Product Selected</td>";
}

