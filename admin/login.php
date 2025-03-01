<?php
session_start();

require_once('../includes/connect.php');
$query = 'SELECT * FROM users WHERE username = ? AND password = ?';
$stmt = $pdo->prepare($query);
$stmt->bindParam(1, $_POST['username'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['password'], PDO::PARAM_STR);
$stmt->execute();

//what can come back from the query?

//if suuccessful, we should have one row

//if not successful, we should have no rows

if($stmt->rowCount()==1){
//succes stuff
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['username'] = $row['username'];
header('Location: project_list.php');

}else{
    header('Location: login_form.php');
    //go back to the login form, try again
}

$stmt = null;
?>