<!DOCTYPE html>
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

//echo "Success: A proper connection to MySQL was made! The ".$db." database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

?>

<html>
 <meta charset="ISO-8859-1">
  <head>
    <title> Data Entry for TSPro </title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="jquery-ui/jquery-ui.js"></script>        
    <link href="jquery-ui/jquery-ui.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="pageStyle.css">
  </head>

  <body>
    <a href="showTableInfo.php"><h1>Show Table Info</h1></a>  
    <a href="showTableData.php"><h1>Show Table Data</h1></a> 
    <a href="addNewJob.php"><h1>Add New Job</h1></a> 
    <h1> Add Job Hours</h1>
    <?php
      if($link) {
        echo "<div id='sqlDBON'> SQL DB CONNECTED </div>";
      } else {
        echo "<div id='sqlDBOFF'> SQL DB NOT CONNECTED </div>";
      }
    ?>
    <form action="insert.php" method="post">
        
        Owner:<br>
        <select id="owner" name="owner">
          <option selected="selected" value="nothingOwner"></option> <!-- nothing selected -->
          <option value="DH">Dirk</option>
          <option value="KJ">Karthik</option>
        </select>
        <br>
        
       Customer:<br>
       <select id="customer" name="customer">
         <option selected="selected" value="nothingCustomer"></option> <!-- nothing selected -->
       <?php
            // get all distinct client names added in the jobinfo databse.
           $result = mysqli_query($link,"SELECT distinct Client FROM tbl_jobinfo;"); // run the query and assign the result to $result
           while($table = mysqli_fetch_array($result)) { // go through each row that was returned in $result
               echo("<option value=\"". $table[0] . "\">" . $table[0] . "</option>");    // print the table that was returned on that row.
           }
        ?>
        </select>
        <br>
        
       Job Num / Incident ID / Indirect Code(select an option):<br>
       <select id="jobRef" name="jobRef">
           <option selected="selected" value="nothingRefNum"></option> <!-- nothing selected -->
           <?php
            // get all distinct client names added in the jobinfo databse.
           $result = mysqli_query($link,"SELECT distinct RefNum FROM tbl_jobinfo;"); // run the query and assign the result to $result
           while($table = mysqli_fetch_array($result)) { // go through each row that was returned in $result
               echo("<option value=\"". $table[0] . "\">" . $table[0] . "</option>");    // print the table that was returned on that row.
           }
           
           mysqli_close($link);
        ?>
       </select>
        <br>
        
       Hours:<br>
       <input id="hours" type="text" name="hours"><br>
        
       Date:<br>
       <input id="date" type="text" name="date"><br>
        
     <input id="submit" type="submit" value="Submit">
    </form>
  </body>

    <script>
        $( function() {
            $( "#date" ).datepicker({ dateFormat: 'yy-mm-dd' });
          } );
    </script>
   <!--<script src="js/preventSelect.js"></script>-->
</html>
