<?php

    $server = "shareddb1c.hosting.stackcp.net";
    $user = "dbTimeTracker-31361948";
    $pass = "dematicAGV123";
    $db = "dbTimeTracker-31361948";

    $link = mysqli_connect($server, $user, $pass, $db);

    if (!$link)
      {
      die('Could not connect: ' . mysqli_error());
      }
    
    $id ="NULL";
    $hours = mysqli_real_escape_string($link,$_REQUEST["hours"]);
    $job_id = mysqli_real_escape_string($link,$_REQUEST["jobRef"]);
    $date = mysqli_real_escape_string($link,$_REQUEST["date"]);
    $client = mysqli_real_escape_string($link,$_REQUEST["customer"]);
    $owner = mysqli_real_escape_string($link,$_REQUEST["owner"]);

    $sql = "SELECT Job_ID FROM tbl_jobinfo WHERE RefNum=\"".$job_id."\" AND Client=\"".$client."\";";
    $result = mysqli_query($link,$sql);
    while($table = mysqli_fetch_array($result)) {
        $job_id = $table[0];
    }

    $sql="INSERT INTO tbl_hours (ID, Hours, Job_ID, Date, Owner) VALUES (".$id.",".$hours.",".$job_id.",".$date.",'".$owner."');";

    if (!mysqli_query($link,$sql)) {
        die('Error: ' . mysqli_error());
    }

    echo "1 record added";      
    
    mysqli_close($link);
?> 