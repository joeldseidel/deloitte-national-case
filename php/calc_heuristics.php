<?php

$dbConn = new mysqli("localhost", "deloitt2", "qolpass", "deloitt2_db");

$market_heuristics = array();
$market_props = array();
$get_heuristics_query = $dbConn->query("SELECT * FROM partner_heuristics");
while($heuristics_obj = $get_heuristics_query->fetch_object()){
	array_push($market_heuristics, $heuristics_obj);
}
$get_market_props = $dbConn->query("SELECT * FROM market_props");
while($props_obj = $get_market_props->fetch_object()){
	array_push($market_props, $props_obj);
}

$partner_fit = array();

foreach($market_heuristics as $market){
	$market_name = $market->Ind_Id;
	echo "<h2>$market_name</h2>";
	echo "<table class='table'><thead><tr><th>Partner Name</th><th>Fit Index</th><th>Market Entry Index</th><th>Composite Strategy Score</th></tr></thead>";
	$optimal_score = $market->Compact + $market->Standard + $market->Trucks + $market->Luxury + $market->Safety + $market->Cost + $market->Ready + $market->Linked;
	foreach($market_props as $partner){
		$partner_score = 0;
		$partner_score += $market->Compact * $partner->compact;
		$partner_score += $market->Standard * $partner->standard;
		$partner_score += $market->Trucks * $partner->trucks;
		$partner_score += $market->Luxury * $partner->luxury;
		$partner_score += $market->Safety * $partner->safety;
		$partner_score += $market->Cost * $partner->cost;
		$partner_score += $market->Ready * $partner->ready;
		if($partner->linked == 0){
			$partner_score += $market->Linked;
		}
		$name = $partner->name;
		$fit_index = $partner_score / $optimal_score * 100;
		$ffit_index = number_format($fit_index, 2);
		$market_entry = getCompetitionMultiplier($market_name);
		$composite_score = $fit_index * $market_entry;
		$fcomposite_score = number_format($composite_score, 2);
		$fmarket_entry = number_format($market_entry * 100, 2);
		echo "<tr><td>$name</td><td>$ffit_index</td><td>$fmarket_entry</td><td>$fcomposite_score</td></tr>";
		array_push($partner_fit, $fit_index);
	}
	echo "</table>";
}

function getCompetitionMultiplier($market_name){
		switch($market_name){
			case "Local Deliveries":
				return 0.3 / 2 * 0.8;
			case "Professional Drivers / Trucking":
				return 0.2 / 3 * 0.8;
			case "Ride Hailing":
				return 0.4 / 2 * 0.8;
			case "Rescue / Emergency Services":
				return 0.1 / 2;
		}
}