<!DOCTYPE html>
<html lang = "en-US">
     <head>
         <meta charset = "UTF-8">
         <title>contact.php</title>
         <style type = "text/css">
            table, th, td {border: 1px solid black};
         </style>
     </head>
     <body>
         <?php
             
             $server = "shareddb1c.hosting.stackcp.net";
             $user = "dbTimeTracker-31361948";
             $pass = "dematicAGV123";
             $db = "dbTimeTracker-31361948";
         
             $connection = mysqli_connect($server,$user,$pass,$db);
         
             /* show tables */
             $result = mysqli_query($connection,"SHOW TABLES;") or die('cannot show tables');

             while($tableName = mysqli_fetch_row($result)) {
                 $table = $tableName[0];
	
                echo "<h3>".$table."</h3>";
                $result2 = mysqli_query($connection,"SHOW COLUMNS FROM ".$table.";") or die('cannot show columns from '.$table);
                if(mysqli_num_rows($result2)) {
                    echo '<table cellpadding="0" cellspacing="0" class="db-table">';
                    echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
                    while($row2 = mysqli_fetch_row($result2)) {
                        echo '<tr>';
                        foreach($row2 as $key=>$value) {
                            echo '<td>'.$value.'</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</table><br />';
                }
             }
         
             mysqli_close($connection);
         ?>
     </body>
</html>
