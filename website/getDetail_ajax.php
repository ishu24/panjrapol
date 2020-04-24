<style type="text/css">
	.bg{
	background:rgba(0,0,0,0.5);
	padding: 20px;
	color: #fff;
}
.bg1{
	color:#e1d41f;
}
</style>
<?php
include_once("../class/Panjrapol.php");
$obj=new Panjrapol();
include_once("../class/City.php");
$obj1=new City();
include_once("../class/State.php");
$obj2=new State();
include_once("../class/Animal.php");
$obj3=new Animal();
include_once("../class/Incomeexpense.php");
$obj4=new Incomeexpense();
$a=$_GET["q"];
$rec=$obj->select1($a);
$rec3=$obj3->select2($a);
$rec4=$obj4->select2($a);
	$data="";
		$t=mysqli_num_rows($rec);
		if($t>0){
			$data.="<marquee style='scrollamount='5' loop='infinite''>
*All the details are as per provided by managment of respective panjarapole we can not assume responsibility of correctness of data
</marquee>
<br><div style='overflow-x: auto;'><table class='table bg'>
			<th class='bg1'>Panjrapole Name</th>
			<th class='bg1'>City</th>
			<th class='bg1'>State</th>
			<th class='bg1'>Contact</th>
				";
$date_y = date("Y");
$year =intval($date_y);
$date_y1 = date("y");
$year1 =intval($date_y1-1);
 
    	$y1=$year-2;

        $data.="<th class='bg1'>Total Animals of ($y1-'$year1)</th>
        <th class='bg1'>Total Income of ($y1-'$year1)</th>
        <th class='bg1'>Total Expense of ($y1-'$year1)</th>";
    
 

			$data.="
			<th></th>
			<th></th>
		";
	while ($result=mysqli_fetch_array($rec))
	{
		$rec1=$obj1->select1($result[3]);
		while ($result1=mysqli_fetch_array($rec1))
		 {
				$rec2=$obj2->select1($result1[2]);
				while ($result2=mysqli_fetch_array($rec2)) 
				{
							$data.="<tr>
										<td>".$result[1]."</td>
										
										<td>".$result1[1]."</td>
										<td>".$result2[1]."</td>
										
										<td>".$result[16]."</td>";
				
									

$date_y = date("Y");
$year =intval($date_y)-1;
$y1=$year-1;
										
										while ($result3=mysqli_fetch_array($rec3))
										{
											if($result3[3]=="Closing Balance"){
											if($result3[2]=="$year-$y1"){
												
													$t=$result3[4]+$result3[5];
															$data.="<td>".$t." Animals</td>";
												}
												else{
													$data.="<td></td>";
												}	
											}
											
											
										}
										while ($result4=mysqli_fetch_array($rec4))
										{
											if($result4[2]=="$year-$y1"){
												$data.="<td>".$result4[9]." Rs/-</td>
												<td>".$result4[14]."  Rs/-</td>";
											}
											else{
													$data.="<td></td><td></td>";
												}
											
										}
										$data.="<td>
										<form action='summaryview.php?Id=".$result[0]."' method='post' enctype='multipart/form-data' id='MyUploadForm'>
												<input type='submit' value='Detailed view' style='background-color: darkgray; color: black;'>
											</form>
											</td>
											<td><a name='btnDon' href='donate.php'><button name='btnSub' style='background-color: darkgray; color: black;'>DONATE</button></a></td></tr>
									
									";
								}
								}
		}
	
								$data.="</table></div>";
							}
									echo $data;
?>
