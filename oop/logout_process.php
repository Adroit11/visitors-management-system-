<?php
    $matricnumber = $_GET['ident'];
    require_once '../connections/db_con.php';
    $query=mysql_query("SELECT * from tbl_visitors WHERE visitors_id ='$matricnumber'") or die(mysql_error());
    $student=mysql_fetch_array($query);
if ($student) {
    $match=true;
     $dev = date("h:i:sa");
    $r = "SELECT status_id,visitors_timeout FROM class_attendance";
    $run = mysql_query($r);
    $query = "UPDATE class_attendance set status_id= 1,visitors_timeout='$dev' where status_id = 0";
    $q = mysql_query($query);
}
else{
    $match=false;
}
  if ($q==false OR $match==false) {header("Location: ../partials/display.php?success=false"); exit;}
else {header("Location: ../partials/display.php?success=true"); exit;} 
?>


 