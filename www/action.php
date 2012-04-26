<?php
	$host='sql-4.radyx.ru:3306';
	$database='courier614';
	$user='courier614'; 
	$pswd='swki6qr256'; 
 
	$dbh = mysql_connect($host, $user, $pswd) or die("Cannot connetct to MySQL.");
	mysql_select_db($database) or die("Cannot find db.");
		
	$txtName = check_input($_POST["txtName"], "Enter your name!");
	$txtPhone = check_input($_POST["txtPhone"], "Enter your phone!");
	$txtOrder = check_input($_POST["txtOrder"], "What order you want to send?");
	$txtFrom = check_input($_POST["txtFrom"], "Where should we send from?");
	$txtTo = check_input($_POST["txtTo"], "Where should we send to?");
	$slcType = check_input($_POST["slcType"], "What delivery type you need?");
	
	//$query = "INSERT INTO customer (name, phone) VALUES ( '".$_POST['txtName']."' , '".$_POST['txtPhone']."' )";
	//mysql_query($query);
	$query = "INSERT INTO order (name, adress_From, adress_To) VALUES ( '".$_POST['txtOrder']."','".$_POST['txtFrom']."', '".$_POST['txtTo']."' )";
	mysql_query($query);
	mysql_close($dbh);
	
	function check_input($data, $problem = "")
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		if ($problem && strlen($data) == 0)
		{
			show_error($problem);
		}
		return $data;
	}
	
	function show_error($myError)
	{
		?>
		<html>
		<body>
			<p>Correct some errors:</p>
			<?php echo $myError; ?>
		</body>
		</html>

		<?php
			exit();
	}
	echo '</body>';
	echo '</html>';
	exho '<a href="index.html"> index </a>';
?>
