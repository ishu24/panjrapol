
<?php
function fetch_data()  
 {  
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
        $data ="";
$i=1;
     while ($result=mysqli_fetch_array($rec))
    {
        $rec1=$obj1->select1($result[3]);
        while ($result1=mysqli_fetch_array($rec1))
         {
                $rec2=$obj2->select1($result1[2]);
                while ($result2=mysqli_fetch_array($rec2)) 
                {
                            $data.="<tr>
                            <td>".$i++."</td>
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
                                                <td>".$result4[14]." Rs/-</td>";
                                            }
                                            else{
                                                $data.="<td></td><td></td>";
                                            }
                                            
                                        }
                                        $data.="</tr>";
                                    }
                                }
                            }
}
else{

 $rec=$obj->select();

$data ="";
$i=1;
     while ($result=mysqli_fetch_array($rec))
    {
        $rec1=$obj1->select1($result[3]);
        while ($result1=mysqli_fetch_array($rec1))
         {
                $rec2=$obj2->select1($result1[2]);
                while ($result2=mysqli_fetch_array($rec2)) 
                {
                            $data.="<tr>
                            <td>".$i++."</td>
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
                                                <td>".$result4[14]." Rs/-</td>";
                                            }
                                            else{
                                                $data.="<td></td><td></td>";
                                            }
                                            
                                        }
                                        $data.="</tr>";
                                    }}}
        }
      return $data;  
 }

require_once('tcpdf/tcpdf.php');
ob_start();
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetFont('helvetica', '', 9);
$pdf->AddPage();
 $content = '';  
      $content .= ' <br> 
      <h3 align="center">Panjrapole List</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
           <th width="4%">No</th>
                <th width="12%">Panjrapole</th>
            <th width="15%">City</th>
            <th width="12%">State</th>
            <th width="15%">Contact</th>';
            $date_y = date("Y");
$year =intval($date_y);
$date_y1 = date("y");
$year1 =intval($date_y1-1);
 
        $y1=$year-2;

        $content.='<th width="15%">Total Animals of ';
        $content.="($y1-'$year1)";
        $content.='</th><th width="15%">Total Income of ';

         $content.="($y1-'$year1)";
         $content.='</th>
        <th width="15%">Total Expense of ';
        $content.="($y1-'$year1)";
       $content.=' </th>
    
                
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('htmlout.pdf', 'I');
?>
