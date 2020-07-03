<?php
session_start();
require 'dbh.inc.php';

$target_dir = "business_logos/";

$target_file_name= $_SESSION["business_id"].".png";
$target_file = $target_dir .$target_file_name;
//echo $target_file;
//echo $target_file1;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
/*
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["file"]["size"] > 4500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        echo "success";
        $id=$_SESSION["business_id"];
        $query='UPDATE business_account SET logo_path="'.$target_file_name.'" WHERE business_id='.$id;
        $result = $conn->query($query);
        if((gettype($result) == "object" && $result->num_rows == 0) || !$result){
            echo "error";
        }else{
            echo "success";
        }
        header("Location: business_editprofile.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
