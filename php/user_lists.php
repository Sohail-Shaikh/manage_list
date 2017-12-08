
<!DOCTYPE html>
<html>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script src="../JS/ajax.js"></script>
	 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
		</head>
			<body>
			          
			</body>
</html>
<?php
require_once('function_list.php');
$lists=new My_List();
$lists->user_list();
function delete($data)
{
	global $wpdb;
	$delete = $wpdb->query("DELETE from wp_manage_list WHERE user_no=".$data." limit 1");
	return $delete;
}
if(isset($_GET['id']))
{
	echo "hii";
	// $row=delete($_GET['id']);
	// if($row)
	// {
	// 	echo"<div class='alert alert-success'>The User Id ". $_GET['id']." is Data Successfully Delete!</div>";
	// 	header("http://localhost/wordpress/wp-admin/admin.php");
	// }
	// else
	// {
	// 	//echo "error";
	// }
}
// if(isset($_GET['id']))
// {
// 	$users_list= new manage_list();
// 	$id=$_GET['id'];
// 	$table='manage_list';
// 	$users_list->detail($id,$table);
// }