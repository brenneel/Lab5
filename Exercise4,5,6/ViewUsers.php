<?php
/*printing out the start of the table page*/
echo "<h1 style = 'text-align:center'> List of Users</h1>";

    echo "<table>";
    echo "<tr>
            <td>User ID</td>
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
                <td> $x </td>
            </tr>";

        //printf ("%s\n", $row["user_id"]);
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();




    echo "</table>";

?>