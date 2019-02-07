<?php
$ind_key = $_GET['ind_id'];
$compact_val = $_GET['cmpct'];
$standard_val = $_GET['std'];
$truck_val = $_GET['trk'];
$luxury_val = $_GET['lxry'];
$safety_val = $_GET['safe'];
$cost_val = $_GET['cost'];
$ready_val = $_GET['rdy'];
$linked_val = $_GET['link'];

$dbConn = new mysqli("localhost", "deloitt2", "qolpass", "deloitt2_db");

$create_market_stmt = $dbConn->prepare("INSERT INTO partner_heuristics (Compact, Standard, Trucks, Luxury, Safety, Cost, Ready, Linked, Ind_Id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$create_market_stmt->bind_param("iiiiiiiis", $compact_val, $standard_val, $truck_val, $luxury_val, $safety_val, $cost_val, $ready_val, $linked_val, $ind_key);
$create_market_stmt->execute();

header('Location: http://deloittecase.x10host.com/');