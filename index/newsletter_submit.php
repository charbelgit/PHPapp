<?php
include("../database/db_connection.php");
$email=$_POST['email'];
$name=$_POST['name'];

$query="SELECT * FROM newsletter WHERE email='".$email."'";
$sql =$conn->query($query);
$count=$sql->num_rows;
if($count==0){
    $query="INSERT into newsletter values ('".$email."','".$name."')";
    $sql =$conn->query($query);        
    $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    header("Content-type: application/json");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Origin: ". str_replace('.', '-','../') .".cdn.ampproject.org");
    header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
    header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
    header("AMP-Redirect-To: ../");
    header("Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin"); 
    echo json_encode("adib");   
    exit;
}else{
    $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    header("Content-type: application/json");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Origin: ". str_replace('.', '-','../') .".cdn.ampproject.org");
    header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
    header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
    header("AMP-Redirect-To: ../");
    header("Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin"); 
    header("HTTP/1.0 412 Precondition Failed", true, 412);
    $data = array('Already registered');
    echo json_encode($data);
    exit;
}
    ?>