
function like_article(post_id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //go to another page after paying
            if(this.responseText=="error"){
                document.getElementById("error_message").innerHTML="Error please ocntact the support team."
            }else{
                document.getElementById("like_button_"+post_id).classList.toggle("liked");
                console.log(this.responseText);
                update_number_of_likes(post_id);
            }
        }
    };
    xmlhttp.open("POST", "like_post.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if(document.getElementById("like_button_"+post_id).classList.contains("liked")){
        action=0;//unlike
    }
    else{
        action=1;//like
    }
    console.log(action);
    xmlhttp.send("post_id="+post_id+"&action="+action);
}

function update_number_of_likes(post_id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //go to another page after paying
            if(this.responseText=="error"){
                document.getElementById("error_message").innerHTML="Error please ocntact the support team."
            }else{
                document.getElementById("likes_"+post_id).innerHTML=this.responseText;
            }
        }
    };
    xmlhttp.open("POST", "update_number_of_likes.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("post_id="+post_id);
}

function search_articles(info){
 var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //go to another page after paying
            if(this.responseText=="error"){
                document.getElementById("error_message").innerHTML="Error please ocntact the support team."
            }else{
                console.log(this.responseText);
                document.getElementById("recent_articles").innerHTML=this.responseText;
                //window.location.href = "../normal/main.php";
            }
        }
    };
    var type=document.getElementById("type").value;
    console.log("Type "+type);
    var author=document.getElementById("author").value;
    console.log("Author "+author);
    var keywords=document.getElementById("keywords").value;
    console.log("Keys "+keywords);
    xmlhttp.open("POST", "search_articles.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if(typeof info =="string"){
        if(info="recent")
            xmlhttp.send("type="+0+"&author="+author+"&keywords="+keywords);
    }
    else{
        xmlhttp.send("type="+type+"&author="+author+"&keywords="+keywords);
    }

}
