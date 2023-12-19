<?php
require_once("./config.php");
require_once("./assets/php/functions.php");


if(isset($_GET['sid'])){
    $sid = mysqli_real_escape_string($conn, $_GET['sid']);
    $sidexplode = explode("/", $sid);
    $query = "SELECT * FROM `playerrecords` WHERE SteamID = '{$sidexplode[1]}'";
    $result = mysqli_query($conn, $query) or die("bad query");
    $row = mysqli_fetch_array($result);
    if(empty($row)){
        header("Location: ../index.php");
    }
}
?>

    <?php require_once('core/header.php')?>
    <link rel="stylesheet" type="text/css" href="./assets/css/profiles.css?version=0">
        <div id="profile-wrapper" class="wrapper">
                <div class="profileheader">
                    <div class="user-info">
                    <a href="https://steamcommunity.com/profiles/<?php echo $row['SteamID']?>"><div class="avatar">
                            <img  src="<?php echo getAvatar($sid)?>" alt="<?php echo $sid?>">
                        </div></a>

                        <div class="infos">
                            <h3><?php echo $row['PlayerName']?></h3>
                            <span>
                                <img id="rank" src="./assets/images/ranks/sharptimer/s1.svg" alt="rank">
                                <p>Adam Malysz 1</p>
                            </span>

                        </div>
                    </div>
                </div>
</div>
    <main>
        <div class="wrapper">
            <div class="map-list2">
                <div id="sticky">
                <li class="togglemaps" onclick="toggleMaps()"></li>
                    <ul class="modes">

                        <?php
                        //SURF SQL:
                        $sqlsurf = "SELECT SteamID, MapName FROM `PlayerRecords` WHERE MapName LIKE 'SURF%' and SteamID = '{$sidexplode[1]}' ORDER BY MapName ASC";
                        $resultsurf = $conn->query($sqlsurf);
                        //KZ SQL:
                        $sqlkz = "SELECT SteamID, MapName FROM `PlayerRecords` WHERE MapName LIKE 'KZ%' and SteamID = '{$sidexplode[1]}' ORDER BY MapName ASC";
                        $resultkz = $conn->query($sqlkz);
                        //BunnyHop SQL:
                        $sqlbh = "SELECT SteamID, MapName FROM `PlayerRecords` WHERE MapName LIKE 'BHOP%' and SteamID = '{$sidexplode[1]}' ORDER BY MapName ASC";
                        $resultbh = $conn->query($sqlbh);
                        //OTHERS SQL:
                        $sqlother = "SELECT SteamID, MapName FROM `PlayerRecords` WHERE MapName NOT LIKE 'BHOP%' AND MapName NOT LIKE 'SURF%' AND MapName NOT LIKE 'KZ%'  and SteamID = '{$sidexplode[1]}' ORDER BY MapName ASC";
                        $resultother = $conn->query($sqlother);
                        if ($mapdivision === true) {
                            if ($resultsurf->num_rows > 0) {
                                echo '<li class="tablink';
                                if ($tabopened == "surf") {
                                    echo ' active"';
                                } else {
                                    echo '"';
                                }
                                echo 'onclick="openMode(event,' . "'surf'" . ')">SURF</li>';
                            }
                            if ($resultbh->num_rows > 0) {
                                echo '<li class="tablink';
                                if ($tabopened == "bh") {
                                    echo ' active"';
                                } else {
                                    echo '"';
                                }
                                echo 'onclick="openMode(event,' . "'bh'" . ')">BH</li>';
                            }
                            if ($resultkz->num_rows > 0) {
                                echo '<li class="tablink';
                                if ($tabopened == "kz") {
                                    echo ' active"';
                                } else {
                                    echo '"';
                                }
                                echo 'onclick="openMode(event,' . "'kz'" . ')">KZ</li>';
                            }
                            if ($resultother->num_rows > 0) {
                                echo '<li class="tablink';
                                if ($tabopened == "other") {
                                    echo ' active"';
                                } else {
                                    echo '"';
                                }
                                echo 'onclick="openMode(event,' . "'other'" . ')">Other</li>';
                            }
                        } else {
                            echo "";
                        }
                        ?>

                    </ul>
                    <ul class="mappeno" <?php 
                    if ($mapdivision === false){ 
                        echo 'style="display: block"';
                    }else {
                        echo "";
                    }
                    
                    ?>>
                    <li class="selector" data-id="%">All Maps & Gamemodes</li>
                    <?php
                        if ($mapdivision === true) {
                            if ($resultsurf->num_rows > 0) {
                                echo '<div id="surf" class="content';
                                if ($tabopened === "surf") {
                                    echo ' opened">';
                                } else {
                                    echo '">';
                                }
                                while ($row = $resultsurf->fetch_assoc()) {
                                    echo '<li class="selector" data-id="' . $row['MapName'] . '">' . $row['MapName'] . '</li>';
                                } ?>

                                <?php
                                echo '</div>';
                            }
                            if ($resultbh->num_rows > 0) {
                                echo '<div id="bh" class="content';
                                if ($tabopened === "bh") {
                                    echo ' opened">';
                                } else {
                                    echo '">';
                                }
                                while ($row = $resultbh->fetch_assoc()) {
                                    echo '<li class="selector" data-id="' . $row['MapName'] . '">' . $row['MapName'] . '</li>';
                                }
                                echo '</div>';
                            }
                            if ($resultkz->num_rows > 0) {
                                echo '<div id="kz" class="content';
                                if ($tabopened === "kz") {
                                    echo ' opened">';
                                } else {
                                    echo '">';
                                }
                                while ($row = $resultkz->fetch_assoc()) {
                                    echo '<li class="selector" data-id="' . $row['MapName'] . '">' . $row['MapName'] . '</li>';
                                }
                                echo '</div>';
                            }
                            if ($resultother->num_rows > 0) {
                                echo '<div id="other" class="content';
                                if ($tabopened === "other") {
                                    echo ' opened">';
                                } else {
                                    echo '">';
                                }
                                while ($row = $resultother->fetch_assoc()) {
                                    echo '<li class="selector" data-id="' . $row['MapName'] . '">' . $row['MapName'] . '</li>';
                                }
                                echo '</div>';
                            }
                        } else {
                            $sql = "SELECT DISTINCT MapName FROM `PlayerRecords` ORDER BY MapName ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<li class="selector" data-id="' . $row['MapName'] . '">' . $row['MapName'] . '</li>';
                                }

                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="leaderboard">
                <div class="info">
                    <div class="row">
                        <span> <i class="fa-solid fa-ranking-star"></i> </span>
                        <span> <i class="fa-solid fa-person-running"></i> Player </span>
                        <span> <i class="fa-solid fa-clock"></i> Time</span>
                        <span> <i class="fa-solid fa-map"></i> Map </span>

                    </div>
                </div>
                <div class="players">
                    <?php
                    $sql = "SELECT DISTINCT `SteamID`, `PlayerName`, `FormattedTime`, `MapName` FROM PlayerRecords WHERE SteamID = '{$sidexplode[1]}'  ORDER BY `TimerTicks` ASC LIMIT $limit";
                    ShowRows($sql);
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php require_once('core/footer.php')?>
    <script>
        $('.selector').on('click', function () {
            var data_id = $(this).data('id');
            var sid_data = "<?php echo $sidexplode[1]?>";
            $.ajax({
                url: 'assets/php/selectionprofile.php',
                type: 'POST',
                data: { id: data_id, sid: sid_data},
                dataType: 'text',
                success: function (data) {
                    $('.players').html(data);
                    //console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.players').html('');
                    alert('Error Loading');
                }
            });
        });
        
    </script>
</body>

</html>