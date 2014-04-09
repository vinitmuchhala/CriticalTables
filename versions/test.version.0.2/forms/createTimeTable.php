<?php
$path = $_SERVER['DOCUMENT_ROOT']."/critical_final";
   $path .= "/includes/includes.php";
   include_once($path);
$no=$_GET['breakNo'];
$i=1;
	$durLec=$_GET['durLec'];
	$eTime=$_GET['eTime'];
	$sTime=$_GET['sTime'];
	$durBreak=array();
	$breakTime=array();
	$sum=($eTime-$sTime)/(100)*60;
	//echo $sum;
	while($i<=$no)
	{
	
		$durBreak[$i]=$_GET['durBreak'.$i];
		$breakTime[$i]=$_GET['breakTime'.$i];
		$sum-=$durBreak[$i];
		//echo $durBreak[$i]." ".$breakTime[$i];
		$i++;
	}
	//echo $sum;
	$noLec=$sum/$durLec;
	//echo $noLec;
	$i=1;
	$sTimeH=floor($sTime/100);
	//echo $sTimeH." ";
	$sTimeH*=60;
	//echo $sTimeH." ";
	$sTimeH+=$sTime%100;
	$k=0;
	//echo $sTimeH." ";
	//echo $sTime." ";
	//$sTimeH+=$durLec;
	//$sTime1=floor($sTimeH/60);
	//$sTime2=$sTimeH%60;
	//echo $sTimeH." ".$sTime1.":".$sTime2;							
?>

	
	<div class="timeTableLeft">
		<table>
		<?php
		$sem=$_GET['semester'];
		$dprt=$_GET['department'];
		$days=$_GET['days'];
		$noOfSubjects="Select count(*) from subjects where sem='$sem' and department='$dprt';";
		$noOfSubjects=mysql_query($noOfSubjects);
		$forListOfSubjects=0;
		//$result="select name from subjects where sem='$sem' and department='$dprt';";
		$result="SELECT sub.id,name,tutorial,practical
				FROM subjects sub, subjectsconfig config
				WHERE sub.id = config.id and sem='$sem' and department='$dprt'";		
		
		$result=mysql_query($result);
		if (!$result) {
			die('Query failed: ' . mysql_error());
		}
		
		while($forListOfSubjects<$noOfSubjects)
		{
			while($subjectName=mysql_fetch_array($result))
			{
		?>
			<tr>
				<td><div class="item"><?php 
						echo $subjectName['name'];
				?></div></td>
		<?php
			if($subjectName['tutorial']==1)
			{
				echo "<td><div class='item'>".$subjectName['name']." Tutorial</div></td>";
			}
			if($subjectName['practical']==1)
			{
				echo "<td><div class='item'>".$subjectName['name']." Practical</div></td>";
			}
			
			echo "</tr>";
			
			}
			$forListOfSubjects++;
		}
		?>
		</table>

	</div>
	<div class="timeTableRight">
		<table>
			<tr>
				<td class="blank"></td>
				<td class="title">Monday</td>
				<td class="title">Tuesday</td>
				<td class="title">Wednesday</td>
				<td class="title">Thursday</td>
				<td class="title">Friday</td>
				<?php
				if($days==6)
				{
				?><td class="title">Saturday</td>
				<?php
				}
				?>
			</tr>
			<tr>
				<td class="time"><?php 
				$sTime1=floor($sTimeH/60);
				$sTime2=$sTimeH%60; 
				echo $sTime1.":".$sTime2; ?></td>
				<td class="drop"></td>
				<td class="drop"></td>
				<td class="drop"></td>
				<td class="drop"></td>
				<td class="drop"></td>
				<?php
				if($days==6)
				{
				?><td class="drop"></td>
				<?php
				}
				?>
			</tr>
			<?php
			while($i<$noLec)
			{
				if($k!=1)
				$sTimeH+=$durLec;
				$k=0;
				$sTime1=floor($sTimeH/60);
				$sTime2=$sTimeH%60; 
				$lTime=$sTime1."".$sTime2;
				for($j=1;$j<=$no;$j++)
				if($lTime==$breakTime[$j])
				{
					?><tr class="lunchRow">
						<td class="time"><?php echo $sTime1.":".$sTime2; ?></td>
						<td class="lunch" colspan="5">Lunch</td>
					</tr><?php
					$sTimeH+=$durBreak[$j];
					$k=1;
					//continue;
				}
				?>
				
				<!--Condition should wrap around the tr-->
				<?php if($k!=1){?>
			<tr>
				<td class="time"><?php echo $sTime1.":".$sTime2; ?></td>
				<td class="drop"></td>
				<td class="drop"></td>
				<td class="drop"></td>
				<td class="drop"></td>
				<td class="drop"></td>
				<?php
				if($days==6)
				{
				?><td class="drop"></td>
				<?php
				}
				?>
			</tr>
			<?php 
			}
			if($k!=1)
			$i++;
		} ?>

			
		</table>
        
        

			<input type="submit" id="submitTimeTable" value="Submit Time Table" class="green">
	</div>
