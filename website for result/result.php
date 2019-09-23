 <html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<button type="button" class="btn">Basic</button>
<hr>

<div class="container">

<hr>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Morning</th>
        <th>Evening</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
<?php 

$link = mysqli_connect("localhost", "root", "", "atten"); 
$sdate =$_GET['date'];
$name =$_GET['name'];
$edate =$_GET['date1'];
echo "<h2>".$sdate. "&nbsp;&nbsp;&nbsp;TO &nbsp;&nbsp; &nbsp;".$edate."</h2>";

$sql = "SELECT name,morning,evening,date FROM students where name = '$name' AND date between '$sdate'  AND '$edate' ";
$res1 = mysqli_query($link, $sql);
$row=mysqli_num_rows($res1);
echo "<h2>".$row."</h2>";
if ($res = mysqli_query($link, $sql)) { 
	if (mysqli_num_rows($res) > 0) { 
		while ($row = mysqli_fetch_array($res)) { 
			echo "<tr>"; 
			echo "<td>".$row['name']."</td>"; 
			echo "<td>".$row['morning']."</td>"; 
			echo "<td>".$row['evening']."</td>";
                        echo "<td>".$row['date']."</td>"; 
			echo "</tr>"; 
		} 
		echo "<tbody>";
		
		echo "</table>"; 
	 
	} 
	else { 
		echo "No matching records are found."; 
	} 

} 
else { 
	echo "ERROR: Could not able to execute $sql. "
								.mysqli_error($link); 
} 

mysqli_close($link); 
?> 
<div class="col-sm-offset-5 col-sm-2 text-center pb-10">
<a class="btn btn-primary float-right" href="/myproject/index.html">&larr;BACK</a>
</div>
</div>
</body>
</html>

