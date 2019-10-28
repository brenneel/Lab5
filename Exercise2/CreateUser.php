<?php
$istheSame = false;
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
        if($row["user_id"] == $_POST["inputBox"]){
            printf("comparison says they are the same");
            $istheSame = true;
        }

        printf ("%s\n", $row["user_id"]);
    }
    if($istheSame == false){
     $query = "INSERT INTO Users (user_id) VALUES ('hello')";
     $mysqli->query($query);
        printf("successfully added\n");
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();
?>
