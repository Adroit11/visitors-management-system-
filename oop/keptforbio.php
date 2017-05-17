$query=mysql_query("SELECT * from tbl_rg WHERE visitors_fname='$id' AND status = 0 limit 1") or die(mysql_error());
	if ($query > 0) {
		$run = "UPDATE tbl_rg set status= 1 where status = 0";
		$q = mysql_query($run);
	}
	else{
		//register student for the ongoing current class
    $a=$student['visitors_id'];
    $query = "insert into tbl_rg (visitors_id,visitors_fname,visitors_timein) VALUES ('$a',$id', date('y/m/d/h:i:sa')) ";
    $q = mysql_query($query);	
	}