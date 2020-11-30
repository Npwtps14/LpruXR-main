<?php

//fetch.php

include('../connect/database_connection.php');

$column = array("r_id", "s_group", "term" , "subject_id", "subject_name"  ,"Fullname");

$query = "SELECT r.*,s.subject_name, u.Fullname FROM register r LEFT JOIN subject s ON(s.subject_id=r.subject_id) 
LEFT JOIN user u ON(u.ID=r.user_id) ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE r.term LIKE "%'.$_POST["search"]["value"].'%" 
 OR r.subject_id LIKE "%'.$_POST["search"]["value"].'%" 
 OR r.s_group LIKE "%'.$_POST["search"]["value"].'%" 
 OR u.Fullname LIKE "%'.$_POST["search"]["value"].'%" 
 OR s.subject_name LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY r.r_id DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
// echo $query ;
// exit;
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
 $sub_array[] = $row['r_id'];
 $sub_array[] = $row['term'];
 $sub_array[] = $row['s_group'];
 $sub_array[] = $row['subject_id'];
 $sub_array[] = $row['subject_name'];
 $sub_array[] = $row['Fullname'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM register";
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