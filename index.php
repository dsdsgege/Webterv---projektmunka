<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezdőlap</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
       <?php
         session_start();
         if(isset($_SESSION["username"])) {
            echo" <header>
             <h2 class='logo'>
                 Rose Dealers
                 <img src='img/navi/rose.png' alt='rose'>
             </h2>
             <nav class='navigation'>
                 <a href='index.php'>Kezdőlap</a>
                 <a href='ismerteto.php'>Ismertető</a>
                 <a href='shop.php'>Shop</a>
                 <a href='gyik.php'>GY.I.K.</a>
                 <a href='cart.php' id='cart_img'><img src='img/navi/cart.png' id='cart_img2' alt='kosarad'>  </a>
                 <a href='bejelentkezes.php' id='gomb'>Saját profilod</a>
             </nav>
         </header>";
     
     
         }
         else {
             echo "<header>
             <h2 class='logo'>
                 Rose Dealers
                 <img src='img/navi/rose.png' alt='rose'>
             </h2>
             <nav class='navigation'>
                 <a href='index.php'>Kezdőlap</a>
                 <a href='ismerteto.php'>Ismertető</a>
                 <a href='shop.php'>Shop</a>
                 <a href='gyik.php'>GY.I.K.</a>
                 <a href='cart.php' id='cart_img'><img src='img/navi/cart.png' id='cart_img2' alt='kosarad'>  </a>
                 <a href='bejelentkezes.php' id='gomb'>Bejelentkezés</a>
             </nav>
         </header>";
         }
         
         
         ?>
         
       


    <main>
        <div id="bemutatkoz">
            Eddig sajnálatos módon nem lehetett szeretteinknek online gyönyörű rózsákat rendelni, ám ezt a problémát mi a földbe tiportuk, a rózsák és webshopok fúziójával. Gondosan nevelt, tökéletes minőségű rózsaszálakat, vagy akár kertészkedéshez rózsatöveket is vásárolhatnak nálunk. Megrendelésre személyre szabott rózsafajta ötvözeteket is létre tudunk hozni. Mindezen lehetőségek mellett kész rózsacsokrot is vásárolhatnak, amit kérésük alapján állítunk össze.
        </div>
        
            <iframe src="ism_iframe.php" class="ismerteto"></iframe>
            <iframe src="gyik_iframe.php" class="gyik"></iframe>
            <iframe src="shop_iframe.php" class="shop"></iframe>
    </main>

    <footer>


    </footer>
</body>
</html>  