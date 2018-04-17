<?php
  // Connect to database
  include("../includes/dbh.inc.php");
  $db = new dbObj();
  $connection =  $db->getConnstring();
 
  $request_method=$_SERVER["REQUEST_METHOD"];
  header('Access-Control-Allow-Headers');

  switch($request_method)
  {
    case 'GET':
    // Retrive Products
    if(!empty($_GET["id"]))
    {
    $id=intval($_GET["id"]);
    get_users($id);
    }
    else
    {
    get_users();
    }
    break;
    default:
    // Invalid Request Method
    header("HTTP/1.0 405 Method Not Allowed");
    break;
  }

  function get_users()
  {
    global $connection;
    $query="SELECT * FROM users";
    $response=array();
    $result=mysqli_query($connection, $query);
    while($row=mysqli_fetch_assoc($result))
    {
    $response[]=$row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  function get_singlEmployees($id=0)
  {
    global $connection;
    $query="SELECT * FROM users";
    if($id != 0)
    {
    $query.=" WHERE id=".$id." LIMIT 1";
    }
    $response=array();
    $result=mysqli_query($connection, $query);
    while($row=mysqli_fetch_assoc($result))
    {
    $response[]=$row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

?>