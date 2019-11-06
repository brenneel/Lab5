<?php
    $input = $_POST['selectBox'];
    echo ("<body style = 'background-color:lightslategray'>");
    echo ("<h1 style = 'text-align:center'>Here are the posts from PUT USER HERE</h1>");
    echo ("<table border = '1' style = 'text-align:center;margin-left:auto;margin-right:auto; border-color:white'>");
    echo ("<tr><th style = 'font-size:16pt'>User Posts</th></tr>");

    $mysqli = new mysqli("mysql.eecs.ku.edu", "ethanlbrenner", "brenner3280", "ethanlbrenner");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "SELECT * FROM Posts ORDER by author_id";

    if ($result = $mysqli->query($query)) {

        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
       
            $tempPost = $row['content'];
       
            if($row['author_id'] == $input){
            echo ("<tr style = 'font-size:16pt;color:darkblue;font-weight:bold'>
                    <td>$tempPost</td>
                    </tr>");

            }
            //printf ("%s\n", $row["user_id"]);
        }

        /* free result set */
        $result->free();
    }

    /* close connection */
    $mysqli->close();

    echo ("</table></body>");
?>