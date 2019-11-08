<?php
    echo("<body style = 'background-color:lightslategray'><h1 style = 'text-align:center'>Posts Successfully Deleted</h1>");

    echo("<table border = '1' style = 'text-align:center;margin-left:auto;margin-right:auto; border-color:white'><tr><th>Deleted Post-ids</th></tr>");

            /* getting the table from the database */
            $mysqli = new mysqli("mysql.eecs.ku.edu", "ethanlbrenner", "brenner3280", "ethanlbrenner");
            
            /* check connection */
            if ($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }
            
            $query = "SELECT * FROM Posts ORDER by post_id DESC";
            
            if ($result = $mysqli->query($query)) {
            $inputBox = $_POST['inputBox'];
                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    $postId = $row['post_id'];
                   // $num = $row['post_id'];
                   for($i = 0; $i <= $postId; $i ++){
                       if($inputBox[$i] == $postId){
                           $query2 = "DELETE FROM Posts WHERE post_id ='$postId'";
                           if($mysqli->query($query2)){
                               echo("<tr><td>$postId</td></tr>");
                           }
                       }
                   }
                  
                  
                    
            
                    //printf ("%s\n", $row["user_id"]);
                }
            
                /* free result set */
                $result->free();
            }
            
            /* close connection */
            $mysqli->close();

    echo("</table>");



?>