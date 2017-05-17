<?php
$matricnumber = $_POST['idnumb'];
$firtext = $_POST['firtext'];
require_once '../connections/db_con.php';

//instantiate object of fingerprint biometrics module
$objSecuBSP = new COM("SecuBSPMxCOM.APIInterface") or die("Unable to instantiate Biometrics software module");

//get student's enrolled fingerprint from db
$query=mysql_query("SELECT * from tbl_visitors WHERE verification_no ='$matricnumber' or visitors_fname='$matricnumber'") or die(mysql_error());
$student=mysql_fetch_array($query);

//check fingerprint match
$objSecuBSP->VerifyMatch($firtext, $student['firtext']);
//die($firtext . "<br />" . $student['firtext']);
if ($objSecuBSP->IsMatched != 0){//fingerprint matched
    $match=true;
    //register student for the ongoing current class
    //$currentclass=0;
    $dev = date("y/m/d/h:i:sa");
    $query = "insert into class_attendance (idnumb,visitors_timein) VALUES ('$matricnumber','$dev') ";
    $q = mysql_query($query);
    echo mysql_error();
    //Release SecuBSP object
    $objSecuBSP = null;
}

else {//Matching failed
    $match=false;
}

//redirect
if ($q==false OR $match==false) {header("Location: ../partials/validate.php?success=false"); exit;}
else {header("Location: ../partials/display.php?success=true"); exit;} 

?>


 