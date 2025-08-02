<?php

// print_r($_FILES);
// // die();
$action = $_REQUEST['action'];

if (!empty($action)) {
    require_once 'partials/User.php';
    $obj = new User();
}

if ($action == 'adduser' && !empty($_POST)) {
    $pname = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $photo = $_FILES['userphoto'];

    $playerid = (!empty($_POST['userId'])) ? $_POST['userId'] : '';
    $imagename = '';
    if (!empty($photo['name'])) {
        $imagename = $obj->uploadPhoto($photo);
        $playData = [
            'name' => $pname,
            'email' => $email,
            'mobile' => $mobile,
            'photo' => $imagename
        ];
    } else {
        $playData = [
            'name' => $pname,
            'email' => $email,
            'mobile' => $mobile
        ];
    }
    $playerid = $obj->add($playData);
    if (!empty($playerid)) {
        $player = $obj->getRow('id', $playerid);
        echo json_encode($player);
        exit();
    }
}

//getcountof function and getallusers action

if ($action == 'getallusers') {
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $limit = 5;
    $start = ($page - 1) * $limit;
    $users = $obj->getRows(start: $start, limit: $limit);
    if (!empty($users)) {
        $userList = $users;
    } else {
        $userList = [];
    }
    $total = $obj->getCount();
    $userArr = [
        'count' => $total,
        'users' => $userList
    ];
    echo json_encode($userList);
    exit();
}
