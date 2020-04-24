
<?php
include_once("../class/Panjrapol.php");
$obj=new Panjrapol();
$a=$_GET["q"];
$obj->set_Is_allow($a);
$rec=$obj->update1($obj);
?>
