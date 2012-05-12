<?php
	$host='sql-4.radyx.ru:3306'; // имя хоста (уточняется у провайдера)
	$database='courier614'; // имя базы данных, которую вы должны создать
	$user='courier614'; // заданное вами имя пользователя, либо определенное провайдером
	$pswd='swki6qr256'; // заданный вами пароль
 
	$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
	mysql_select_db($database) or die("Не могу подключиться к базе.");
	$txtName = check_input($_POST["txtSurname"], "Enter your name!");	
	$txtName = check_input($_POST["txtName"], "Enter your name!");
	$txtPhone = check_input($_POST["txtPhone"], "Enter your phone!");
	$txtOrder = check_input($_POST["txtOrder"], "What order you want to send?");
	$txtFrom = check_input($_POST["locFrom"], "Where should we send from?");
	$txtTo = check_input($_POST["locTo"], "Where should we send to?");
	
	$query = "INSERT INTO `customer` (`surname`,
									  `name`, 
									  `phone`) 
					VALUES ('".$_POST['txtSurname']."',
							'".$_POST['txtName']."', 
							'".$_POST['txtPhone']."')";
	mysql_query($query) or die(mysql_error());
	$query = "INSERT INTO `order` ( `id_operator`,
									`id_customer`,
									`order_name`, 
									`delivery_type`, 
									`adress_From`, 
									`adress_To`) 
					VALUES ((SELECT `id_operator` 
								FROM `operator` 
								WHERE `id_operator` = (SELECT MAX(`id_operator`) 
														FROM `operator`)), 
							(SELECT `id_customer` 
								FROM `customer` 
								WHERE `id_customer` = (SELECT MAX(`id_customer`) 
														FROM `customer`)), 
							'".$_POST['txtOrder']."', 
							'".$_POST['slcType']."', 
							'".$_POST['locFrom']."', 
							'".$_POST['locTo']."' )";
	mysql_query($query) or die(mysql_error());
	/* Если при заполнении формы были допущены ошибки сработает следующий код: */
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
			<p>Пожалуйста исправьте следующую ошибку:</p>
			<?php echo $myError; ?>
		</body>
		</html>

		<?php
			exit();
	}
	header("location: ".$_SERVER['HTTP_REFERER']);
/*INSERT INTO `customer` (`surname`,`name`, `phone`) VALUES ('Brown','Samuel','9537845672');
INSERT INTO `order` (`id_operator`,`id_customer`,`order_name`, `delivery_type`, `adress_From`, `adress_To`) VALUES (SELECT MAX(`id_operator`) FROM `operator` , SELECT MAX(`id_customer`) FROM `customer`, 'eee pc','Fast','Revolutsii 20','Nikitina 11');*/
?>
