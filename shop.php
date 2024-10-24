<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
    // a kosarba rak gomb lekezelese
    // azert van a tobbi kód előtt mert a benne levo header parancsnak minden php kimenetet meg kell előznie

    if(isset($_SESSION["username"])) {


        // kapcsolat az adatbazissal
        try {
            $con = mysqli_connect("localhost", "root", "", "login&register");
        } catch (mysqli_sqli_exception) {
            echo "Az adatbázishoz való csatlakozás sikertelen volt.";
        }

        $bool = 0;

        // query, helyfoglalassa
        $sql = "INSERT INTO kosar VALUES (?,?,?,?,?,?)";

        // előkészítés
        $stmt = mysqli_prepare($con,$sql);
        
        // bianca gomb
        if(isset($_POST["bianca"])) {
            $rozsa = "Bianca";
            $id = "bianca";
            $utvonal = "img/rozsak/bianca.jpg";
            $username = $_SESSION['username'];
            
            // megpróbálom lekérni az adatbázisból a rózsát, ha nincs benne akkor hozzáadom,
            // ha benne van, akkor a számlálót növelem
            //nullat ad vissza ha nem sikeres a query
            $result = mysqli_query($con, "SELECT termek FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
            if(mysqli_num_rows($result) == 0) {
                $szamlalo = 1;
                
                mysqli_stmt_bind_param($stmt, "ssissi", $username, $rozsa, $bool, $utvonal, $id, $szamlalo);

                //execute, lezaras
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            else {
                $result = mysqli_query($con, "SELECT szamlalo FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                $row = mysqli_fetch_row($result);
                $row[0]++;
                $new_szamlalo = $row[0];

                // UPDATE itt is helyfoglalással, előkészítéssel
                $stmt = mysqli_prepare($con, "UPDATE kosar SET szamlalo = ? WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                mysqli_stmt_bind_param($stmt,"i",$new_szamlalo);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            
            header("Location:shop.php");  //hogy elfelejtse a $_POST-ot igy nem tölti fel többször az adatbázisba frissites utan
        }

        // sissi
        if(isset($_POST["sissi"])) {
            $rozsa = "Sissi";
            $id = "sissi";
            
            $utvonal = "img/rozsak/sissi.jpg";
            $username = $_SESSION['username'];
            
            // megpróbálom lekérni az adatbázisból a rózsát, ha nincs benne akkor hozzáadom,
            // ha benne van, akkor a számlálót növelem
            //nullat ad vissza ha nem sikeres a query
            $result = mysqli_query($con, "SELECT termek FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
            if(mysqli_num_rows($result) == 0) {
                $szamlalo = 1;
                
                mysqli_stmt_bind_param($stmt, "ssissi", $username, $rozsa, $bool, $utvonal, $id, $szamlalo);

                //execute, lezaras
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            else {
                $result = mysqli_query($con, "SELECT szamlalo FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                $row = mysqli_fetch_row($result);
                $row[0]++;
                $new_szamlalo = $row[0];

                // UPDATE itt is helyfoglalással, előkészítéssel
                $stmt = mysqli_prepare($con, "UPDATE kosar SET szamlalo = ? WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                mysqli_stmt_bind_param($stmt,"i",$new_szamlalo);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            header("Location:shop.php");
        }

        // casanova
        if(isset($_POST["casanova"])) {
            $rozsa = "Casanova";
            $id = "casanova";

            $utvonal = "img/rozsak/casanova.png";
            $username = $_SESSION['username'];
            
            // megpróbálom lekérni az adatbázisból a rózsát, ha nincs benne akkor hozzáadom,
            // ha benne van, akkor a számlálót növelem
            //nullat ad vissza ha nem sikeres a query
            $result = mysqli_query($con, "SELECT termek FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
            if(mysqli_num_rows($result) == 0) {
                $szamlalo = 1;
                
                mysqli_stmt_bind_param($stmt, "ssissi", $username, $rozsa, $bool, $utvonal, $id, $szamlalo);

                //execute, lezaras
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            else {
                $result = mysqli_query($con, "SELECT szamlalo FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                $row = mysqli_fetch_row($result);
                $row[0]++;
                $new_szamlalo = $row[0];

                // UPDATE itt is helyfoglalással, előkészítéssel
                $stmt = mysqli_prepare($con, "UPDATE kosar SET szamlalo = ? WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                mysqli_stmt_bind_param($stmt,"i",$new_szamlalo);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            header("Location:shop.php"); 
        }

        // elisa
        if(isset($_POST["elisa"])) {
            $rozsa = "Queen Elisabeth";
            $id = "qelisa";

            $utvonal = "img/rozsak/elisabeth.jpg";
            $username = $_SESSION['username'];
            
            // megpróbálom lekérni az adatbázisból a rózsát, ha nincs benne akkor hozzáadom,
            // ha benne van, akkor a számlálót növelem
            //nullat ad vissza ha nem sikeres a query
            $result = mysqli_query($con, "SELECT termek FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
            if(mysqli_num_rows($result) == 0) {
                $szamlalo = 1;
                
                mysqli_stmt_bind_param($stmt, "ssissi", $username, $rozsa, $bool, $utvonal, $id, $szamlalo);

                //execute, lezaras
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            else {
                $result = mysqli_query($con, "SELECT szamlalo FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                $row = mysqli_fetch_row($result);
                $row[0]++;
                $new_szamlalo = $row[0];

                // UPDATE itt is helyfoglalással, előkészítéssel
                $stmt = mysqli_prepare($con, "UPDATE kosar SET szamlalo = ? WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                mysqli_stmt_bind_param($stmt,"i",$new_szamlalo);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            header("Location:shop.php");
        }

        // double 
        if(isset($_POST["double"])) {
            $rozsa = "Double Delight";
            $id = "doubledelight";

            $utvonal = "img/rozsak/double.jpg";
            $username = $_SESSION['username'];
            
            // megpróbálom lekérni az adatbázisból a rózsát, ha nincs benne akkor hozzáadom,
            // ha benne van, akkor a számlálót növelem
            //nullat ad vissza ha nem sikeres a query
            $result = mysqli_query($con, "SELECT termek FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
            if(mysqli_num_rows($result) == 0) {
                $szamlalo = 1;
                
                mysqli_stmt_bind_param($stmt, "ssissi", $username, $rozsa, $bool, $utvonal, $id, $szamlalo);

                //execute, lezaras
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            else {
                $result = mysqli_query($con, "SELECT szamlalo FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                $row = mysqli_fetch_row($result);
                $row[0]++;
                $new_szamlalo = $row[0];

                // UPDATE itt is helyfoglalással, előkészítéssel
                $stmt = mysqli_prepare($con, "UPDATE kosar SET szamlalo = ? WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                mysqli_stmt_bind_param($stmt,"i",$new_szamlalo);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            
            header("Location:shop.php");
        }

        // mr
        if(isset($_POST["mr"])) {
            $rozsa = "Mr. Lincoln";
            $id= "mrlincoln";

            $utvonal = "img/rozsak/mrlincoln.jpeg";
            $username = $_SESSION['username'];
            
            // megpróbálom lekérni az adatbázisból a rózsát, ha nincs benne akkor hozzáadom,
            // ha benne van, akkor a számlálót növelem
            //nullat ad vissza ha nem sikeres a query
            $result = mysqli_query($con, "SELECT termek FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
            if(mysqli_num_rows($result) == 0) {
                $szamlalo = 1;
                
                mysqli_stmt_bind_param($stmt, "ssissi", $username, $rozsa, $bool, $utvonal, $id, $szamlalo);

                //execute, lezaras
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            else {
                $result = mysqli_query($con, "SELECT szamlalo FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                $row = mysqli_fetch_row($result);
                $row[0]++;
                $new_szamlalo = $row[0];

                // UPDATE itt is helyfoglalással, előkészítéssel
                $stmt = mysqli_prepare($con, "UPDATE kosar SET szamlalo = ? WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                mysqli_stmt_bind_param($stmt,"i",$new_szamlalo);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            header("Location:shop.php");
        }

        // kronen
        if(isset($_POST["kronen"])) {
            $rozsa = "Kronenbourg";
            $id = "kronenbourg";

            $utvonal = "img/rozsak/kronenbourg.jpg";
            $username = $_SESSION['username'];
            
            // megpróbálom lekérni az adatbázisból a rózsát, ha nincs benne akkor hozzáadom,
            // ha benne van, akkor a számlálót növelem
            //nullat ad vissza ha nem sikeres a query
            $result = mysqli_query($con, "SELECT termek FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
            if(mysqli_num_rows($result) == 0) {
                $szamlalo = 1;
                
                mysqli_stmt_bind_param($stmt, "ssissi", $username, $rozsa, $bool, $utvonal, $id, $szamlalo);

                //execute, lezaras
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            else {
                $result = mysqli_query($con, "SELECT szamlalo FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                $row = mysqli_fetch_row($result);
                $row[0]++;
                $new_szamlalo = $row[0];

                // UPDATE itt is helyfoglalással, előkészítéssel
                $stmt = mysqli_prepare($con, "UPDATE kosar SET szamlalo = ? WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                mysqli_stmt_bind_param($stmt,"i",$new_szamlalo);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            header("Location:shop.php");
        }

        // gaumo
        if(isset($_POST["gaumo"])) {
            $rozsa = "Gaumó";
            $id = "gaumo";


            $utvonal = "img/rozsak/gaumo.jpg";
            $username = $_SESSION['username'];
            
            // megpróbálom lekérni az adatbázisból a rózsát, ha nincs benne akkor hozzáadom,
            // ha benne van, akkor a számlálót növelem
            //nullat ad vissza ha nem sikeres a query
            $result = mysqli_query($con, "SELECT termek FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
            if(mysqli_num_rows($result) == 0) {
                $szamlalo = 1;
                
                mysqli_stmt_bind_param($stmt, "ssissi", $username, $rozsa, $bool, $utvonal, $id, $szamlalo);

                //execute, lezaras
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
            else {
                $result = mysqli_query($con, "SELECT szamlalo FROM kosar WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                $row = mysqli_fetch_row($result);
                $row[0]++;
                $new_szamlalo = $row[0];

                // UPDATE itt is helyfoglalással, előkészítéssel
                $stmt = mysqli_prepare($con, "UPDATE kosar SET szamlalo = ? WHERE felhasznalonev = '$username' AND termek = '$rozsa'");
                mysqli_stmt_bind_param($stmt,"i",$new_szamlalo);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }

            header("Location:shop.php");
        }
    }

    ?>

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
    
        


    <main id="shop_main">
        <div class="sidebar">
        <form method ="POST" >
            
            <?php
                // ha csak a rózsatő van bejelölve
                // akkor a rózsaszál checked tulajdonsaga ne legyen checked, mert hát az hulyen nezne ki
                // és a rózsatő tulajdonsaga pedig legyen mar checked
                if(isset($_POST["checkbox_to"]) && !isset($_POST["checkbox_szal"])) {
                    echo "<div style=color:red ;background-color:white> Sajnos ez a termék jelenleg nem elérhető.</div>";
                    echo "<input type='checkbox' name='checkbox_szal' id='szal'> Rózsaszál, csokor <br>";
                    echo '<input type="checkbox" name="checkbox_to" id="to" checked = "checked"> Rózsatő';
                }
                
                else {
                    echo '<input type="checkbox" name="checkbox_szal" id="szal"  checked = "checked"> Rózsaszál, csokor <br>';
                    echo '<input type="checkbox" name="checkbox_to" id="to" > Rózsatő';
                }
            ?>
            
            <div class="egyedi">
                <form method="POST">
                    <h1>Egyedi megrendelés:</h1>
                    <select name="egyedi" >
                        <option value="egyedi_csokor" >Egyedi csokor</option>
                        <option value="sajat_fajta">Egyedi fajta</option>
                        <option value="ami_nincs">Olyan fajta, ami a shop-ban nincs</option>
                        <option value="egyeb"> egyéb</option>
                    </select>
                    <textarea name="reszletez" id="reszlet" cols="25" rows="5">Kérlek részletezd megrendelésed...</textarea>
                    <button type="submit" name="kuldes">Küldés</button>
                    <?php
                        
                        // ha rányomnak a kuldes gombra
                        if(isset($_POST["kuldes"])) {
                            
                            // ha be van jelentkezve, akkor felvesszük az egyedi rendelését az adatbázisba
                            if(isset($_SESSION["username"])) {


                                // a felhasználó által megadott adatok elmentése
                                $fajta = $_POST["egyedi"];
                                $reszletez = $_POST["reszletez"];
                                $username = $_SESSION["username"];
                                
                                // azért, hogy ne tudja elküldeni a "kitöltetlen" textareat
                                if($reszletez != "Kérlek részletezd megrendelésed...") {
                                    // kapcsolat megteremtese az adatbazissal
                                    try {
                                        $con = mysqli_connect("localhost", "root", "", "login&register");
                                    } catch (mysqli_sqli_exception) {
                                        echo "Az adatbázishoz való csatlakozás sikertelen volt.";
                                    }

                                    // ha sikeres a connection akkor jöhet az adatok átmásolása
                                    // először helyet foglalunk
                                    $sql = "INSERT INTO kosar VALUES (?,?,?,?,?,?)";
                                    
                                    // majd előkészítjük
                                    $stmt = mysqli_prepare($con, $sql);

                                    // bindeljük a lefoglalt helyekre
                                    // a boolean tipus most tinyint, tehát az 1-es a true-t jelenti,
                                    // vagyis igen, egyedi rendelésről van szó
                                    $string = $fajta . " " . $reszletez;
                                    $bool = 1;
                                    $quant = 1;
                                    $utvonal = "nincs_rola_kep";
                                    $id = "nincs_id";
                                    mysqli_stmt_bind_param($stmt, "ssisss", $_SESSION["username"], $string , $bool,$utvonal, $id, $quant);
                                    
                                    // execute
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_close($stmt);
                                }

                            }

                            // ha nincs bejelentkezve kiírjuk, hogy ehhez be kell jelentkeznie
                            else {
                                echo "<div style='color:red'>A küldés sikertelen <br>Ehhez a funkcióhoz be kell jelentkezned. </div>";
                            }
                        } 
                        
                        
                    
                    ?>
                </form>
    
            </div>
        </div>
            
            <?php
                if(!isset($_POST["kuldes"])) {
                    // ha nem küldenek rá a küldés gombra, akkor siman jelenjen meg minden a jobb oldalt
                        
                    echo "
                    <div class='shop_table'>
            <table>
                <tr>
                    <td>
                        <div class='container'>
                            <img src='img/rozsak/bianca.jpg' alt='Bianca rózsa'>
                            <div class='overlay'>
                                <h3>Bianca</h3>
                                <form method='POST'><button name='bianca' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                    </td>
                    
                    <td>
                        <div class='container'>
                            <img src='img/rozsak/sissi.jpg' alt='Sissi rózsa'>
                            <div class='overlay'>
                                <h3>Sissi</h3>
                                <form method='POST' ><button name='sissi' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class='container'>
                        <img src='img/rozsak/casanova.png' alt='Casanova rózsa'>
                        <div class='overlay'>
                            <h3>Casanova</h3>
                            <form method='POST' ><button name= 'casanova' type='submit'>Kosárba</button></form>
                        </div>
                    </div>
                    </td>
                   
                </tr>
                <tr>
                    <td>
                        <div class='container'>
                        <img src='img/rozsak/elisabeth.jpg' alt='Elisabeth rózsa'>
                        <div class='overlay'>
                            <h3>Elisabeth</h3>
                            <form method='POST' ><button name='elisa' type='submit'>Kosárba</button></form>
                        </div>
                    </div>
                    </td>
                    
                    <td>                       
                        <div class='container'>

                        <img src='img/rozsak/double.jpg' alt='Double rózsa'>
                        <div class='overlay'>
                            <h3>Double</h3>
                            <form method='POST' ><button name = 'double' type='submit'>Kosárba</button></form>
                        </div>
                    </div>
                    </td>
                    <td>
                        <div class='container'>
                        <img src='img/rozsak/mrlincoln.jpeg' alt='Mr.Lincoln rózsa'>
                        <div class='overlay'>
                            <h3>Mr.Lincoln</h3>
                            <form method='POST' ><button name = 'mr' type='submit'>Kosárba</button></form>
                        </div>
                    </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class='container'>
                        <img src='img/rozsak/kronenbourg.jpg' alt='kronenbourg rózsa'>
                        <div class='overlay'>
                            <h3>Kronenbourg</h3>
                            <form method='POST' ><button name='kronen' type='submit'>Kosárba</button></form>
                        </div>
                    </div>
                    </td>
                    
                    <td>
                        <div class='container'>
                        <img src='img/rozsak/gaumo.jpg' alt='Gaumo rózsa'>
                        <div class='overlay'>
                            <h3>Gaumó</h3>
                            <form method='POST' ><button name='gaumo' type='submit'>Kosárba</button></form>
                        </div>
                    </div>
                    </td>
                    <td>
                    </td>
                </tr>
                

            </table>
            
            </div>"
                    ;
                }
                
                // ha a rozsató és rózsaszál is be van jelölve
                if(isset($_POST["checkbox_szal"])  && isset($_POST["checkbox_to"])) {
                    echo "<div class='shop_table'>
                    <table>
                    <tr>
                        <td>
                            <div class='container'>
                                <img src='img/rozsak/bianca.jpg' alt='Bianca rózsa'>
                                <div class='overlay'>
                                    <h3>Bianca</h3>
                                    <form method='POST'><button name='bianca' type='submit'>Kosárba</button></form>
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <div class='container'>
                                <img src='img/rozsak/sissi.jpg' alt='Sissi rózsa'>
                                <div class='overlay'>
                                    <h3>Sissi</h3>
                                    <form method='POST' ><button name='sissi' type='submit'>Kosárba</button></form>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class='container'>
                            <img src='img/rozsak/casanova.png' alt='Casanova rózsa'>
                            <div class='overlay'>
                                <h3>Casanova</h3>
                                <form method='POST' ><button name= 'casanova' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                       
                    </tr>
                    <tr>
                        <td>
                            <div class='container'>
                            <img src='img/rozsak/elisabeth.jpg' alt='Elisabeth rózsa'>
                            <div class='overlay'>
                                <h3>Elisabeth</h3>
                                <form method='POST' ><button name='elisa' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                        
                        <td>                       
                            <div class='container'>
    
                            <img src='img/rozsak/double.jpg' alt='Double rózsa'>
                            <div class='overlay'>
                                <h3>Double</h3>
                                <form method='POST' ><button name = 'double' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                        <td>
                            <div class='container'>
                            <img src='img/rozsak/mrlincoln.jpeg' alt='Mr.Lincoln rózsa'>
                            <div class='overlay'>
                                <h3>Mr.Lincoln</h3>
                                <form method='POST' ><button name = 'mr' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                    </tr>
    
                    <tr>
                        <td>
                            <div class='container'>
                            <img src='img/rozsak/kronenbourg.jpg' alt='kronenbourg rózsa'>
                            <div class='overlay'>
                                <h3>Kronenbourg</h3>
                                <form method='POST' ><button name='kronen' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                        
                        <td>
                            <div class='container'>
                            <img src='img/rozsak/gaumo.jpg' alt='Gaumo rózsa'>
                            <div class='overlay'>
                                <h3>Gaumó</h3>
                                <form method='POST' ><button name='gaumo' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                        <td>
                        </td>
                    </tr>
                    
    
                </table>
                    </div>";
                }

                // ha csak a rózsaszál/ csokor van bejelölve
                if(isset($_POST["checkbox_szal"])) {
                    echo "<div class='shop_table'>
                    <table>
                    <tr>
                        <td>
                            <div class='container'>
                                <img src='img/rozsak/bianca.jpg' alt='Bianca rózsa'>
                                <div class='overlay'>
                                    <h3>Bianca</h3>
                                    <form method='POST'><button name='bianca' type='submit'>Kosárba</button></form>
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <div class='container'>
                                <img src='img/rozsak/sissi.jpg' alt='Sissi rózsa'>
                                <div class='overlay'>
                                    <h3>Sissi</h3>
                                    <form method='POST' ><button name='sissi' type='submit'>Kosárba</button></form>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class='container'>
                            <img src='img/rozsak/casanova.png' alt='Casanova rózsa'>
                            <div class='overlay'>
                                <h3>Casanova</h3>
                                <form method='POST' ><button name= 'casanova' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                       
                    </tr>
                    <tr>
                        <td>
                            <div class='container'>
                            <img src='img/rozsak/elisabeth.jpg' alt='Elisabeth rózsa'>
                            <div class='overlay'>
                                <h3>Elisabeth</h3>
                                <form method='POST' ><button name='elisa' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                        
                        <td>                       
                            <div class='container'>
    
                            <img src='img/rozsak/double.jpg' alt='Double rózsa'>
                            <div class='overlay'>
                                <h3>Double</h3>
                                <form method='POST' ><button name = 'double' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                        <td>
                            <div class='container'>
                            <img src='img/rozsak/mrlincoln.jpeg' alt='Mr.Lincoln rózsa'>
                            <div class='overlay'>
                                <h3>Mr.Lincoln</h3>
                                <form method='POST' ><button name = 'mr' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                    </tr>
    
                    <tr>
                        <td>
                            <div class='container'>
                            <img src='img/rozsak/kronenbourg.jpg' alt='kronenbourg rózsa'>
                            <div class='overlay'>
                                <h3>Kronenbourg</h3>
                                <form method='POST' ><button name='kronen' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                        
                        <td>
                            <div class='container'>
                            <img src='img/rozsak/gaumo.jpg' alt='Gaumo rózsa'>
                            <div class='overlay'>
                                <h3>Gaumó</h3>
                                <form method='POST' ><button name='gaumo' type='submit'>Kosárba</button></form>
                            </div>
                        </div>
                        </td>
                        <td>
                        </td>
                    </tr>
                    
    
                </table>
                    </div>";
                }

            ?>

            
            
            

    </main>

</body>
</html>