<?php
$db_host = "shareddb1c.hosting.stackcp.net"; // Server Name
$db_user = "dbTimeTracker-31361948"; // Username
$db_pass = "dematicAGV123"; // Password
$db_name = "dbTimeTracker-31361948"; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql1 = 'SELECT * 
		FROM tbl_hours';

$sql2 = 'SELECT * 
		FROM tbl_jobinfo';
		
$query = mysqli_query($conn, $sql2);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<title>Table Data</title>
	<link rel="stylesheet" type="text/css" href="tableStyle.css">
</head>
<body>
    <h1>Table 1</h1>
	<table class="data-table">
		<caption class="title">Job Information</caption>
		<thead>
			<tr>
				<th>Job_ID</th>
				<th>RefNum</th>
				<th>Description</th>
				<th>Client</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$row['Job_ID'].'</td>
					<td>'.$row['RefNum'].'</td>
					<td>'.$row['Description'].'</td>
					<td>'.$row['Client'].'</td>
					<td>'.$row['Address'].'</td>
				</tr>';
		}
        ?>
		</tbody>
	</table>
    
	<h1>Table 2</h1>
	<table class="data-table">
		<caption class="title">Hours on Jobs</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>HOURS</th>
				<th>JOB_ID</th>
				<th>DATE</th>
				<th>OWNER</th>
			</tr>
		</thead>
		<tbody>
		<?php
        $query = mysqli_query($conn, $sql1);
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$row['ID'].'</td>
					<td>'.$row['Hours'].'</td>
					<td>'.$row['Job_ID'].'</td>
					<td>'.$row['Date'].'</td>
					<td>'.$row['Owner'].'</td>
				</tr>';
		}
        mysqli_close($conn);
        ?>
		</tbody>
	</table>
</body>
</html>