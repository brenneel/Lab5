<?php
    $input = $_POST['selectBox'];
    echo ("<body>");
    echo ("<h1 style = 'text-align:center'>Here are the posts from PUT USER HERE</h1>");
    echo ("$input");
    echo ("<table>");

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
            
            /* something is going wrong here, there appears to be no content inside "content"
                need to investigate where this is a table issue or something else
                */
            $tempPost = $row['content'];
       
            if($row['author_id'] == $input){
            echo ("<tr>
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