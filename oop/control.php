<?php
require '../connections/db_con.php';
session_start();
    if (isset($_POST['userAuth'])){
        $user = $_POST['Email'];
        $pass = $_POST['passwrd'];
        $table = 'tbl_Staffs';
        $data_header=array('email','password');
        $values=array($user,$pass);
        
        include 'classes/class_login.php';
        $login=new class_login();
        $login->checklogin_details($table,$data_header,$values);
        $login->fetch_my_data();
        if ($_SESSION['collect']['admin_stat']==1) {
            $true = "location:../partials/?msg=Welcome Receptionist, You have Logged in Succefully";
            $false = "location:../loginpg.php?msg=Incorrect Password or Email!";
        }
        else{
            $true = "location:../partials/staffs.php?msg=Welcome Staff, You have Logged in Succefully";
            $false = "location:../loginpg.php?msg=Incorrect Password or Email!";
        }
        $login->check_row_affected($true,$false);
        }
elseif (isset($_POST['adminAuth'])){
    $a = $_POST['fname'];
    $b = $_POST['oname'];
    $c = $_POST['email'];
    $d = $_POST['address'];
    $e = $_POST['contact'];
    $f = $_POST['state'];
    $g = $_POST['idnumb'];
    $h = $_POST['purpose'];
    $i = $_POST['positions'];
    $j = $_POST['pics'];
    $firtext=$_POST['firtext'];

    $k = $_SESSION['collect']['staffs_id'];
    
    $tables = 'tbl_visitors';
    $column = array('visitors_fname','visitors_oname','visitors_email','visitors_address','visitors_contact','visitors_state','visitors_identity','visit_purpose','staffs_id','visitors_pic','visitors_timein','reg_by','firtext');
    $values = array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,date("y/m/d/h:i:sa"),$k,$firtext);
    include 'classes/class_insert.php';
    $create =new insert();
    $create -> insertn($tables,$column,$values);
        $true = "location:../partials/?msg=Visitor Successfully Added.";
        $false = "location:../partials/?msg=Visitor Added.";
        $create->check_row_affected($true,$false);
}

elseif (isset($_POST['resptauthen'])) {
    $user = $_POST['Email'];
        $pass = $_POST['passwrd'];
        $table = 'tbl_Staffs';
        $cond = 1;
        $data_header=array('email','password','admin_stat');
        $values=array($user,$pass,$cond);
        
        include 'classes/class_login.php';
        $login=new class_login();
        $login->checklogin_details($table,$data_header,$values);
        $login->fetch_my_data();
        $true = "location:../partials/val.php?msg=Welcome Receptionist, You have Logged in Succefully";
        $false = "location:../index.php?msg=Incorrect Password or Email!";
        $login->check_row_affected($true,$false);
}
elseif (isset($_POST['booking'])) {
    $a = $_POST['fname'];
    $b = $_POST['oname'];
    $c = $_POST['email'];
    $d = $_POST['address'];
    $e = $_POST['contact'];
    $f = $_POST['state'];
    $g = $_POST['idnumb'];
    $h = $_POST['purpose'];
    $i = $_POST['positions'];
    if (isset($_FILES['pics'])) {
        $j = addslashes(file_get_contents($_FILES['pics']['tmp_name']));
    }
    else{
        echo "error".mysql_error();
    }
    
    $k = rand(2103,99900);
    $_SESSION['verify'] = array($a,$b,$k);

    $tables = 'tbl_visitors';
    $column = array('visitors_fname','visitors_oname','visitors_email','visitors_address','visitors_contact','visitors_state','visitors_identity','visit_purpose','staffs_id','visitors_pic','verification_no');
    $values = array($a,$b,$c,$d,$e,$f,$g,$h,$i,'{$j}',$k);
    include 'classes/class_insert.php';
    $create =new insert();
    $create -> insertn($tables,$column,$values);
        $true = "location:visitcon.php";
        $false = "location:../visitconfirm.php";
        $create->check_row_affected($true,$false);
    }

    /*storind the data in your database
    $query= "INSERT INTO items VALUES ('$id','$title','$description','$price','$value','$contact','$image')";
    mysql_query($query);
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
