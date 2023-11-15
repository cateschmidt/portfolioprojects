<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Motors">
    <title>CSE 340 PHP Motors Homepage</title>
    <!--link stylesheets-->
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/small.css">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/large.css">
</head>

<body>
    <main>
        <header>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>

        <nav id="page_nav">
         <?php //require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; 
         echo $navList;?>
        </nav>




        <h1>Welcome to PHP Motors!</h1>
        <div class="features">
            <h2>DMC Delorean</h2>
            <p>3 Cup Holders</p>
            <p>Superman Doors</p>
            <p>Fuzzy Dice!</p>
        </div>
        <div class="graphics">
            <img class="own-today" src="/phpmotors/images/site/own_today.png" alt="Own Today Button">

            <img class="delorean" src="/phpmotors/images/vehicles/delorean.jpg" alt="Dolorean Picture">
        </div>
        <div class="upgrades-reviews">
            <div class="reviews">
                <h2>DMC Delorean Reviews</h2>
                <ul>
                    <li>"So fast it's almost traveling in time." (4/5)</li>
                    <li>"Coolest ride on the road." (4/5)</li>
                    <li>"I'm feeling Marty McFly!" (5/5)</li>
                    <li>"The most futuristic ride of our day." (4.5/5)</li>
                    <li>"80's livin' and I love it!" (5/5)</li>
                </ul>
            </div>
            <h3>Delorean Upgrades</h3>

            <div class="upgrades">
                <div class="flux">
                    <img src="/phpmotors/images/upgrades/flux-cap.png" alt="Flux Capacitor">
                    <br>
                    <p class="flux-cap">Flux Capacitor</p>

                </div>

                <div class="decals">
                    <img src="/phpmotors/images/upgrades/flame.jpg" alt="Flame Decals">
                    <p class="flame">Flame Decals</p>

                </div>

                <div class="stickers">
                    <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="Bumper Stickers">
                    <br>
                    <p class="bumper">Bumper Stickers</p>

                </div>

                <div class="caps">
                    <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="Hub Cap">
                    <br>
                    <p class="hub-caps">Hub Caps</p>

                </div>


            </div>
        </div>
        <hr>
        <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </main>
</body>

</html>