<?php
$isValidUser = false;
$inputUser = $_POST['inputUser'];
$inputPost = $_POST['inputPosts'];

$mysqli = new mysqli("mysql.eecs.ku.edu", "ethanlbrenner", "brenner3280", "ethanlbrenner");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users ORDER by user_id";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        if($row["user_id"] == $inputUser){
            //printf("user already exists");
            $isValidUser = true;
        }

        //printf ("%s\n", $row["user_id"]);
    }
    if($isValidUser == true){
        $query2 = "INSERT INTO Posts (author_id, content) VALUES ('$inputUser','$inputPost')";
     
     if($mysqli->query($query2)){
        printf("successfully added post\n");
     }
        
    }
    else{
        printf("username does not exist. The post was not saved");
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();
?>
