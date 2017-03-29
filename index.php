<html>

<head>
  <title>File Reader</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<?php

	$openSalaryInfo = fopen("salaryinfo.txt", "r");
	$getData = fread($openSalaryInfo, filesize("salaryinfo.txt"))."<br>";
	fclose($openSalaryInfo);
	$toArray = explode("\n", $getData);
	
	foreach($toArray as $infoArray){
		$explode = explode(" ", $infoArray);
		$salaryinfo[$explode[0]] = $explode[1];
	}
	
	$avg = array_sum($salaryinfo)/sizeof($salaryinfo);
?>

<h3 class="text-success"> Maximum Salary is: <?php echo max($salaryinfo); ?> </h3>
<h3 class="text-success"> Maximum Salary is: <?php echo min($salaryinfo); ?> </h3>
<h3 class="text-success"> Average Salary is: <?php echo $avg; ?> </h3>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class="form-group">
			<label for="id">Input ID</label>
			<input type = "text" name="id" class="form-control" placeholder="e.g.E-2598">
		  </div>
		<input type="submit" name="submit"  class="btn-primary" value="Show Salary">
	</form>

</body>

</html>


<?php

	if(isset($_POST["submit"])){
		
		if (array_key_exists($_POST["id"], $salaryinfo)) {
			echo "<h3>The Salary of the employee is: ". $salaryinfo[$_POST["id"]]."</h3>";
		}
		else{
			echo "<h3>Employee not Found</h3>";
		}
	
	}

?>



