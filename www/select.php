<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
	<title>Courier service</title>
	<script type="text/javascript" src="jquery-1.1.3.1.min.js"></script>	<!-- jquery-->
	<script type="text/javascript" src="index_actions.js"></script> 
	<link rel="stylesheet"  type="text/css" href="form.css" /> 
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"> 
	    
    </head>
    <body>
<?php
	$host='sql-4.radyx.ru:3306'; // имя хоста (уточняется у провайдера)
	$database='courier614'; // имя базы данных, которую вы должны создать
	$user='courier614'; // заданное вами имя пользователя, либо определенное провайдером
	$pswd='swki6qr256'; // заданный вами пароль
	//$link = mysql_connect('sql-4.radyx.ru:3306', 'courier614', 'swki6qr256');
	//mysql_select_db('courier614', $link);
	$dbh = mysql_connect($host, $user, $pswd) or die("Can't connect to  MySQL.");
	mysql_select_db($database) or die("Can't connect to data base.");
	

	if  (!isset($_POST['selector'])){
						die("You did not select element!");
			  }
	$selector  = $_POST['selector'];
	$select = $_POST['select'];
	$selectorcount = 0;
	$count = 0;
	foreach  ($selector as $check){
						$selectorcount++;
	}
	foreach  ($select as $check){
						$count++;
	}
	if ($selectorcount and $count > 0){
		$j = 0;
		$tablecount = 0;
		for ($y = 0; $y < $count; $y++){
			$sql = "SELECT ";
			$table = "<table rules=all>\n 
				<tr> 
					<td>N</td>";
			$subtable = strtok($selector[$j].$value,"`." );
			$sub = $subtable;
			while ($subtable == $sub and $j != $selectorcount){
				$sql .= $selector[$j].$value.", ";
				$table .= "<td>"."$selector[$j]"."</td>";
				$j++;
				$sub = strtok($selector[$j].$value,"`." );
			}
			$sql=substr_replace($sql ,"",-2);
			$sql .= " FROM ".$select[$y];
			echo $sql;
			$query = mysql_query($sql) or die(mysql_error());
			$n = 1;
			$table .= "</tr>";
			while($row = mysql_fetch_row($query))
			{	
				$table .= "<tr>\n";
				$table .= "<td>".$n++."</td>\n";
				for($i = $tablecount; $i < $j; $i++){
					if ($row[$i] != "" and $row[$i] != null){
						$table .= "<td>".$row[$i]."</td>\n";
					}
					else{
						$table .= "<td> <a href=\"#\" id=\"click-sign\">null</a>/> </td>\n";
					}
					$table .= "</tr>\n";
				}
			}
			$tablecount = $j;
			$table .= "</table>\n <br>";
			echo $table;
		}
	}
	?>
	<div class="overlay" id="overlay" style="display:none;"></div> 
        <div class="signbox" id="signbox">
            <a class="sign-close" id="sign-close" href="#"></a> 
            <h1>Sign in</h1>
			<?php $couriers = "SELECT `id_courier`, `name`, `surname`
						 FROM `courier`
						 WHERE `place` = null";
			$query = mysql_query ($sql) or die(mysql_error()); 
			$n = 1;
			$table = "<table rules=all>\n 
				<tr> 
					<td>N</td>
				<tr>";
			while($row = mysql_fetch_row($query))
			{	
				$table .= "<tr>\n";
				$table .= "<td>".$n++."</td>\n";
				for ($i = 0; $i < 3; i++){
					$table .= "<td><a href = \"#\" id=\"select-courier\"".$row[$i]."</a></td>\n";
					//id=select-courier засунуть куда-то, что юбы по нажатию на ссылку, можно было присвоить 
					//свободному курьеру заказ. и назначить ему место? можно назначить место как место откуда,
					//а можно добавить курьеру поле destination - точка его назначения, хотя нахуй? думать.
				}
			}
			mysql_close();
			?>
        </div>
    </body>
 </html>
