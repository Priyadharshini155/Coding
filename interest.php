<?php

$principle = $_POST['principle'];
$rate = $_POST['rate'];
$time = $_POST['time'];
 
 if ($_POST['clear'])
{
$principle = "";
$rate = "";
$time = "";
$display_results = "";
}


 if ($_POST['compute']) 
 {
$now=time();
$dateTo=strtotime($_POST['dateTo']);
$datediff= $now - $dateTo;

$time=round($datediff / (365 * 60 * 60 * 24),2);

$interest =($principle*$rate*$time)/100;
$display_results = round($interest);

 }
 
  
 //echo $now;
 //echo $dateTo;
//  echo $datediff;
//  echo "<br>";
// echo $time;
?>
<html>
	<body>
		<form method="POST" action="interest.php">
			Category:<select name="rate">
				<?php
					$option = array ('agri' => 5, 'personal' => 12, 'business' => 8);
					foreach($option as $key => $value)
   						echo '<option value="'.$value.'" '.($rate==$value?'selected':'').'>'.$key.'</option>';
				?>
				<!--<option value=5 <?=$row['rate'] == 5 ? ' selected="selected"' : '';?>>Agri</option>-->
				<!--<option value=8 <?=$row['rate'] == 8 ? ' selected="selected"' : '';?>>business</option>-->
				<!--<option value=12 <?=$row['rate'] == 5 ? ' selected="selected"' : '';?>>Personal</option>-->
				</select><br><br>
			Amount:<input type="text" name="principle" value="<?php echo $principle; ?>"><br><br>
			<!--Rate:<input type="text" name="rate" value="<?php echo $rate; ?>"><br><br>-->
		<!--From Date:<input type="date" name="dateFrom" value="<?php echo $dateFrom; ?>"><br><br>-->
			Date:<input type="date" name="dateTo" value="<?php echo $dateTo; ?>"><br><br>
			<!--Time:<input type="date" name="today" value="<?php echo date('Y-m-d'); ?>"><br><br>-->
			Answer:<input type="text" name="answer" value="<?php echo $display_results; ?>"><br><br>
			<input type="submit" name="compute" value="compute">
			<input type="submit" name="clear" value="clear">
		</form>
		</body>
	</html>
