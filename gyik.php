<!DOCTYPE html>
<?php
session_start();
?>
<html lang='hu'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/style.css'>
    <title>GYIK</title>
</head>
<body>
<?php
    $username = $_SESSION['username'];
    if ($username == 'admin') {

        //Admin felület, ezt csak az 'admin' nevű felhasználó látja, itt tud válaszolni a kérdésekre.

        echo "
            <header>
                <h2 class='logo'>
                    Rose Dealers
                    <img src='img/navi/rose.png' alt='rose'>
                </h2>
                <nav class='navigation'>
                    <a href='index.php'>Kezdőlap</a>
                    <a href='ismerteto.php'>Ismertető</a>
                    <a href='shop.php'>Shop</a>
                    <a href='gyik.php'>GY.I.K.</a>
                    <a href='cart.php' id='cart_img'><img src='img/navi/cart.png' id='cart_img2' alt='kosarad'></a>
                    <a href='profile.php' id='gomb'>Admin profil</a>
                </nav>
            </header>
            <main >
                <div id='box'>";


        try {
            $con = mysqli_connect('localhost', 'root', '', 'login&register');
        } catch(mysqli_sql_exception) {
            echo "Hiba történt az adatbázishoz való csatlakozás során...";
        }
        if (isset($_POST['valasz'])) {
            $valasz = $_POST['valasz'];
            $kerdes = $_POST['kerdes'];
            $sql_update = 'UPDATE kerdesek SET valasz = ? WHERE kerdes = ?';
            $stmt = mysqli_prepare($con, $sql_update);
            mysqli_stmt_bind_param($stmt, 'ss', $valasz, $kerdes);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        $sql = 'SELECT kerdes, valasz, felhasznalonev FROM kerdesek WHERE valasz = ""';
        $result = mysqli_query($con, $sql);
        if ($result != null && mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                if (empty($row['valasz'])) {
                    ?>

                    <div class='avatar'>
                        <img src='img/avatarok/avatar3.png' alt='3-as avatar' class='avatar_pic'>
                        <img src='img/avatarok/our_prof.png' alt='Our profile picture' class='our'>
                        <p class='avatarP'><?= $row['kerdes'] ?></p>
                        <hr>
                        <form method='POST'>
                            <textarea name='valasz' cols='50' rows='3'></textarea>
                            <input name="kerdes" value="<?=$row['kerdes'] ?>" style="display: none">
                            <br>
                            <input type='submit' value='Válasz'>
                        </form>
                    </div>
                    <?php

                }
            }
        } else {
            echo "<div class='avatar' style='text-align: center'>
                        <p>Nincs megválaszolandó kérdés.</p>
                  </div>";
        }

        mysqli_free_result($result);
        mysqli_close($con);
        echo "
                </div>
            </main>";



    } else {

        //Felhasználói felület.


        echo "
            <header>
                <h2 class='logo'>
                    Rose Dealers
                    <img src='img/navi/rose.png' alt='rose'>
                </h2>
                <nav class='navigation'>
                    <a href='index.php'>Kezdőlap</a>
                    <a href='ismerteto.php'>Ismertető</a>
                    <a href='shop.php'>Shop</a>
                    <a href='gyik.php'>GY.I.K.</a>
                    <a href='cart.php' id='cart_img'><img src='img/navi/cart.png' id='cart_img2' alt='kosarad'></a>";

                    if (isset($_SESSION['username'])) {
                        echo" <a href='profile.php' id='gomb'>Saját profilod</a>";
                    } else {
                        echo" <a href='bejelentkezes.php' id='gomb'>Bejelentkezés</a>";
                    }
        echo "
                </nav>
            </header>
            <main >
                <div id='box'>
                    <div  class='avatar'>
                        <img src='img/avatarok/avatar1.png' alt='1-es avatar' class='avatar_pic'>
                        <img src='img/avatarok/our_prof.png' alt='Our profile picture' class='our'>
            
                        <p class='avatarP'>Lehet nálatok fekete rózsát kapni?</p>
                        <hr>
                        <p class='ourP'>Igen, lehet. Most mindössze 1500Ft/szál.</p>
                    </div>
                    
                    <div  class='avatar'>
                        <img src='img/avatarok/avatar2.png' alt='2-es avatar' class='avatar_pic'>
                        <img src='img/avatarok/our_prof.png' alt='Our profile picture' class='our'>
            
                        <p class='avatarP'>Mennyi idő alatt érkezik meg a rendelés?</p>
                        <hr>
                        <p class='ourP'>Mennyiségtől és időszaktól függ, de főszezonban, akár 2-3 nap.</p>
                    </div>
            
                    <div class='avatar'>
                        <img src='img/avatarok/avatar3.png' alt='3-as avatar' class='avatar_pic'>
                        <img src='img/avatarok/our_prof.png' alt='Our profile picture' class='our'>
            
                        <p class='avatarP'>Milyen kedvezményekre van lehetőség?</p>
                        <hr>
                        <p class='ourP'>Kecdvezményekkel regisztrált vásárlóink élhetnek, ezekről e-mailben van tájékoztatás.</p>
                    </div>
            
                    <div class='avatar' >    
                        <img src='img/avatarok/avatar4.png' alt='4-es avatár' class='avatar_pic'>
                        <img src='img/avatarok/our_prof.png' alt='Our profile picture' class='our'>
            
                        <p class='avatarP'>Hogyan érdemes elültetni a tőletek vásárolt rózsatövet?</p>
                        <hr>
                        <p class='ourP'>Fontos, hogy a rózsa fás szára kilátszódjon egy pár centire a földből. Friss virág földet kell alá önteni, majd megöntözni.</p>
                    </div> ";

        function kerdesvizsgalat ($con, $sql, $kerdes)
        {
            $result = mysqli_query($con, $sql);
            while ($aktualis_kerdes = mysqli_fetch_array($result)) {
                if ($aktualis_kerdes[0] == $kerdes) {
                    return true;
                }
            }
            return false;
        }


        $ureskerdes = false;
        $duplikalt = false;
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            try {
                $con = mysqli_connect('localhost', 'root', '', 'login&register');
            } catch(mysqli_sql_exception) {
                echo "Hiba történt az adatbázishoz való csatlakozás során...";
            }
            if($_SESSION['profilkep']['prof_utvonal'] != null) {
                $profilkeped = $_SESSION['profilkep']['prof_utvonal'];
            }else {
                $profilkeped = "";
            }
            

            if (isset($_POST['kerdes_kuldes'])) {

                $sql = 'SELECT kerdes FROM kerdesek';
                $kerdes = $_POST['kerdes'];
                $ureskerdes = empty($kerdes);
                $duplikalt = kerdesvizsgalat($con, $sql, $kerdes);
                
                if (!$ureskerdes && !$duplikalt){
                   
                    $sql = 'INSERT INTO kerdesek (felhasznalonev, kerdes, prof_utvonal) VALUES (?,?,?)';
                    $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, 'sss', $username,$kerdes, $profilkeped);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    unset($kerdes);
                }
            }
        }

                    try {
                        $con = mysqli_connect('localhost', 'root', '', 'login&register');
                    } catch(mysqli_sql_exception) {
                        echo "Hiba történt az adatbázishoz való csatlakozás során...";
                    }
                    $sql = 'SELECT kerdes, valasz, prof_utvonal FROM kerdesek';
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (empty($row['valasz'])) {
                            echo "
                                <div class='avatar'>
                                    <img src='$row[prof_utvonal]' alt='3-as avatar' class='avatar_pic'>
                                    <img src='img/avatarok/our_prof.png' alt='Our profile picture' class='our'>
                                    <p class='avatarP'>$row[kerdes]</p>
                                    <hr>
                                    <p class='ourP'>Csapatunk hamarosan válaszol!</p>
                                </div>";
                        } else {
                            echo "
                                <div class='avatar'>
                                    <img src='$row[prof_utvonal]' alt='3-as avatar' class='avatar_pic'>
                                    <img src='img/avatarok/our_prof.png' alt='Our profile picture' class='our'>
                                    <p class='avatarP'>$row[kerdes]</p>
                                    <hr>
                                    <p class='ourP'>$row[valasz]</p>
                                </div>";
                        }
                    }
                    mysqli_free_result($result);
                    mysqli_close($con);
        if (isset($_SESSION['username'])) {
            echo "<div class='avatar'>
                <img src='$profilkeped' alt='your profile picture' class='avatar_pic'>
                <p class='avatarP'>Ha kérdésedre nem találtál választ. Tedd fel bátran!</p>
                <hr>
                <form method='POST'>
                    <textarea name='kerdes' cols='50' rows='3'></textarea>
                    <br>
                    <input type='submit' value='Küldés' name='kerdes_kuldes'>
                </form>
            </div>";
        } else {
            echo "
            <div class='avatar'>
                <img alt='your profile picture' class='avatar_pic'>
                <p class='avatarP'>Ha kérdésedre nem találtál választ. Tedd fel bátran!</p>
                <hr>
                <form method='POST'>
                    <textarea name='kerdes' cols='50' rows='3'></textarea>
                    <br>
                    <input type='submit' value='Küldés' name='kerdes_kuldes'>
                </form>
            </div>";
        }


        if (!isset($_SESSION['username']) && isset($_POST['kerdes_kuldes'])) {
            echo "<div class='hiba'>HIBA: Ez a funkció csak bejelentkezett felhasználóknak érhető el!</div>";
        }

        if ($ureskerdes) {
            echo "<div class='hiba'>HIBA: Kérlek írj be egy kérdést!</div>";
        }
        if ($duplikalt) {
            echo "<div class='hiba'>HIBA: Ezt a kérdést már feltették!</div>";
        }
            echo "
                </div>
            </main>";
    }

?>

</body>
</html>