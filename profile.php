<?php 
session_start();

function volt_e_mar_kepe($felhasznalo, $con) {
    $sql_vizsgalat = 'SELECT felhasznalonev FROM profilkep';
    $result = mysqli_query($con, $sql_vizsgalat);

    while($row = mysqli_fetch_array($result)) {
        if($felhasznalo == $row["felhasznalonev"]) {
            return true;
        }
    }
    return false;
}


if (isset($_FILES["profilkep"])) {
    $megfelelo_formatum = ["jpeg", "jpg", "png"];
    $formatum = (pathinfo($_FILES["profilkep"]["name"], PATHINFO_EXTENSION));

    if (in_array($formatum, $megfelelo_formatum)) {
        if ($_FILES["profilkep"]["error"] === 0) {
            if ($_FILES["profilkep"]["size"] <= 31457280) {
                $cel = "img/avatarok/" . $_FILES["profilkep"]["name"];
                if (file_exists($cel)) {
                    $letezik = true;
                    
                }
                if (move_uploaded_file($_FILES["profilkep"]["tmp_name"], $cel)) {
                    echo "Sikeres fájlfeltöltés! <br>";
                } else {
                    echo "A fájl áthelyezése sikertelen... <br>";
                }

                try {
                    $con = mysqli_connect('localhost', 'root', '', 'login&register');
                } catch(mysqli_sql_exception) {
                    echo "Hiba történt az adatbázishoz való csatlakozás során...";
                }
                $felhasznalo = $_SESSION["username"];
                if (volt_e_mar_kepe($felhasznalo, $con)) {
                    if (isset($_POST["feltoltes"])) {
                        $sql_update = 'UPDATE profilkep SET prof_utvonal = ? WHERE felhasznalonev = ?';
                        $stmt = mysqli_prepare($con, $sql_update);
                        mysqli_stmt_bind_param($stmt, 'ss', $cel, $felhasznalo);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                        unset($felhasznalo, $cel);
                    }
                } else {
                    if (isset($_POST["feltoltes"])) {
                        $sql = 'INSERT INTO profilkep (felhasznalonev, prof_utvonal) VALUES (?,?)';
                        $stmt = mysqli_prepare($con, $sql);
                        mysqli_stmt_bind_param($stmt, 'ss', $felhasznalo, $cel);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                        unset($felhasznalo, $cel);
                    }
                }



            } else {
                echo "A fájl mérete meghaladja a megengedett maximum méretet...<br>";
            }
        } else {
            echo "A fájl feltöltése sikertelen...<br>";
        }
    } else {
        echo "A fájl fromátuma nem megfelelő...<br>";
    }
}

try {
    $con = mysqli_connect('localhost', 'root', '', 'login&register');
} catch(mysqli_sql_exception) {
    echo "Hiba történt az adatbázishoz való csatlakozás során...";
}
$felhasznalo = $_SESSION['username'];
$sql = "SELECT prof_utvonal FROM profilkep WHERE felhasznalonev = '$felhasznalo' ";
$result = mysqli_query($con, $sql);
$_SESSION['profilkep'] = mysqli_fetch_assoc($result);



?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Profil</title>
</head>
<body>
    <?php 
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
             <a href='cart.php' id='cart_img'><img src='img/navi/cart.png' id='cart_img2' alt='kosarad'></a>";
         if ($_SESSION['username'] == 'admin') {
             echo "
                        <a href='bejelentkezes.php' id='gomb'>Admin profil</a>
                    </nav>
                </header>";
         } else {
             echo "
                        <a href='bejelentkezes.php' id='gomb'>Saját profilod</a>
                    </nav>
                </header>";
         }
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
     
    

    <main style="margin-top: 10%">

        <div id="profile" style="color:ivory">
            <h1>Adataid:</h1>
            <img src="img/navi/rose.png" alt="Rose" id="login_rose">
            <img src='<?= $_SESSION['profilkep']['prof_utvonal'] ?>' alt="Profilképed" style="max-width: 75px">
            <p>Felhasználóneved: <?php echo $_SESSION["username"] ?>  </p>
            <p>E-mail címed: <?php echo $_SESSION["email"] ?></p>
            <form method="POST">
            <input type="submit" name="logout" id="logout" value="Kijelentkezés">
            <?php
            if ($_SESSION['username'] != 'admin') {
                echo '
                    <input type="submit" name="delete" value="Profil törlése">
                    <h2>Felhasználónév módosítása:</h2>
                    <input type="text" name="modosit">
                    <input type="submit" name="modositogomb" id="" value="Módosít">
                    </form>
                    <h2>Profilkép feltöltése:</h2>
                    <p>(Csak jpeg, png, jpg formátumú képet tölthetsz fel.)</p>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="profilkep" accept="image/*">
                        <br>
                        <input type="submit" name="feltoltes" value="Feltöltés" style="margin:20px 0px">
                    </form>';
            } else {
                echo '
                    <br>
                    <a href="user_management.php" id="gomb" style="margin:20px 0px">Felhasználók kezelése</a>';
            }
            ?>


            <?php

                if(isset($_POST["logout"])) {
                    unset($_SESSION["username"]);
                    unset($_SESSION["email"]);
                    header("Location:index.php");

                }

                //megváltoztatja felhasználónevét
                if ($_SESSION['username'] != 'admin') {
                    if(isset($_POST["modositogomb"])) {
                        try {
                            $con = mysqli_connect("localhost", "root", "", "login&register");
                        }
                        catch(mysqli_sql_exception $e) {
                            echo "Hiba az adatbázisba való kapcsolódáskor...";
                        }


                        $new_username = $_POST["modosit"];
                        $sql = "UPDATE felhasznalok SET felhasznalonev = ? WHERE felhasznalonev = ?";
                        $stmt = mysqli_prepare($con,$sql);
                        mysqli_stmt_bind_param($stmt, "ss",$new_username, $_SESSION["username"]);
                        mysqli_stmt_execute($stmt);

                        $sql = "UPDATE kosar SET felhasznalonev = ? WHERE felhasznalonev = ?";
                        $stmt = mysqli_prepare($con,$sql);
                        mysqli_stmt_bind_param($stmt, "ss",$new_username, $_SESSION["username"]);
                        mysqli_stmt_execute($stmt);

                        $sql = "UPDATE kedvencek SET felhasznalonev = ? WHERE felhasznalonev = ?";
                        $stmt = mysqli_prepare($con,$sql);
                        mysqli_stmt_bind_param($stmt, "ss",$new_username, $_SESSION["username"]);
                        mysqli_stmt_execute($stmt);

                        $sql = "UPDATE kerdesek SET felhasznalonev = ? WHERE felhasznalonev = ?";
                        $stmt = mysqli_prepare($con,$sql);
                        mysqli_stmt_bind_param($stmt, "ss",$new_username, $_SESSION["username"]);
                        mysqli_stmt_execute($stmt);

                        $sql = "UPDATE profilkep SET felhasznalonev = ? WHERE felhasznalonev = ?";
                        $stmt = mysqli_prepare($con,$sql);
                        mysqli_stmt_bind_param($stmt, "ss",$new_username, $_SESSION["username"]);
                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_close($stmt);
                        $_SESSION["username"] = $new_username;
                        header("location:profile.php");

                    }

                    if(isset($_POST["delete"])) {
                        try {
                            $con = mysqli_connect("localhost", "root", "", "login&register");
                        }
                        catch(mysqli_sql_exception $e) {
                            echo "Hiba az adatbázisba való kapcsolódáskor...";
                        }

                        $username = $_SESSION['username'];


                        //felhasználókból töröl
                        $sql = "DELETE FROM felhasznalok WHERE felhasznalonev = ?";
                        $stmt = mysqli_prepare($con, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);

                        //kosárból töröl
                        $sql = "DELETE FROM kosar WHERE felhasznalonev = ?";
                        $stmt = mysqli_prepare($con, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);

                        //kedvencekből töröl
                        $sql = "DELETE FROM kedvencek WHERE felhasznalonev = ?";
                        $stmt = mysqli_prepare($con, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);

                        //kerdesekbol töröl
                        $sql = "DELETE FROM kerdesek WHERE felhasznalonev = ?";
                        $stmt = mysqli_prepare($con, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);

                        //profilkep törlése
                        $sql = "DELETE FROM profilkep WHERE felhasznalonev = ?";
                        $stmt = mysqli_prepare($con, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);

                        //close
                        mysqli_stmt_close($stmt);

                        header("Location:index.php");
                        session_destroy();
                    }
                }

            ?>
        </div>
    </main> 
    

</body>
</html>