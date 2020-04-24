<?php
include_once("header.php");
?>

<style type="text/css">
    .bg{
    background:rgba(0,0,0,0.3);
    padding: 20px;
    color: #fff;
}
.bg1{
    color:#e1d41f;
}
.bg3{
        padding: 100px;
        font-size: 23px;
    }
    .bg4{
         color:#e1d41f;
       background-color: #000;
        font-size: 23px;
    }

</style>


<?php

if(isset($_POST["btnsub"]))
{
    if(isset($_GET["Ch"]))
    {
         $alpha=$_GET["Ch"];
         echo "<script>document.location='pdf1.php?Ch=".$alpha."';</script>";
    }
   else{
    echo "<script>document.location='pdf1.php';</script>";
   }
}
 ?>
<div class="banner">
        <div class="container">
            
    
             <a href='index.php' style='float:left; margin-top: 50px; font-size:30px;'><u>BACK</u></a>
             <br><br>
             <form method="post">
         <input type="submit" name="btnsub" class="bg4" value="Download" style='float:right; margin-top: 15px;'>
    </form>
    <br>
            <div id="page-wrapper" >
                <div class="graphs">
                    <br><br>
                        <div class="tab-content">

                        <div class="tab-pane active" id="horizontal-form">

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

if(isset($_GET["Ch"]))
{
        $alpha=$_GET["Ch"];
        $rec=$obj->select4($alpha);
 $data="";
        $t=mysqli_num_rows($rec);
        if($t>0){
            $data.="<marquee style='scrollamount='5' loop='infinite''>
*All the details are as per provided by managment of respective panjarapole we can not assume responsibility of correctness of data
</marquee><div style='overflow-x: auto;'><table class='table bg'>
            <th class='bg1'>Panjarapole Name</th>
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
                                        $rec3=$obj3->select2($result[0]);
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
                                        $rec4=$obj4->select2($result[0]);
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
                                        $data.="
                                            <td><a name='btnDon' href='donate.php'><button name='btnSub' style='background-color: darkgray; color: black;'>DONATE</button></a></td></tr>
                                    
                                    ";
                                }
                                }
        }
    
                                $data.="</table></div>";
                                $data.="<div class='bg3' >";
        foreach (range('A', 'Z') as $char) {

                $data.="<a href='detailedview.php?Ch=".$char."' >$char </a>";
                $data.="|";
        }
            $data.="<a href='detailedview.php'> ALL</a></div>";
                            }
                            else{
                                echo "<script type='text/javascript'>alert('No Data found')</script>";
                                echo "<script type='text/javascript'>location.href = 'panjrapole.php'</script>";
                            }
}
else{
     $rec=$obj->select();
 $data="";
        $t=mysqli_num_rows($rec);
        if($t>0){
            $data.="<marquee style='scrollamount='5' loop='infinite''>
*All the details are as per provided by managment of respective panjarapole we can not assume responsibility of correctness of data
</marquee><div style='overflow-x: auto;'><table class='table bg'>
            <th class='bg1'>Panjarapole Name</th>
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
                                        $rec3=$obj3->select2($result[0]);
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
                                        $rec4=$obj4->select2($result[0]);
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
                                        $data.="
                                            <td><a name='btnDon' href='donate.php'><button name='btnSub' style='background-color: darkgray; color: black;'>DONATE</button></a></td></tr>
                                    
                                    ";
                                }
                                }
        }
    
                                $data.="</table></div>";
                                $data.="<div class='bg3' >";
        foreach (range('A', 'Z') as $char) {

                $data.="<a href='detailedview.php?Ch=".$char."' >$char </a>";
                $data.="|";
        }
            $data.="<a href='detailedview.php'> ALL</a></div>";
                            }
                            else{
                                echo "<script type='text/javascript'>alert('No Data found')</script>";
                                echo "<script type='text/javascript'>location.href = 'panjrapole.php'</script>";
                            }
}
                           
                                    echo $data;
?>
    
                            </div>
                            

                        </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once("footer.php");
?>