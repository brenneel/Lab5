<?php
    echo("<h1 style = 'text-align:center'>Posts Successfully Deleted</h1>");

    echo("<table><tr><th>Deleted Post Id's</th></tr>");

            /* getting the table from the database */
            $mysqli = new mysqli("mysql.eecs.ku.edu", "ethanlbrenner", "brenner3280", "ethanlbrenner");
            
            /* check connection */
            if ($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }
            
            $query = "SELECT * FROM Posts ORDER by post_id";
            
            if ($result = $mysqli->query($query)) {
            $inputBox = $_POST['inputBox'];
                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    $postId = $row['post_id'];
                    $num = count($inputBox);
                   for($i = 0; $i < $num; $i ++){
                       if($inputBox[$i] == $postId){
                           $query2 = "DELETE FROM Posts WHERE post_id ='$i'";
                           if($mysqli->query($query2)){
                               printf("successfully deleted\n");
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