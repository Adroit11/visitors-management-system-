<?php
class update {
    private $table;
    var $values;
    var $fields;
    var $condition;
    var $update;
    var $rat;

    public function update_query($values,$table,$fields,$condition,$rat) {
        $this->values=$values;
        $this->table=$table;
        $this->fields=$fields;
        $this->condition=$condition;
        $this->output=$rat;
        
        foreach ($values as $key => $new_values) {
            $values[$key] = "'".$new_values."'";
        }
        foreach ($fields as $key => $column) {
            $fields[$key] = $column."=".$values[$key];
        }
        $this->update= "UPDATE $this->table set $this->fields  Where $this->condition = '$this->rat'";
        die($this->update.mysql_error());
        $check=  mysql_query($this->update);
        if (mysql_num_rows($check)>0) {
            echo "yes".  mysql_error();
        }
        else{
            echo "No.".  mysql_error();
        }
        }
}

?>