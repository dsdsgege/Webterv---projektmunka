<?php
    // enélkül nem lenne használható a SESSION szuperglobális valtozo
    session_start();
    
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>User Management</title>
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
            <a href="profile.php" id="gomb">Saját profil</a>
        </nav>
    </header>


    <main>
        

       <form method = "POST">
        <table class="user_table">

            <?php

                    // kapcsolódás az adatbázishoz
                    try {
                        $con = mysqli_connect("localhost", "root", "", "login&register");
                    } catch(mysqli_sql_exception) {
                        echo "Hiba történt az adatbázishoz való csatlakozás során...";
                    }

                    // az összes felhasználó kiírása table-be, adatokkal

                    $sql = "SELECT * FROM felhasznalok";
                    $result = mysqli_query($con,$sql);
                    ?>

                    <?php
                    while ($array = mysqli_fetch_array($result)) {
                    
                        ?>
                        <tr>
                            <td>Felhasználónév: <?=$array["felhasznalonev"]?></td>
                            <td>E-mail cím: <?=$array["email"]?></td>
                            <td><button type = "submit" name = "<?=$array["felhasznalonev"]?>"> Törlés</button></td>
                            <?php
                            // user törlése
                            if(isset($_POST[$array["felhasznalonev"]])) {
                                $sql = "DELETE FROM felhasznalok WHERE felhasznalonev = ?";
                                $stmt = mysqli_prepare($con, $sql);
                                mysqli_stmt_bind_param($stmt, "s", $array["felhasznalonev"]);
                                mysqli_stmt_execute($stmt);
                            
                                $sql = "DELETE FROM kosar WHERE felhasznalonev = ?";
                                $stmt = mysqli_prepare($con, $sql);
                                mysqli_stmt_bind_param($stmt, "s", $array["felhasznalonev"]);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM profilkep WHERE felhasznalonev = ?";
                                $stmt = mysqli_prepare($con, $sql);
                                mysqli_stmt_bind_param($stmt, "s", $array["felhasznalonev"]);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM kerdesek WHERE felhasznalonev = ?";
                                $stmt = mysqli_prepare($con, $sql);
                                mysqli_stmt_bind_param($stmt, "s", $array["felhasznalonev"]);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM kedvencek WHERE felhasznalonev = ?";
                                $stmt = mysqli_prepare($con, $sql);
                                mysqli_stmt_bind_param($stmt, "s", $array["felhasznalonev"]);
                                mysqli_stmt_execute($stmt);
                                
                                mysqli_stmt_close($stmt);
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>

            

        </table>

            
    </form> 

    </main>
    
    
    

</body>
</html>