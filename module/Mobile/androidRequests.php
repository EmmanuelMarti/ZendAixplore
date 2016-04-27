<?php
include('adminFunctions.php');

$_REQUEST['adminUser'] = ( empty($_REQUEST['adminUser']) ) ? '' : $_REQUEST['adminUser'];
$_REQUEST['adminPass'] = ( empty($_REQUEST['adminPass']) ) ? '' : $_REQUEST['adminPass'];
if (!Admin\connect($_REQUEST['adminUser'], $_REQUEST['adminPass'])) {
    die(json_encode(['error'=>'Admin connection failed']));
}

$db = Admin\connectDataBase();

$PREFIXE = 'param_';

$function = empty($_REQUEST['function']) ? '' : $_REQUEST['function'];

$params = [];

foreach ($_GET as $key => $value) {
    if (preg_match('/^'.$PREFIXE.'/',$key)) {
        $params[preg_replace('/^'.$PREFIXE.'/','',$key)] = $value;
    }
}

if (!empty($function)) {
    try {
        call_user_func($function, $params);
    } catch (Exception $e) {
        die(json_encode(['error'=>'function '.$function.' does not exist']));
    }
}

die();



function getAllClasses($ar){
    return fetchAll('SELECT * FROM classes');
}

function getAllTopics($ar){
    return fetchAll('SELECT * FROM topics');
}

function getAllCourses($ar){
    return fetchAll('SELECT * FROM courses');
}

function getUser($ar){
    if( empty($ar['email']) || empty($ar['password']) ){
       echo(json_encode(['error' => 'empty parameter']));
       return;
    }
    $res = fetchAll('SELECT * FROM users WHERE email=? AND password=?',[$ar['email'], $ar['password']]);
    if(!empty($res)){
        foreach ($res as $key=>$value) {
            unset($res[$key]['password']);
        }
    }else{
       echo(json_encode(['error' => 'wrong combination']));
    }
    echo(json_encode($res));
}

function fetchAll($request,$ar){
    if(empty($request)){
        return null;
    }
    if(!is_array($ar)){
        $ar = [$ar];
    }
    global $db;
    $res = $db->prepare($request);
    $res->execute($ar);
    return $res->fetchAll(PDO::FETCH_ASSOC);
}