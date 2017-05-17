<?php
						$query = "select * from tbl_staffs order by fname";
						$result = mysql_query($query);
						if (mysql_num_rows($result) == 0) {
							echo "Not In The Database, Pls Try Inserting Data.";
						}
						else{
							echo "<table class='new'>
								<tr class='na'>
									<th class='le'>#</th>
									<th class='le'>USERNAME</th>
									<th class='le'>EDIT</th>
									<th class='le'>DELETE</th>
								</tr>";

							$count = 0;
							while ($exam= mysql_fetch_assoc($result)) {
								$count++;
								if ($count % 2 == 0) {
									echo "<tr class=\"na\">";
								}
								else{
									echo "<tr class='ne'>";
								}
								echo "<td class='ga'>".$count."</td>"."<td class='ga'>".$exam['uname']."</td>"."<td class='ga'><a href='#?action=2&&linking_id=".$exam['staffs_id']."'><span class=\"fa fa-edit\"></a></span></td>"."<td class='ga'><a href='panel.php?linking_id=".$exam['staffs_id']."'><span class=\"fa fa-eraser\"></a></span></td>"."</tr>";
							}
							echo "</table";
						}
				
					?>