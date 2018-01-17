<?php
	$DB_NAME = 'tutorial';
	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = '';
	
	global $mysqli;
	$mysqli= mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
    function select($sql) {
        global $mysqli;
        $data = array();
        $result=$mysqli->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return json_decode(json_encode($data));
    }

    function insert($sql) {
        global $mysqli;
        return $mysqli->query($sql);
    }
    function update($sql) {
        global $mysqli;
        return $mysqli->query($sql);
    }
    function delete($sql) {
        global $mysqli;
        return $mysqli->query($sql);
    }
?>