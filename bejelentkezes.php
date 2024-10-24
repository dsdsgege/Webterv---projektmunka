<!DOCTYPE html>
<?php
    // enélkül nem lenne használható a SESSION szuperglobális valtozo
    session_start();

    if ($_SESSION["username"]) {

        header("Location: profile.php");
    }
    
?>



<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Bejelentkezés</title>
</head>
<body id="urlapok">
    
    <header>
        <h2 class="logo">
            Rose Dealers
            <img src="img/navi/rose.png" alt="rose">
        </h2>
        <nav class="navigation">
            <a href="index.php">Kezdőlap</a>
            <a href="ismerteto.php">Ismertető</a>
            <a href="shop.php">Shop</a>
            <a href="gyik.php">GY.I.K.</a>
            <a href="cart.php" id="cart_img"><img src="img/navi/cart.png" id="cart_img2" alt="kosarad">  </a>
            <a href="bejelentkezes.php" id="gomb">Bejelentkezés</a>
        </nav>
    </header>


    <main>
        

       <form method = "POST">
       <?php

            // kapcsolódás az adatbázishoz
            try {
                $con = mysqli_connect("localhost", "root", "", "login&register");
            } catch(mysqli_sql_exception) {
                echo "Hiba történt az adatbázishoz való csatlakozás során...";
            }

            function is_registered_username($con, $username) {
                $sql_username = "SELECT felhasznalonev FROM felhasznalok WHERE felhasznalonev = '$username'";
                $result = mysqli_query($con, $sql_username);
                $user_array = mysqli_fetch_assoc($result);

                if($user_array) {
                    return true;
                }
                else {
                    return false;
                }
             }


            // ha rányomtak a bejelentkezés gombra, akkor begyűjtjük az adatokat, majd ellenőrizzük...
            if(isset($_POST["bejelentkezes"])) {

                $username = $_POST["felhasznalonev"];   
                $password = $_POST["jelszo"];
                $errors = array();

                // leellenőrizzük, hogy van-e ilyen az adatbázisban
                if(!is_registered_username($con, $username)) {

                    $errors["felhasznalo"] = "Ez a felhasználónév nem szerepel az adatbázisunkban.";
                } 
                else {

                    unset($errors["felhasznalo"]);

                    // mehet a passwird ellenorzés
                    $sql_password = "SELECT * FROM felhasznalok WHERE felhasznalonev='$username'";
                    $result = mysqli_query($con, $sql_password);


                    // mivel a mysql_query egy result objectet ad vissza, valamelyik fetch-el lehet átalakítani
                    $user_array = mysqli_fetch_assoc($result);             // a result objectet asszociatív tömbbé alakítjuk
                    $password_in_db = $user_array['jelszo'];               // csak a jelszo rekord

                    if(!password_verify($password, $password_in_db)) {
                        
                        $errors[] = "Nem megfelelő jelszó.";
                    } 
                    else {

                        $email_sql = "SELECT email FROM felhasznalok WHERE felhasznalonev = '$username'";
                        $result = mysqli_query($con, $email_sql);
                        $user_array = mysqli_fetch_assoc($result);
                        $email = $user_array["email"];
                        
                        $_SESSION["username"] = $username;  
                        $_SESSION["email"] = "asd";
                        
                        print_r($_SESSION["username"]);
                        header("Location:profile.php");               // ha egyezik a jelszó az adatbázisban
                                                                    // tárolttal, akkor irányítsuk az index-re
                        exit;                                       // exit vagy die-t meg kell hivni hogy tovább ne fusson
                    }
                }
                
                // errorok kiiratasa, ha van
                if(count($errors) > 0) {

                    foreach( $errors as $error ) {
                        echo "<div style='color:white'> $error </div>";
                    }
                }

                /*
                // ha sikeresen létrehoztuk a SESSION valtozonkat, vigyen az index.php-ra
                if( isset($_SESSION["username"]) ) {
                    
                }
                */

            }

        ?>



            <fieldset>
                <h1>Bejelentkezés!</h1>
                <img src="img/navi/rose.png" alt="Rose" id="login_rose">
                <input type="text" name="felhasznalonev" placeholder="Felhasználónév" required >
                <br>
                <input type="password" name="jelszo" placeholder="Jelszó" required>
                <br>
                <label for="maradjon">Maradjon bejelentkezve?</label>
                <input type="checkbox" id="maradjon" name="maradjon" value="igen">
                <br>
                <input type="submit" value="Bejelentkezés" name="bejelentkezes">
                <p>Nincs még fiókja? <a href="regisztracio.php">Regisztráljon itt!</a></p>
            </fieldset>
    </form> 

    </main>
    
    
    

</body>
</html>