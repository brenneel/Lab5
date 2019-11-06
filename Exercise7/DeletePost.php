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
            
            $query = "SELECT user_id FROM Users ORDER by user_id";
            
            if ($result = $mysqli->query($query)) {
            
                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    $x = $row["user_id"];
                    echo "<option name = '$x'>$x</option>";
            
                    //printf ("%s\n", $row["user_id"]);
                }
            
                /* free result set */
                $result->free();
            }
            
            /* close connection */
            $mysqli->close();

    echo("</table>");



?>