<?php
include('dbcon.php');
//Start session
 session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) { ?>
  	<script>
								window.location = 'index.php';
							</script><?php
    exit();
}

$session_id=$_SESSION['id'];

$session_access=$_SESSION['useraccess'];

$tabname="";

if($session_access=="Organizer")
{
$user_query = $conn->query("select * from organizer where organizer_id = '$session_id'");
$user_row = $user_query->fetch();

}
else
{
$session_userid=$_SESSION['userid'];
$user_query = $conn->query("select * from organizer where organizer_id = '$session_id'");
$user_row = $user_query->fetch();


$tab_query = $conn->query("select * from organizer where organizer_id = '$session_userid'");
$tab_row = $tab_query->fetch();
$tabname = $tab_row['fname']." ".$tab_row['mname']." ".$tab_row['lname'] ;    
}



$name = $user_row['fname']." ".$user_row['mname']." ".$user_row['lname'] ;



$check_pass = $user_row['password'];
$pnum = $user_row['pnum'];
$email = $user_row['email'];



 

?>