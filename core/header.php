<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php BaseURL(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css?version=3">
    <!--<link rel="stylesheet" type="text/css" href="./assets/css/profiles.css?version=0"> -->
    <link href="assets/css/hamburgers.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $pagetitle ?>">
    <meta property="og:description" content="Your statistics in one place!">
    <meta property="og:url" content="">
    <meta property="og:image" content="https://i.imgur.com/6gHn8TN.png">
    <meta property="og:image:secure_url" content="https://i.imgur.com/6gHn8TN.png">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:footer" content="SharpTimer">
    <meta name="theme-color" content="#6389E8">
    <title>
        <?php echo $pagetitle ?>
    </title>
</head>

<body>
    <div id="top"></div>
    <div class="mobiletoggler" onclick="toggleMobile()">
        <button class="hamburger hamburger--spin" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
    <div class="mobile-nav">
        <ul>
            <?php
                    SocialURL();
            ?>
        </ul>
    </div>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="assets/images/logo.png" alt="logo">
                <h1>
                    <a href="<?php SITE_ROOT ?>"><?php echo $pagetitle ?></a>
                </h1>
                <div class="helpme">
                    <input id="search" type="search" placeholder="Search by Nickname or SteamID64">
                </div>
            </div>
            <ul>
                <?php
                    SocialURL();
                ?>
            </ul>

        </div>
    </header>
