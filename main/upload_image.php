<?php
session_start();
include("../database/db_connection.php");
$caption='';
if (isset($_POST['caption'])) {
  $caption=htmlspecialchars($_POST['caption'],ENT_QUOTES, 'UTF-8');
}

$target_dir = "post_images/";
//$target_file1 = $target_dir . basename($_FILES["file"]["name"]);
$rand=random_int(0,9999);
$target_file_name= $rand.".png";
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
if ($_FILES["file"]["size"] > 1500000) {
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
      //  $id=$rand;
        $user_id=$_SESSION['user_id'];
        $date = date("Y-m-d H:i:s", time());
        $sql = "INSERT INTO post (user_id,reply_to_id,date,type) VALUES ('$user_id',0,'$date',0)";
        if ( $conn->query($sql) !== FALSE) {
            $sql = "Select id from post where user_id='$user_id' and date='$date'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $id=$row["id"];

        $query="INSERT INTO  post_newsfeed_images(imagepath,caption,user_id) VALUES('$target_file','$caption','$user_id') ";
        $result = $conn->query($query);
        if((gettype($result) == "object" && $result->num_rows == 0) || !$result){
            echo "error";
        }else{
            echo "success";
        }
        header("Location: news.php?uploadsuccess");
    }else {
      echo '<h2> Something went wrong</h2>';
    }
  }


     else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
