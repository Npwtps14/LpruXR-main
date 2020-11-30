<?php
class clear_db{

    var $host = 'localhost';
    var $user = 'root';
    var $pass = '';
    var $db = 'lprux';
    var $conn;

    function connect() {
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$conn) {
            die('Could not connect to database!');
        } else {
            $this->conn = $conn;
            //echo 'Connection established!';
        }
        return $this->conn;
    }

    function my_sql_query($conn,$field,$table,$event){
		if($field == NULL && $event == NULL){
            $objQuery = mysqli_query($conn, "SELECT * FROM ".$table);
		}else if($field == NULL){
			$objQuery = mysqli_query($conn,"SELECT * FROM ".$table." WHERE ".$event);
		}else if($event == NULL){
			$objQuery = mysqli_query($conn,"SELECT ".$field." FROM ".$table);
		}else {
			$objQuery = mysqli_query($conn,"SELECT ".$field." FROM ".$table." WHERE ".$event);
        }

		$objShow = mysqli_fetch_object($objQuery);
		return $objShow;
    }

    function my_sql_select($conn,$field,$table,$event){
        if($field == NULL && $event == NULL){
            $objQuery = mysqli_query($conn, "SELECT * FROM ".$table);
		}else if($field == NULL){
			$objQuery = mysqli_query($conn,"SELECT * FROM ".$table." WHERE ".$event);
		}else if($event == NULL){
			$objQuery = mysqli_query($conn,"SELECT ".$field." FROM ".$table);
		}else {
			$objQuery = mysqli_query($conn,"SELECT ".$field." FROM ".$table." WHERE ".$event);
        }
        return $objQuery;
    }

    function my_sql_insert($conn,$table,$set){
        return mysqli_query($conn,"INSERT INTO ".$table." SET ".$set);
    }
    
    function my_sql_insert_duplicate($conn,$table,$set,$check){
        return mysqli_query($conn,"INSERT INTO ".$table." SET ".$set."ON DUPLICATE KEY UPDATE".$check);
    }

    
    function my_sql_num_row($conn,$table,$set){
        $result = mysqli_query($conn,"SELECT * FROM ".$table." WHERE ".$set);
        return mysqli_num_rows($result);
    }

    function my_sql_delete($conn,$table,$set){
        return mysqli_query($conn,"DELETE  FROM ".$table." WHERE ".$set);
    }

    function my_sql_update($conn,$table,$set,$event){
        if($event != NULL){
            return mysqli_query($conn,"UPDATE ".$table." SET ".$set." WHERE ".$event);
        }else{
            return mysqli_query($conn,"UPDATE ".$table." SET ".$set);
        }
    }

    function close($conn) {
        mysqli_close($conn);
        //echo 'Connection closed!';
    }
}

?>
