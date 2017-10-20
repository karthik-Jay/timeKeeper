<!DOCTYPE html>
<?php
$server = "127.0.0.1:3306";
$user = "root";
$pass = "dematicAGV";
$db = "db_timetrack";

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
    <link rel="stylesheet" type="text/css" href="pageStyle.css">
  </head>

  <body>
    <h1> Data Entry Form</h1>
    <?php
      if($link) {
        echo "<div id='sqlDBON'> SQL DB CONNECTED </div>";
      } else {
        echo "<div id='sqlDBOFF'> SQL DB NOT CONNECTED </div>";
      }
    ?>
    <form>
        Owner:<br>
        <select id="owner">
          <option selected="selected" value="nothingOwner"></option> <!-- nothing selected -->
          <option value="DH">Dirk</option>
          <option value="KJ">Karthik</options>
        </select>
        <br>
       Customer:<br>
       <select id="customer" disabled = "disabled">
         <option selected="selected" value="nothingCustomer"></option> <!-- nothing selected -->
       <?php
            // get all distinct client names added in the jobinfo databse.
           $result = mysqli_query($link,"SELECT distinct Client FROM db_timetrack.tbl_jobinfo;"); // run the query and assign the result to $result
           while($table = mysqli_fetch_array($result)) { // go through each row that was returned in $result
               echo("<option value=\"". $table[0] . "\">" . $table[0] . "</option>");    // print the table that was returned on that row.
           }
        ?>
      </select>
        <br>
       Job (select an option):<br>
       <select id="jobRef" disabled = "disabled">
       </select>
       Hours:<br>
       <input id="hours" disabled = "disabled" type="text" name="hours"><br>
       Date: (YYYY-MM-DD)<br>
       <input id="date" disabled = "disabled" type="text" name="date"><br>
     <input id="submit" disabled = "disabled" type="submit" value="Submit">
    </form>
  </body>

   <script src="js/preventSelect.js"></script>
</html>

<?php
mysqli_close($link);
 ?>
