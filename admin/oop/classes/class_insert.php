<?php
    class insert {
        private $tables;
        var $column;
        var $values;
        var $query;
        var $run;
    function insertn($tables,$column,$values){
        //die('jh');
        $this->tables=$tables;
        foreach ($column as $key => $new) {
            $column[$key] = $new;
        }
        $this->column=implode(',',$column);
        foreach ($values as $k => $value){
            $values[$k] = "'".$value."'";
        }
        $this->values=implode(',',$values);
        $this->query="INSERT INTO ". "$this->tables" ."(".$this->column .")values ( " . $this->values . ");";
//        die($this->query.  mysql_error());
        $this->run=  mysql_query($this->query);
//       die($this->run. mysql_error());
        
    }
     public function check_row_affected ($true,$false)
        {
            $this->true=$true;
            $this->false=$false;
            $result= mysql_num_rows($this->query);
            if ($result == 1){
                header($true);
            }
            elseif($result == 0) {
                header($false);
            }
        }
    
    }

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
