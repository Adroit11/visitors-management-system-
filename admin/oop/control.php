<?php
require '../connections/db_con.php';
session_start();
    if (isset($_POST['userAuth'])){
        $user = $_POST['username'];
        $pass = $_POST['passwrd'];
        $table = 'tbl_Staffs';
        $data_header=array('email','password');
        $values=array($user,$pass);
        
        include 'classes/class_login.php';
        $login=new class_login();
        $login->checklogin_details($table,$data_header,$values);
        $login->fetch_my_data();
        if ($_SESSION['collect']['job_id']==9) {
            $true = "location:../partials/adpanel.php";
            $false = "location:../index.php?msg=Incorrect Password or Email!";
        }
        else{
            $true = "location:../../loginpg.php?msg=Enter Your Login Details Here";
            $false = "location:../index.php?msg=Incorrect Password or Email!";
        }
        $login->check_row_affected($true,$false);
        }
        elseif (isset($_POST['reg'])) {
            $a = $_POST['fname'];
            $b = $_POST['midname'];
            $c = $_POST['lname'];
            $d = $_POST['email'];
            $e = $_POST['pwd'];
            $f = $_POST['user'];
            $g = $_POST['phn'];
            $h = $_POST['addr'];
            $i = $_POST['state'];
            $j = $_POST['lga'];
            //$k = $_POST['post'];
            $l = $_POST['status'];
            $tables = 'tbl_Staffs';
            $column = array('fname','mname','lname','email','password','uname','phone','address','state_origin','lga','admin_stat');
            $values = array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$l);

            include 'classes/class_insert.php';
            $insert = new insert(); 
            $insert->insertn($tables, $column, $values);
            $true = "location:../partials/adpanel.php";
            $false = "location:../partials/adpanel.php";
            $insert->check_row_affected($true,$false);
        }
        
        elseif (isset($_POST['dev'])) {
            echo "Good";
        }
        else{
            echo mysql_error();
        }

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
