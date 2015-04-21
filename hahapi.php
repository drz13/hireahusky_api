<?PHP
	//here I define the names of the fields I am selecting (in the query)
	$field_array = array( 'UFName','ULName','UStreet1','UCity','Zipcode','UEmail');
	//standard DB connection
	$user_name = "root";
	$password = "";
	$database = "team3";
	$server = "127.0.0.1";

	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);

	if ($db_found) {
		//print "Database Found!". "<BR>";
		$query = "SELECT * FROM user";
		$result = mysql_query($query);
		//we define the table header
		echo "<table class='table' cellpadding='7' style='border: 1px solid black; border-collapse:collapse;'>
        <thead style='background-color:black; color: white; font-weight:bold; text-align:left;'>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Zip</th>
        <th>EMail</th>
        </tr>
        </thead>	
        <tbody>";
		//makes the remaining table body from the query results and categorizes by the field names
		getTable($result, $field_array);
		echo "</tbody>
        </table>";
	
		mysql_close($db_handle);//closes connection to database
	}
	else {
		print "ERROR: Database NOT Found ";
	}
	//Lynn playing with variables in URL
	//print $_GET['funtime'];
	//echo $_GET["funtime"];
	
	function getTable($dbResults,$fields){
		
		//html for generating table header the way we want
		//html for generating table body
		$j = 0;
		while ( $dbField = mysql_fetch_assoc($dbResults) ) {
			if($j%2 == 0){
				echo "<tr>";
				for ($i = 0; $i < count($fields); $i++) {
					echo '<td>'.$dbField[$fields[$i]].'</td>';
    			}
				echo "</tr>";
				$j++;
			}
			else{
			echo "<tr style='background-color:#ccc;'>";
				for ($i = 0; $i < count($fields); $i++) {
					echo '<td>'.$dbField[$fields[$i]].'</td>';
    			}
				echo "</tr>";
				$j++;
			}
		}
	}			
		//Lynn playing with DB inserts
		//$SQL = "INSERT INTO tb_address_book (First_Name, Surname, Address) VALUES ('bill', 'gates', 'Microsoft')";
		//IN SQL IT'S: INSERT INTO table_name ( Columns ) VALUES ( values for columns)
?>