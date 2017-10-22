<?php
$server = "shareddb1c.hosting.stackcp.net";
$user = "dbTimeTracker-31361948";
$pass = "dematicAGV123";
$db = "dbTimeTracker-31361948";

$link = mysqli_connect($server, $user, $pass, $db);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

/* return name of current default database */
if ($result = $link->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}

$result = mysqli_query($link,"SELECT distinct Client FROM tbl_jobinfo"); // run the query and assign the result to $result
while($table = mysqli_fetch_array($result)) { // go through each row that was returned in $result
    echo($table[0] . "<BR>");    // print the table that was returned on that row.
}

mysqli_close($link);
?>
