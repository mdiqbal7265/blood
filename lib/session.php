<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Helper.php';

$db = new Database();
$help = new Helper();

// Fetch ALl Division
$division = $db->table('divisions')->getAll();

if(!isset($_SESSION['member'])){
    header('location: index.php');
    die();
}

$username = $_SESSION['member'];
$member_data = $db->table('member')
->column(['member.*','divisions.division_name','districts.district_name','upazilas.upozilla_name'])
->join('divisions','division','id')
->join('districts','district','id')
->join('upazilas','upazilla','id')
->where(['username'=>$username])
->get();



?>