<?php
    session_start();
    include("../database/db_connection.php");
    if($_POST["author"]==""){
        unset($_POST["author"]);
    }else{
        $author=$_POST["author"];
    }
    if($_POST["keywords"]==""){
        unset($_POST["keywords"]);
    }else{
        $keywords=$_POST["keywords"];
    }
    //type //author //keywords
    $type=$_POST["type"];
    $anything_set=true;
    $author_id;
    $type_id=$type;
    $keywords_condition="";
    date_default_timezone_set("Asia/Nicosia");
    $date = date("Y-m-d H:i:s", time());
    if(isset($_SESSION["user_id"])){
        $user_id=$_SESSION["user_id"];
    }
    //echo $user_id;
    if(isset($_POST["author"])){
        $sql_author="SELECT id from user_profile where name='$author'";
        $result=$conn->query($sql_author);
        if ($result !== FALSE) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $author_id=$row["id"];
            }
            else{
                $author_id="";
                //echo "0 RESULTS AUTHOR";
            }
        }else {
            echo "error";
        }
    }
    /*if(isset($_POST["type"])){
        $sql_author="SELECT id from article_type where type='$type'";
        echo $sql_author;
        $result=$conn->query($sql_author);
        if ($result !== FALSE) {
            if ($result->num_rows > 0) {
                echo 1;
                $row = $result->fetch_assoc();
                $type_id=$row["id"];
                echo $row["id"];
            }
            else{
                //echo "0 RESULTS TYPE";
            }
        }else{
            echo "error";
        }
    }*/
    if(isset($_POST["keywords"])){
        $keywords_split = preg_split("/[^\w]*([\s]+[^\w]*|$)/", strtolower($keywords), -1, PREG_SPLIT_NO_EMPTY);
        //print_r($split);
        //echo $keywords_condition;
        for ($i = 0; $i < count($keywords_split); $i++) {
            //echo "HI";
            $keywords_condition=$keywords_condition."a.keyword LIKE '%".$keywords_split[$i]."%' or ";
        }
        $keywords_condition=substr($keywords_condition, 0, -3);
        //echo $keywords_condition;
    }
    if(isset($_POST["type"]) && isset($_POST["author"]) && isset($_POST["keywords"]))
        if($type==0){
            $sql = 'SELECT * FROM post as p INNER JOIN article_keywords as a on p.id=a.id INNER JOIN post_text as pt on p.id=pt.id where p.reply_to_id=0 and p.user_id="'.$author_id.'" and '.$keywords_condition;
        }
        else
            $sql = 'SELECT * FROM post as p INNER JOIN article_keywords as a on p.id=a.id INNER JOIN post_text as pt on p.id=pt.id where p.reply_to_id=0 and p.user_id="'.$author_id.'" and p.type='.$type_id.' and '.$keywords_condition;
    else if(isset($_POST["type"]) && isset($_POST["author"]))
        if($type==0)
            $sql = 'SELECT * FROM post as p INNER JOIN post_text as pt on p.id=pt.id where p.reply_to_id=0 and p.user_id="'.$author_id.'"';
        else
            $sql = 'SELECT * FROM post as p INNER JOIN post_text as pt on p.id=pt.id where p.reply_to_id=0 and p.user_id="'.$author_id.'" and p.type="'.$type_id.'"';
    else if(isset($_POST["type"]) && isset($_POST["keywords"]))
        if($type==0){
            $sql = 'SELECT * FROM post as p INNER JOIN article_keywords as a on p.id=a.id INNER JOIN post_text as pt on p.id=pt.id where p.reply_to_id=0 and "'.$keywords_condition.'"';
        }else
            $sql = 'SELECT * FROM post as p INNER JOIN article_keywords as a on p.id=a.id INNER JOIN post_text as pt on p.id=pt.id where p.reply_to_id=0 and p.type='.$type_id.' and "'.$keywords_condition.'"';
    else if(isset($_POST["type"]))
        if($type==0)
            $sql = "SELECT * from post as p INNER JOIN user_profile as u_p on p.user_id=u_p.id INNER JOIN post_text as pt on p.id=pt.id where p.reply_to_id=0";
        else
            $sql = "SELECT * from post as p INNER JOIN post_text as pt on p.id=pt.id where p.reply_to_id=0 and p.type='$type_id'";
    else $anything_set=false;
    //echo $sql;
    $final_text="";
    $liked="";
    if($anything_set){
        $result=$conn->query($sql) ;
        if ($result !== FALSE) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
       /*              foreach ($row as $col => $val) {
            echo $col." = ".$val."<br>";
        }*/
                    if(isset($_SESSION["user_id"])){
                        $sql2="SELECT * FROM post_like WHERE user_id=".$_SESSION["user_id"]." and post_id=".$row["id"];
                    }
                    $sql3="SELECT * FROM post_like WHERE post_id=".$row["id"];
                    $result3=$conn->query($sql3);
                    $likes=$result3->num_rows;
                    if(isset($_SESSION["user_id"])){
                        $result2=$conn->query($sql2);
                        if ($result2->num_rows > 0)
                            $liked="liked";
                        else
                            $liked="";
                    }
                    $text=$row["text"];
                    if(strlen($text)>200){
                        $text=substr($text,0,200)."...";
                    }
                    if(isset($_SESSION["user_id"])){
                        $button_like=' <button id="like_button_'.$row["id"].'" onclick="like_article('.$row["id"].');" class="button button-like '.$liked.'"><i class="fa fa-heart"></i><span>Like</span></button>
                        <span id="likes_'.$row["id"].'">'.$likes.'</span>';
                    }else{
                        $button_like='<span id="likes_'.$row["id"].'">'.$likes.' likes</span>';
                    }

                    $final_text= $final_text. '<br><br>'.
                    '<div class="row" data-aos="fade">
                    <div class="col-md-12">
                      <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                         <div class="mb-4 mb-md-0 mr-5">
                          <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h4">'.$row["title"].'</h2>
                            <div class="badge-wrap">
                             <span class="bg-warning text-white badge py-2 px-4">Posted on '.date('d-m-Y', strtotime($row["date"])).' at '.explode(" ",$row["date"])[1].'</span>
                            </div>
                          </div>
                          <div class="job-post-item-body d-block d-md-flex">
                            <div class="mr-3">'.$row["username"].'<!--<span class="fl-bigmug-line-portfolio23"></span>--> <a href="#"> </a></div>
                            <div><!--<span class="fl-bigmug-line-big104"></span>--> <span>'.$text.'</span></div>
                          </div>
                         </div>

                         <div class="ml-auto">
                          '.$button_like.'
                           
                           <a href="viewarticle.php?id='.$row["id"].'" class="btn btn-primary py-2">View Article</a>
                         </div>

                      </div>
                    </div>
                   </div>';
                }
                echo $final_text;
            }
            //echo "worked";
            //header('Location: ../normal/main.php');
            //echo "";
        }else{
            echo("Error description: " . $conn->error);
            echo "error";
        }
    }
    else echo "NOTHING SET";
?>
