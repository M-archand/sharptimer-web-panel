<?php
    require_once("../../functions.php");
    require_once("../../config.php");
    $id = $conn -> real_escape_string($_POST['id']);
    #$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 5;
    if($id === "global"){
        //$sql = "SELECT DISTINCT `SteamID`, `PlayerName`, `GlobalPoints` FROM PlayerStats ORDER BY `GlobalPoints` DESC LIMIT $limit";
        $sql = "SELECT DISTINCT `SteamID`, `PlayerName`, `GlobalPoints`, (SELECT COUNT(*) FROM PlayerRecords WHERE PlayerStats.SteamID = PlayerRecords.SteamID) AS 'Cunt' FROM PlayerStats ORDER BY `GlobalPoints` DESC LIMIT 10";
        ShowRowsGlobal($sql);
    }
    elseif($id === "alltime"){
        $sql = "SELECT `SteamID`, `PlayerName`, `FormattedTime`, `MapName`, `TimesFinished`, `TimerTicks`, RANK() OVER(ORDER BY `TimerTicks` ASC) AS 'Ranking' FROM PlayerRecords ORDER BY `TimerTicks` ASC LIMIT 10";
        ShowRows($sql);
    }
    else{
        $sql = "SELECT DISTINCT `SteamID`, `PlayerName`, `FormattedTime`, `MapName`, `TimesFinished`, `TimerTicks` FROM PlayerRecords WHERE MapName LIKE '{$id}'  ORDER BY `TimerTicks` ASC LIMIT 10";
        ShowRows($sql);
    }
   

?>
