<?PHP
	//here I define the names of the fields I am selecting (in the query)
	$field_array = array( 'UFName','ULName','UStreet1','UCity');
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
		echo "<table class='table'>
        <thead>
        <tr>
        <th>FNAME</th>
        <th>LNAME</th>
        <th>STREET</th>
        <th>CITY</th>
        </tr>
        </thead>	
        <tbody>";
		//makes the remaining table body from the query results and categorizes by the field names
		getTable($result, $field_array);
		mysql_close($db_handle);//closes connection to database
	}
	else {
		print "ERROR: Database NOT Found ";
	}
	//Lynn playing with variables in URL
	
	function getTable($dbResults,$fields){
		
		//html for generating table header the way we want
		//html for generating table body
		while ( $dbField = mysql_fetch_assoc($dbResults) ) {
				echo "<tr>";
				for ($i = 0; $i < count($fields); $i++) {
					echo '<td>'.$dbField[$fields[$i]].'</td>';
    			}
				echo "</tr>";
			}		

		echo "</tbody>
        </table>";
	}

		//Lynn playing with DB inserts
		//$SQL = "INSERT INTO tb_address_book (First_Name, Surname, Address) VALUES ('bill', 'gates', 'Microsoft')";
		//IN SQL IT'S: INSERT INTO table_name ( Columns ) VALUES ( values for columns)
?>
