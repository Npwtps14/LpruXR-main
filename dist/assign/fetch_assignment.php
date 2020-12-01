<?php
session_start();
//fetch.php

include('../connect/database_connection.php');

$column = array("id", "term", "s_group", "subject_name", "topic" , "description", "deadline" );

$query = "SELECT  a.*,r.term,r.s_group,s.subject_name FROM assignment a 
LEFT JOIN register r ON(a.register_id = r.r_id) 
LEFT JOIN  subject s ON(s.subject_id = r.subject_id)  
WHERE r.user_id = ".$_SESSION["user_id"] ;

// print_r(array_values($_POST));
// exit;

if(isset($_POST["search"]["value"]))
{
    if($_POST["search"]["value"] != ""){
        $query .= '
        AND a.topic LIKE "%'.$_POST["search"]["value"].'%" 
        OR a.description LIKE "%'.$_POST["search"]["value"].'%" 
        OR a.deadline LIKE "%'.$_POST["search"]["value"].'%" 
        OR r.term LIKE "%'.$_POST["search"]["value"].'%" 
        OR r.s_group LIKE "%'.$_POST["search"]["value"].'%" 
        OR s.subject_name LIKE "%'.$_POST["search"]["value"].'%" 
        ';
    }
 
}

if(isset($_POST["order"]))
{
 $query .= ' ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= ' ORDER BY id DESC ';
}
// echo $query;
// exit;
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
 $sub_array[] = $row['id'];
 $sub_array[] = $row['term'];
 $sub_array[] = $row['subject_name'];
 $sub_array[] = $row['s_group'];
 $sub_array[] = $row['topic'];
 $sub_array[] = $row['description'];
 $sub_array[] = $row['deadline'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM assignment";
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