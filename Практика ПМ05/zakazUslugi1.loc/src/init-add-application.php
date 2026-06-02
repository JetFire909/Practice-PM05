<?php
require 'init.php';

if($user->isGuest){
    header('Location: index.php');
    exit();
}

$application = new \src\Application($request, $db);
if($request->isPost){
    $application->load($request->post());
    try{
        $application->validate();
        $application->saveApplication($user->id);
        header('Location: account.php');
        exit();
    } catch (\src\exceptions\InvalidArgumentException $e){
        $error = $e->getMessage();
    }
}
$applications = $application->findByColumn('user_id', $user->id);
if($applications === null) $applications = [];
?>