<?php
	$host='sql-4.radyx.ru:3306'; // имя хоста (уточняется у провайдера)
	$database='courier614'; // имя базы данных, которую вы должны создать
	$user='courier614'; // заданное вами имя пользователя, либо определенное провайдером
	$pswd='swki6qr256'; // заданный вами пароль
	//$link = mysql_connect('sql-4.radyx.ru:3306', 'courier614', 'swki6qr256');
	//mysql_select_db('courier614', $link);
	$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
	mysql_select_db($database) or die("Не могу подключиться к базе.");
	

	if (empty($_POST['txtLogin']))
	{
		echo 'Please, enter your login!';
	} 
	elseif (empty($_POST['txtPass']))
	{
		echo 'Please, enter your password!';
	} 
	else
	{ 
		$login = mysql_real_escape_string($_POST['txtLogin']);
		$pass = md5($_POST['txtPass']);
		$sql = "SELECT `id_operator`
            FROM `operator`
            WHERE `operator_login`='{$login}' AND `operator_password`='{$pass}'
            LIMIT 1";
		$query = mysql_query ($sql) or die(mysql_error());
		if (mysql_num_rows($query) == 1) 
		{
			$row = mysql_fetch_assoc($query);
			$_SESSION['id_operator'] = $row['id_operator'];
			session_start();
			$list = '';
			$sql = mysql_query("SELECT `order`.`id_order`,
									   `order`.`order_name`,
									   `order`.`adress_from`,
									   `order`.`adress_to`,
									   `order`.`delivery_type`,
									   `courier`.`id_courier`,
									   `courier`.`surname`,
									   `courier`.`name`,
									   `courier`.`place`
								FROM `order`, `courier`
								WHERE `order`.`id_courier` IS NOT NULL
								AND `courier`.`id_courier` = `order`.`id_courier`" ) or die(mysql_error());
			$table = "<table>\n";
			while($row = mysql_fetch_assoc($sql))
			{
				$table .= "<tr>\n";
				$table .= "<td>".$row['id_order']."</td>\n";
				$table .= "<td>".$row['order_name']."</td>\n";
				$table .= "<td>".$row['surname']."</td>\n";
				$table .= "<td>".$row['name']."</td>\n";
				$table .= "<td>".$row['id_courier']."</td>\n";
				$table .= "<td>".$row['adress_from']."</td>\n";
				$table .= "<td>".$row['adress_to']."</td>\n";
				$table .= "<td>".$row['delivery_type']."</td>\n";
				$table .= "<td>".$row['place']."</td>\n";
				$table .= "</tr>\n";
			}
			$table .= "</table>\n";
			echo $table;
		}
		else 
		{
			die('Access denided.');
		}
	}
?>