<?php

$month=date("n");
$year=date("Y");
$today=date("j");
$dayWeek=date("w",mktime(0,0,0,$month,1,$year)) ;
$lastDayMonth=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
$months=array(1=>"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$dayWeek2=date("w",mktime(0,0,0,$month,1,$year));
$lastDayLMonth=date("d",(mktime(0,0,0,$month,1,$year)-1))-($dayWeek-2);
$fDayNextMonth=date("j",(mktime(0,0,0,$month+1,1,$year)));
?>



<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Calendari PHP</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Calendar by Jordi Jacas	 </h1>
		<table id="calendar">

			<caption><?php echo $months[$month]." ".$year?></caption>

			<tr>
				<th>Mon</th>
				<th>Tue</th>
				<th>Wen</th>
				<th>Thu</th>
				<th>Fri</th>
				<th>Sat</th>
				<th>Sun</th>
			</tr>
				<?php
					$last_cell=$dayWeek+$lastDayMonth;
					for($i=1;$i<=42;$i++){
						if($i==$dayWeek){
							$day=1;
						}

						if($i<$dayWeek || $i>=$last_cell || $day>$lastDayMonth){
							if($day<1){
								echo "<td class='others'>$lastDayLMonth</td>";
								$lastDayLMonth	 = $lastDayLMonth + 1;
							}else if($day>=$lastDayMonth){
								echo "<td class='others'>$fDayNextMonth</td>";
								$fDayNextMonth = $fDayNextMonth + 1;
							}
						}else{
							if($day==$today)
								echo "<td class='hoy'>$day</td>";
							else
								echo "<td>$day</td>";
							$day++;
						}
						if($i%7==0){
							echo "</tr><tr>\n";
						}
					}
				?>
			<tr>
			</tr>
		</table>
	</body>
</html>