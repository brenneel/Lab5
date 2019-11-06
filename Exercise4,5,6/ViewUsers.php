<?php
/*printing out the start of the table page*/
echo "<body style = 'background-color:lightslategray'>";
echo "<h1 style = 'text-align:center'> List of Users</h1>";
    echo "<div style = 'text-align:center'>";
    echo "<table style = 'text-align:center;margin-left:auto;margin-right:auto; border-color:white' border = '1'>";
    echo "<tr>
            <td style = 'font-weight:bold; font-size: 20pt'>User ID</td>
        </tr>";


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
        echo "<tr>
                <td style = 'font-size:16pt;color:darkblue;font-weight:bold'> $x </td>
            </tr>";

        //printf ("%s\n", $row["user_id"]);
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();



    
    echo "</div></table></body>";

?>