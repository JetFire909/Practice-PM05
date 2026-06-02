<?php
require 'src/init.php';

if($user->isGuest){
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION)) {
    session_start();
}

$id = (int)($_GET['id'] ?? 0);

if($id === 0){
    header('Location: account.php');
    exit();
}

$applications = new \src\Application($request, $db);
$applicationData = $applications->getById($id);
if(empty($applicationData)){
    header('Location: account.php');
    exit();
}
$applicationData = $applicationData[0];

if($applicationData['user_id'] != $user->id){
    header('Location: account.php');
    exit();
}

$applications->id = $id;
$applications->delete();

$_SESSION['account_flash'] = 'Заявка успешно отменена';

header('Location: account.php');
exit();
?>
