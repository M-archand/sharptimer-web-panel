<link rel="stylesheet" href="views/assets/css/adminpanel.css">
       <main>
        <div class="adminpanel" class="wrapper">
            <h1>Admin Panel</h1>
            <ul class="admin-functions">
                <a href=""><li>Edit Record</li></a>
                <a href=""><li>Edit Record</li></a>
                <a href=""><li>Edit Record</li></a>
                <a href=""><li>Edit Record</li></a>
            </ul>
        </div>
        <div class="leaderboard">
                <div class="info">
                    <div class="row">
                        <span> <i class="fa-solid fa-ranking-star"></i> </span>
                        <span> <i class="fa-solid fa-person-running"></i> Player </span>
                        <span> <i class="fa-solid fa-clock"></i> Time</span>
                        <span> <i class="fa-solid fa-map"></i> Map </span>
                        <span> <i class="fa-solid fa-map"></i> Action </span>
                    </div>
                </div>
                <div class="players">
                    <?php
                    $sql = "SELECT DISTINCT `SteamID`, `PlayerName`, `FormattedTime`, `MapName` FROM PlayerRecords WHERE MapName = 'surf_deathstar'  ORDER BY `TimerTicks` ASC";
                    ShowRowsAdminPanel($sql);
                    ?>
                </div>
            </div>
    </main>

    <div class="modal">
        <div class="modal-container">
        <div class="modal-exit"><i class="fa-solid fa-circle-xmark"></i></div>
            <div class="modal-content"></div>
            <!--
            <div class="player-edit">
            <img src="https://i.pinimg.com/564x/18/10/ae/1810ae3befd6c341bcc4d818b4a945ff.jpg" alt="pfp">
            <h3>Test Name</h3>    
            </div>
            <p id="mapname-edit">surf_siurek</p>
            -->
        </div>
    </div>
    <script>
        $('.modal-exit').on('click', function(){
            console.log();
            $('.modal').addClass('fadeout');
            setTimeout(function(){
            $('.modal').removeClass('active');
            $(document.body).removeClass('modalactive');
            $('.modal').removeClass('fadein');
            $('.modal').removeClass('fadeout');
            }, 500)
        })
        $('.edit').on('click', function () {
            var steam_id = $(this).data('steamid');
            var map_name = $(this).data('mapname');
            console.log(steam_id);
            var modal = $('.modal');
            modal.addClass("active fadein");
            $(document.body).addClass('modalactive');
            $.ajax({
                url: 'scripts/ajax/edit.php',
                type: 'POST',
                data: { steamdata: steam_id, mapname: map_name},
                dataType: 'text',
                success: function (data) {
                    $('.modal-content').html(data);
                    //console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-content').html('');
                    alert('Error Loading');
                }
            });
        });
        $('.delete').on('click', function () {
            var steam_id = $(this).data('steamid');
            var map_name = $(this).data('mapname');
            console.log(steam_id);
            var modal = $('.modal');
            modal.addClass("active fadein");
            $.ajax({
                url: 'scripts/ajax/delete.php',
                type: 'POST',
                data: { steamdata: steam_id, mapname: map_name},
                dataType: 'text',
                success: function (data) {
                    $('.modal-content').html(data);
                    //console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-content').html('');
                    alert('Error Loading');
                }
            });
        });
    </script>
</html>