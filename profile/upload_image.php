<?php
session_start();
include("../database/db_connection.php");

$target_dir = "images/";
//$target_file1 = $target_dir . basename($_FILES["uploader"]["name"]);
$target_file_name= $_SESSION["user_id"].".png";
$target_file = $target_dir .$target_file_name;
//echo $target_file;
//echo $target_file1;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["uploader"]["tmp_name"]);
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
if ($_FILES["uploader"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["uploader"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["uploader"]["name"]). " has been uploaded.";
        echo "success";
        $id=$_SESSION["user_id"];
        $query='UPDATE user_profile SET image_path="'.$target_file.'" WHERE id='.$id;
        $result = $conn->query($query);
        if((gettype($result) == "object" && $result->num_rows == 0) || !$result){
            echo "error";
        }else{
            echo "success";
        }
        header("Location: edit_profile.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>