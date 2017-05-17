<?php
class class_login{
    private $table;
    var $data_header;
    var $values;
    var $fields;
    var $result;
    var $true;
    var $false;
    var $collect;
    var $query;
    var $fetch;
    var $Bollyb;

    public function checklogin_details($table,$data_header,$values)
        {
        $this->table=$table;
        foreach ($values as $k => $value){
            $values[$k] = "'".$value."'";
        }
        $this->values=$values;
//        die(print_r($data_header,1));
        foreach ($data_header as $k => $data){
            $data_header[$k] = $data."=".$values[$k];
        }
        $this->data_header=  implode(' AND ',$data_header );
        $this->collect = "SELECT * FROM $this->table WHERE $this->data_header LIMIT 1";
//       die( $this->collect.mysql_error());
        $this->query = mysql_query($this->collect);
//        die("SUCESS".mysql_error());
        }

        public function fetch_my_data ()
        {
            $result=mysql_fetch_assoc($this->query);
            $_SESSION['collect']=$result;
        }
        public function check_row_affected ($true,$false)
        {
            $this->true=$true;
            $this->false=$false;
            $result= mysql_num_rows($this->query);
            if ($result > 0){
                header($true);
            }
            else {
                header($false);
            }
        }

        public function select_without_clause($table){
        {
        $this->table=$table;
        $this->collect = "SELECT * FROM $this->table";
        //die( $this->collect.mysql_error());
        }
        }
        
        public function select_tag($table,$condition,$value){
        {
        $this->table=$table;
        $this->data_header=$condition;
        $this->values=$value;
        $this->collect = "SELECT * FROM $this->table WHERE $this->data_header = $this->values";
    //    die( $this->collect.mysql_error());
        $result = mysql_query($this->collect);
        $display = mysql_fetch_assoc($result);
        $_SESSION['items'] = $display;
        }
        }
            
        }

        
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
