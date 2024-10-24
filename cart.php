<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kosár</title>
    <link rel="stylesheet" href="css/style.css">
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
            
            <div class="cart_table">
                
                    <table>
                        <form method="POST">
                            <tr><td colspan="5"><h1>Kosarad tartalma</h1><hr></td></tr>

                            <?php 
                                if(isset($_SESSION["username"])) {
                                    try{
                                        $con = mysqli_connect("localhost", "root", "", "login&register");
                                    }
                                    catch(mysqli_sql_exception) {
                                        echo "Hiba történt az adatbázishoz való csatlakozás során...";
                                    }
                                
                                
                                    $username = $_SESSION["username"];
                                    $sql = "SELECT * FROM kosar WHERE felhasznalonev ='$username'";

                                    // result object elkeszitese
                                    $result = mysqli_query($con,$sql);
                                    

                                    // a table kiírása az adatbázisban lévő adatokkal
                                    // a fetch array csak egy sort olvas be, így while-al lehet végig iterálni
                                    while($sql_array = mysqli_fetch_array($result)) {

                                        
                                        ?>
                                        <tr>
                                            <td class='cart_img'><img src="<?=$sql_array['kep_utvonal']?>" alt=""></td>
                                            <td class="cart_product"> <a href="ismerteto.php#<?=$sql_array['html_id']?>">
                                            <?=$sql_array['termek'] ?> rózsa</a></td>
                                            <td class="cart_quantity">
                                                <input  type="number"  name="<?=  $sql_array["termek"]  ?>" id="biancarose" value="<?=$sql_array['szamlalo']?>" readonly>
                                                <label for="biancarose" >szál</label>
                                            </td>
                                            <td class="cart_price">1000 Ft/szál</td>
                                            <td> <button type = "submit" name = "kedvencekhez" >Kedvencekhez ad</button></td> 
                                        </tr>
                                        
                                        
                                        
                                        <?php
                                    }
                                }

                                ?>
                    
                    <?php
                            if( !isset($_SESSION["username"])) {
                                echo '
                        
                        <tr>
                            <td class="cart_img"> <img src="img/rozsak/bianca.jpg" alt="bianca rozsa"></td>
                            <td class="cart_product"> <a href="ismerteto.html#bianca">Bianca rózsa</a></td>
                            <td class="cart_quantity">
                                <input type="number" name="bianca" min="0" id="biancarose">
                                <label for="biancarose">szál</label>
                            </td>
                            <td class="cart_price">1000 Ft/szál</td>
                            <td> <button>Kedvencekhez ad</button></td>   
                        </tr>

                        <tr>
                            <td class="cart_img"> <img src="img/rozsak/gaumo.jpg" alt="Gaumo rozsa"></td>
                            <td class="cart_product"><a href="ismerteto.html#gaumo">Gaumó rózsa</a> </td>
                            <td class="cart_quantity">
                                <input type="number" name="gaumo" min="0" id="gaumorose">
                                <label for="gaumorose">szál</label>
                            </td>
                            <td class="cart_price">1000 Ft/szál</td>
                            <td> <button>Kedvencekhez ad</button></td>                    
                        </tr>

                        
                        <tr>
                        
                            <td class="cart_img"> <img src="img/rozsak/sissi.jpg" alt=""></td>
                            <td class="cart_product"><a href="ismerteto.html#sissi">Sissi rózsa</a></td>
                            <td class="cart_quantity">
                                <input type="number" name="sissi" min="0" id="sissirose">
                                <label for="sissirose">szál</label>
                            </td>
                            <td class="cart_price">1000 Ft/szál</td>
                            <td> <button>Kedvencekhez ad</button></td>                    
                        </tr>

                    </table>
                    <div id="osszesen"> 
                        <button id="lucky">szerencsekerék pörgetése</button>
                        <p>Összesen: xxxx Ft</p>
                        <p><button>Tovább a fizetéshez</button></p>
                    </div>';


                            }
                            ?>
      
                    </form>
                    </table>


                    <div id="osszesen">

                    <?php 
                        // alapból 0 az akcio, tehát ugyanaz az ár jelenik meg
                        $akcio = 0;

                        if(isset($_SESSION["username"])) {

                            if(isset($_POST["lucky"])) {
                                    // némelyiknek több az előfordulása, így azokat könnyebben kapjuk meg
                                    $akciok = array(30,20,20,10,15,5,5,5,5,5,10,10,10,15,15);
                                    echo "A nyereményed...";
                                    
                                    // random szam generalasa rand fuggvennyel, ami intet ad vissza 2 határ között
                                    // hogy ne generáljon minden frissítésnél újat, 
                                    if(!isset($_SESSION["random"])) {
                                        $_SESSION["random"] = rand(0,14); //inclusive
                                    }

                                    //akcio meghatározása
                                    $akcio = $akciok[$_SESSION["random"]];
                                    

                                    echo "$akcio % a végösszegből.";
                                }
                        }
                    ?>
                        
                        <?php
                        if(isset($_SESSION["username"])) {

                        
                            // összeg meghatározása
                            $sql = "SELECT szamlalo FROM kosar WHERE felhasznalonev = '$username'";
                            $result = mysqli_query($con,$sql);

                            
                            $osszesen = 0;
                            while($array = mysqli_fetch_array($result)) {
                                $osszesen += $array["szamlalo"];
                            }
                        
                        ?>
                        <p>Összesen: <?=
                        ($osszesen * 1000)*(1-($akcio/100)) ?> Ft</p>
                        <form method="POST">
                        <?php
                        
                        
                                if(!isset($_POST["lucky"])) {
                                    echo
                                        '<p><button type = "submit" name = "lucky">Szerencsekerék pörgetése</button></p>';
                                }
                            
                            ?>
                            <p><button type = "submit" name = "pay">Tovább a fizetéshez</button></p>
                        </form>
                    </div>
                    <?php }?>
            </div>

    </main>
</body>
</html>