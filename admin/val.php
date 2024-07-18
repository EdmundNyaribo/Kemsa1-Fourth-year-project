<?php
if(!empty($_POST["amount"])){
	$nid = $_POST['amount'];
    if(filter_var($nid,FILTER_DEFAULT)===false || !(strlen($nid) <= 6 ) || !(is_numeric($nid)))
    {
        echo "<span style ='color:red'>Amount <b>Must</b> <b>be atmost six digits</b></span>";
        echo"<script>$('#calculate').prop('disabled',true );</script>";
    } else{
        echo "<span style ='color:green'>Input OK</span>";
        echo"<script>$('#calculate').prop('disabled',false );</script>";
    }
   
}
if(!empty($_POST["purpose"])){
	$purpose = $_POST['purpose'];
    if(filter_var($purpose,FILTER_DEFAULT)===false || !preg_match('/^[a-zA-Z]+[ ]?[a-zA-Z]+$/', $purpose))
    {
        echo "<span style ='color:red'><b>Enter letters only</b></span>";
        echo"<script>$('#calculate').prop('disabled',true );</script>";
        echo"<script>$('#save').prop('disabled',true );</script>";
    } else{
        echo "<span style ='color:green'>Input OK</span>";
        echo"<script>$('#calculate').prop('disabled',false );</script>";
        echo"<script>$('#save').prop('disabled',false );</script>";
    }
   
}
if(!empty($_POST["add"])){
	$add = $_POST['add'];
    if(filter_var($add,FILTER_DEFAULT)===false || !preg_match('/^[a-zA-Z]+[ ]?[a-zA-Z]+$/', $add))
    {
        echo "<span style ='color:red'><b>Enter letters only</b></span>";
        echo"<script>$('#submit').prop('disabled',true );</script>";
    } else{
        echo "<span style ='color:green'>Input OK</span>";
        echo"<script>$('#submit').prop('disabled',false );</script>";
    }
   
}
?>