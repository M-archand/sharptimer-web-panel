<?php
function getrarity($name){

	$json = json_decode(file_get_contents(__DIR__ . "/../data/rarity.json"), true);
	foreach ($json as $skin) {
		if($skin['name'] === $name){
			echo $skin['rarity']['id'] ;
		} if($skin === "undefined"){
            echo "";
        }
	}
}

function getskinname($wid, $pid){
	$json = json_decode(file_get_contents(__DIR__ . "/../data/skins.json"), true);
	foreach ($json as $skin) {
		if( $skin['weapon_defindex'] == $wid && $skin['paint'] == $pid){
			echo $skin['paint_name'];
		}
	}
}

function getskinimg($wid, $pid){
	$json = json_decode(file_get_contents(__DIR__ . "/../data/skins.json"), true);
	foreach ($json as $skin) {
		if( $skin['weapon_defindex'] == $wid && $skin['paint'] == $pid){
			echo "<img style='min-width: 144px; max-width: 30%;' src='".$skin['image']."'/>";
		}
	}
}
