<?php

//fetch.php

include('../connect/database_connection.php');

$column = array("id", "student_id", "s_group" , "student_name", "birthday" , "address", "email", "status");

$query = "SELECT * FROM student ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE student_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR student_id LIKE "%'.$_POST["search"]["value"].'%" 
 OR s_group LIKE "%'.$_POST["search"]["value"].'%" 
 OR email LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY ID DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['student_id'];
 $sub_array[] = $row['s_group'];
 $sub_array[] = $row['student_name'];
 $sub_array[] = $row['birthday'];
 $sub_array[] = $row['address'];
 $sub_array[] = $row['email'];
 $sub_array[] = $row['status'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM student";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>