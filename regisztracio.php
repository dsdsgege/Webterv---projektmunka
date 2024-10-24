<?php
    session_start();

    // ha már loginoltak, akkor nem kell regisztrálniuk.
    if(isset($_SESSION["username"])) {
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Regisztráció</title>
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
        

             <fieldset>
                <h1>Regisztráció</h1>
                <img src="img/navi/rose.png" alt="Rose" id="login_rose">

                <?php
                // az adatbázissal való összekötés:
        try {
            $con = mysqli_connect("localhost", "root", "", "login&register");
        } catch(mysqli_sql_exception) {
            echo "Hiba történt az adatbázishoz való csatlakozás során...";
        }
        

            // ha nem ad vissza az isset fuggvény NULL-t, tehát valamit megadtak a POST -nak
            if( isset($_POST["regisztracio"]) ) {
                
                $username = $_POST["felhasznalonev"];
                $email = $_POST["email"];
                $password = $_POST["jelszo"];
                $password_again = $_POST["ujrajelszo"];
                $errors = array();

                // jelszo átkodolása
                $password_hash = password_hash($password, PASSWORD_BCRYPT);

                // ellenőrizzük, hogy megadták-e a mezőket, ha nem akkor error uzenet
                if ( empty($username) || empty($email) || empty($password) || empty($password_again) ) {
                    $errors["mezo"] = "Kérlek tölts ki minden mezőt.";
                } 
                else {
                    unset($errors["mezo"]); // ha minden mező ki van töltve töröljük az errort
                }

                // ellenőrizzük, hogy egyeznek-e a jelszavak, ha nem akkor error
                if ( $password != $password_again ) {
                    $errors["jelszo"] = "A két jelszónak meg kell egyeznie.";
                } 
                else {
                    unset($errors["jelszo"]); // ha megegyeznek a jelszavak töröljük az errort
                }


                // ellenőrizzük létezik-e már ilyen e-mail cím az adatbázisban
                function is_registered_email($con, $email) {
                    
                    $sql_email = "SELECT email FROM felhasznalok";
                    $result = mysqli_query($con,$sql_email);
                    

                    if($esult) {
                        while($row = mysqli_fetch_array($result)) {
                            if($row["email"] == $email) {
                                return true;
                            }
                        }
                    }

                    return false;
                }


                // ellenőrizzük létezik-e már ilyen felhasznalonev az adatbazisban
                function is_registered_username($con, $username) {

                    $sql_username = "SELECT felhasznalonev FROM felhasznalok";
                    $result = mysqli_query($con, $sql_username);              //elkesziti a query-t
                    
                    while($row = mysqli_fetch_array($result)) {
                        if($row["felhasznalonev"] == $username) {
                            return true;
                        }
                    }
                    
                    // ha nem szerepel akkor false-al térjünk vissza
                    return false;
                }

                //ha foglalt az email cim adjuk meg az errort, azonban ha nem foglalt, akkor töröljük, mert lehet azóta javítittak
                if(is_registered_email($con,$email)) {
                    $errors["email"] = "Ez az e-mail cím már foglalt kérlek a sajátodat add meg...";
                } else {
                    unset($errors["email"]);
                }


                // ha foglalt a felhasznalonev adjunk hozzá errort, azonban ha nem foglalt, akkor töröljük
                if(is_registered_username($con, $username)) {
                    $errors["felhasznalo"] = "Ez a felhasználónév már foglalt, kérlek próbálj meg valami mást pl.: " . $username . "0";
                } else {
                    unset($errors["felhasznalo"]);
                }


                // ha van error uzenet, irjuk ki
                if (count($errors) != 0) {
                    foreach( $errors as $error ) {
                        echo "<div style='color:white'> $error </div>";
                    }
                }
                
                // ha nincs error uzenet akkor mehetnek az adatok az adatbazisba
                else {
                    
                        //először helyet foglalunk neki
                        $sql = "INSERT INTO felhasznalok VALUES (?,?,?)";

                        // majd mysqli prepare-rel előkészítjük és "összekötjük" az SQL QUERY-t meg az 
                        // adatbázissal összekötő változónkat ($con)
                        $stmt = mysqli_prepare($con, $sql);
        
                        // bindeljuk a megadott parametereket
                        // "sss"   --- milyen típusú paraméterek lesznek bindelve
                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password_hash);
            
                        //executeoljuk
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                        
                        header("Location:bejelentkezes.php");
                        // -> érhetjük el php-ban az objektumok metóduasait
                    }
                } 
                
                ?>
                <input type="text" name="felhasznalonev" placeholder="Felhasználónév" required>
                <br>
                <input type="email" name="email" placeholder="E-mail cím" required>
                <br>
                <input type="password" name="jelszo" placeholder="Jelszó" required>
                <br>
                <input type="password" name="ujrajelszo" placeholder="Jelszó újra">
                <br>
                <input type="submit" value="Regisztráció" name="regisztracio">


                <p>Már van fiókja? <a href="bejelentkezes.php">Jelentkezzen be itt!</a></p>
            </fieldset>   
        </form>
    </main> 
    

</body>
</html>