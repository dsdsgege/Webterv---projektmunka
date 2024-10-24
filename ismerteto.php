<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ismertető</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    $username = $_SESSION['username'];
    if ($username == 'admin') {
        echo" 
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
                    <a href='bejelentkezes.php' id='gomb'>Admin profil</a>
                </nav>
            </header>";

        echo "
            <main>      
                <div class='kisdoboz'  id='vacak'>
                    <h2 id='mrlincoln'>Mr. Lincoln</h2>
                    <hr>
                    <img src='img/rozsak/mrlincoln.jpeg' alt='Mr. Lincoln rózsa' >
                    <h3>Leírás:</h3>
                    <p>Bordó, bársonyos, telt virágú, erősen illatos, szálas virágú.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Ültetés: A teahibryd rózsatövek általában egymástól 60 cm sor-, 40 cm tőtávolság legyenek. Metszés: A metszés ideje február vége, április közepe, de esetleg a tél elején is elvégezhetjük ezt a műveletet. Általános szabály, hogy 3-4 vázágat hagyunk, a gyenge növekedésűeket 3-4 szemre, a közepes növekedésűeket 5-6 szemre, az erős növekedésűeket 6-8 szemre metsszük. Metszeni mindig ferdén, közvetlenül 5-10 mm-rel a rügy felett kell úgy, hogy a rügy mindig a metszés magasabbik oldalán legyen. Tápanyag utánpótlás: Tápanyag utánpótlásra az ültetés évében nincs szükség. A második évtől dolgozzunk a talajba négyzetméterenként 5-10 kg istállótrágyát.</p>      
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='bianca'>Bianca tearózsa</h2>
                    <hr>
                    <img src='img/rozsak/bianca.jpg' alt='Bianca rózsa' >
                    <h3>Leírás:</h3>
                    <p>Hófehér, telt virágaival az elegancia megtestesítője.</p>
                    <h3>Virág jellemzői:</h3>
                    <p>Elegáns megjelenésű, hófehér virágú, dús virágzatú, enyhe illatú rózsafajta. Ültetési ideje: szabad gyökerű törzses növény március-április, illetve október-november, konténeres törzses változat egész évben telepíthető.</p>
                    <h3>Növény jellemzői:</h3>
                    <p>Erőteljes növekedés jellemzi, virágzási ideje ismétlődő, téli keményebb hónapokat jól viseli. Virágzási ideje: kora nyártól késő őszig (júniustól novemberig), az első fagyokig virágzik.</p>    
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='sissi'>Sissi</h2>
                    <hr>
                    <img src='img/rozsak/sissi.jpg' alt='Sissi rózsa' >
                    <h3>Leírás:</h3>
                    <p>Kifejezetten elegáns megjelenésű, különleges lila virága kitűnik a hagyományos rózsák közül, kellemes illatú, nagyvirágú.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Ültetés: - szabadgyökerű példányokat kora tavasszal, február második felétől április közepéig, és ősszel október elejétől november végéig ültessünk - konténeres növények telepítése márciustól novemberig ajánlott.</p>  
                    <h3>Növény jellemzői:</h3>
                    <p>Magas bokrot nevel, magassága kb. 150 cm, felálló ágrendszerű, téli fagyokat jól viseli, hosszú szárán hozza nagy virágát, jó minőségű vágott virág, hosszú virágzási idő jellemzi, betegségekkel szemben ellenálló.</p>   
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='gaumo'>Gaumó</h2>
                    <hr>
                    <img src='img/rozsak/gaumo.jpg' alt='Gaumó rózsa'>
                    <h3>Leírás:</h3>
                    <p>Virág színe rózsaszín ezüstös fonákkal, egyedi színvilágával kitűnik a klasszikus rózsaszín fajták közül, teltvirágú, enyhén illatos.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>- szabadgyökerű tövek ültetése március-április, illetve október-november hónapokban ideális
                        - konténeres növények majd egész évben, márciustól novemberig telepíthetők</p>  
                    <h3>Növény jellemzői:</h3>
                    <p>A bokor magassága kb. 80-100 cm, elágazó ágrendszerű, hosszú szárán hozza nagy virágát, jó minőségű vágott virág és folyamatos virágzás jellemzi, abszolút télálló, betegségekkel szemben toleráns.</p>   
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='qelisa'>Queen Elisabeth</h2>
                    <hr>
                    <img src='img/rozsak/elisabeth.jpg' alt='Queen Elisabeth rózsa'>
                    <h3>Leírás:</h3>
                    <p>Rózsaszín, finom, szép állású, kecses, telt virágok jellemzik, kellemesen édes illatú.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Ültetés: - szabadgyökerű példányokat kora tavasszal, február második felétől április közepéig, és ősszel október elejétől november végéig ültessünk - konténeres növények telepítése márciustól novemberig ajánlott.</p>  
                    <h3>Növény jellemzői:</h3>
                    <p>Az egyik legnemesebb fajta, erőteljes, felfelé törekvő növekedés jellemzi, az egyik legmagasabb tearózsa, elérheti a 150-200 cm-t is, erőteljes növekedésének köszönhetően elviseli a mostohább körülményeket is, így félárnyékban is szépen fejlődik, fagytűrő képessége figyelemre méltó, talajban nem válogat.</p>   
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='casanova'>Casanova</h2>
                    <hr>
                    <img src='img/rozsak/casanova.png' alt='Casanova rózsa'>
                    <h3>Leírás:</h3>
                    <p>A sárga virágú fajták egyik legszebb változata, alapszíne élénk sárga, de felfedezhető benne némi barackszín is, ettől válik igazán csodálatossá, kellemesen illatos, telt virágok borítják. Bokros, középerős fejlődésű, teljes magasságában 150 cm magas, betegségekre nem fogékony, téli fagyokat jól toleráló, kiváló házikerti fajta.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Metszése: 
                        - február vége és április között (tavaszi metszés)
                        - a beteg, sérült ágakat és vesszőket minden esetben távolítsuk el
                        - az elöregedett részeket tőből vágjuk ki
                        - a hosszúra nyúlt hajtásokat 6-8 szem fölött, a gyengébb, rövid vesszőket tőből, a rövidebb hajtásokat 2-3 szemre vágjuk vissza
                        - az elnyílt virágokat rendszeresen metsszük le, így hamarabb képződik új virág (nyári metszés).</p>      
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='doubledelight'>Double Delight</h2>
                    <hr>
                    <img src='img/rozsak/double.jpg' alt='Double Delight rózsa'>
                    <h3>Leírás:</h3>
                    <p>Krémszínű, piros szegővel, telt virágú, erősen illatos, szálas virágú.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Metszése:
                        - február vége és április között (tavaszi metszés)
                        - a beteg, sérült ágakat és vesszőket minden esetben távolítsuk el
                        - az elöregedett részeket tőből vágjuk ki
                        - a hosszúra nyúlt hajtásokat 6-8 szem fölött, a gyengébb, rövid vesszőket tőből, a rövidebb hajtásokat 2-3 szemre vágjuk vissza
                        - az elnyílt virágokat rendszeresen metsszük le, így hamarabb képződik új virág (nyári metszés)</p>      
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='kronenbourg'>Kronenbourg</h2>
                    <hr>
                    <img src='img/rozsak/kronenbourg.jpg' alt='Kronenbourg rózsa'>
                    <h3>Leírás:</h3>
                    <p>Vörös aranysárga fonákkal, illatos, teltvirágú. Bokros, magas, erős növekedésű, fagytűrő, hosszú szárán hozza nagy virágát, kitűnő vágott virág, ismétlődő virágzás.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Metszés: - február vége és április között (tavaszi metszés)
                        - a beteg, sérült ágakat és vesszőket minden esetben távolítsuk el
                        - az elöregedett részeket tőből vágjuk ki
                        - a hosszúra nyúlt hajtásokat 6-8 szem fölött, a gyengébb, rövid vesszőket tőből, a rövidebb hajtásokat 2-3 szemre vágjuk vissza
                        - az elnyílt virágokat rendszeresen metsszük le, így hamarabb képződik új virág (nyári metszés)</p>      
                </div>";

        //Új rózsafajta bekérése és eltárolása az adatbázisba.

        try {
            $con = mysqli_connect('localhost', 'root', '', 'login&register');
        } catch(mysqli_sql_exception) {
            echo "Hiba történt az adatbázishoz való csatlakozás során...";
        }
        if (isset($_POST['rozsa_kuld'])) {
            $fajta = $_POST['rozsa_neve'];
            $rozsa_id = $_POST['rozsa_id'];
            $url = $_POST['kep_url'];
            $alt = $_POST['kep_alt'];
            $leiras = $_POST['leiras'];
            $gondozasi = $_POST['gondozasi'];
            if ($fajta == null || $rozsa_id == null || $url == null || $alt == null || $leiras == null || $gondozasi == null) {
                echo "<div style='color:white'>Kérlek minden mezőt tölts ki!</div>";
            } else {
                $sql = 'INSERT INTO ismerteto (fajta, rozsa_id, url, alt, leiras, gondozas) VALUES (?,?,?,?,?,?)';
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, 'ssssss', $fajta,$rozsa_id,$url,$alt,$leiras,$gondozasi);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                unset($fajta, $rozsa_id, $url, $alt, $leiras, $gondozasi);
            }
        }

        //Adatbázisban szereplő új rózsafajták kiíratása.

        try {
            $con = mysqli_connect('localhost', 'root', '', 'login&register');
        } catch(mysqli_sql_exception) {
            echo "Hiba történt az adatbázishoz való csatlakozás során...";
        }
        $sql = 'SELECT fajta, rozsa_id, url, alt, leiras, gondozas FROM ismerteto';
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
                <div class='kisdoboz'>
                    <h2 id='$row[rozsa_id]'>$row[fajta]</h2>
                    <hr>
                    <img src='$row[url]' alt='$row[alt]'>
                    <h3>Leírás:</h3>
                    <p>$row[leiras]</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>$row[gondozas]</p>      
                </div>
            ";
        }
        mysqli_free_result($result);
        mysqli_close($con);


        echo "
                
                <div class='kisdoboz'>
                    <form method='POST'>
                        <input type='text' name='rozsa_neve' placeholder='Rózsa fajtája' style='background-color: lightgoldenrodyellow'>
                        <input type='text' name='rozsa_id' placeholder='Rózsa ID-je' style='background-color: lightgoldenrodyellow'>
                        <hr>
                        <input type='text' name='kep_url' placeholder='Kép URL címe' style='background-color: lightgoldenrodyellow'>
                        <input type='text' name='kep_alt' placeholder='Kép helyettesítő szövege' style='background-color: lightgoldenrodyellow'>
                        <h3>Leírás:</h3>
                        <textarea name='leiras' cols='100' rows='6' placeholder='Rózsa leírása' style='background-color: lightgoldenrodyellow'></textarea>
                        <h3>Gondozási tudnivalók:</h3>
                        <textarea name='gondozasi' cols='100' rows='6' placeholder='Gondozási tudnivalók' style='background-color: lightgoldenrodyellow'></textarea> 
                        <input type='submit' value='Küldés' name='rozsa_kuld'>
                    </form>     
                </div>
            </main>
            <footer>   
            </footer>";

    } else {

        //Felhasználói felület.

        echo" 
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
        if(isset($_SESSION["username"])) {
            echo "
                    <a href='bejelentkezes.php' id='gomb'>Saját profilod</a>
                </nav>
            </header>";
        } else {
            echo "
                    <a href='bejelentkezes.php' id='gomb'>Bejelentkezés</a>
                </nav>
            </header>";
        }
        echo "
            <main>      
                <div class='kisdoboz'  id='vacak'>
                    <h2 id='mrlincoln'>Mr. Lincoln</h2>
                    <hr>
                    <img src='img/rozsak/mrlincoln.jpeg' alt='Mr. Lincoln rózsa' >
                    <h3>Leírás:</h3>
                    <p>Bordó, bársonyos, telt virágú, erősen illatos, szálas virágú.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Ültetés: A teahibryd rózsatövek általában egymástól 60 cm sor-, 40 cm tőtávolság legyenek. Metszés: A metszés ideje február vége, április közepe, de esetleg a tél elején is elvégezhetjük ezt a műveletet. Általános szabály, hogy 3-4 vázágat hagyunk, a gyenge növekedésűeket 3-4 szemre, a közepes növekedésűeket 5-6 szemre, az erős növekedésűeket 6-8 szemre metsszük. Metszeni mindig ferdén, közvetlenül 5-10 mm-rel a rügy felett kell úgy, hogy a rügy mindig a metszés magasabbik oldalán legyen. Tápanyag utánpótlás: Tápanyag utánpótlásra az ültetés évében nincs szükség. A második évtől dolgozzunk a talajba négyzetméterenként 5-10 kg istállótrágyát.</p>      
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='bianca'>Bianca tearózsa</h2>
                    <hr>
                    <img src='img/rozsak/bianca.jpg' alt='Bianca rózsa' >
                    <h3>Leírás:</h3>
                    <p>Hófehér, telt virágaival az elegancia megtestesítője.</p>
                    <h3>Virág jellemzői:</h3>
                    <p>Elegáns megjelenésű, hófehér virágú, dús virágzatú, enyhe illatú rózsafajta. Ültetési ideje: szabad gyökerű törzses növény március-április, illetve október-november, konténeres törzses változat egész évben telepíthető.</p>
                    <h3>Növény jellemzői:</h3>
                    <p>Erőteljes növekedés jellemzi, virágzási ideje ismétlődő, téli keményebb hónapokat jól viseli. Virágzási ideje: kora nyártól késő őszig (júniustól novemberig), az első fagyokig virágzik.</p>    
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='sissi'>Sissi</h2>
                    <hr>
                    <img src='img/rozsak/sissi.jpg' alt='Sissi rózsa' >
                    <h3>Leírás:</h3>
                    <p>Kifejezetten elegáns megjelenésű, különleges lila virága kitűnik a hagyományos rózsák közül, kellemes illatú, nagyvirágú.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Ültetés: - szabadgyökerű példányokat kora tavasszal, február második felétől április közepéig, és ősszel október elejétől november végéig ültessünk - konténeres növények telepítése márciustól novemberig ajánlott.</p>  
                    <h3>Növény jellemzői:</h3>
                    <p>Magas bokrot nevel, magassága kb. 150 cm, felálló ágrendszerű, téli fagyokat jól viseli, hosszú szárán hozza nagy virágát, jó minőségű vágott virág, hosszú virágzási idő jellemzi, betegségekkel szemben ellenálló.</p>   
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='gaumo'>Gaumó</h2>
                    <hr>
                    <img src='img/rozsak/gaumo.jpg' alt='Gaumó rózsa'>
                    <h3>Leírás:</h3>
                    <p>Virág színe rózsaszín ezüstös fonákkal, egyedi színvilágával kitűnik a klasszikus rózsaszín fajták közül, teltvirágú, enyhén illatos.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>- szabadgyökerű tövek ültetése március-április, illetve október-november hónapokban ideális
                        - konténeres növények majd egész évben, márciustól novemberig telepíthetők</p>  
                    <h3>Növény jellemzői:</h3>
                    <p>A bokor magassága kb. 80-100 cm, elágazó ágrendszerű, hosszú szárán hozza nagy virágát, jó minőségű vágott virág és folyamatos virágzás jellemzi, abszolút télálló, betegségekkel szemben toleráns.</p>   
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='qelisa'>Queen Elisabeth</h2>
                    <hr>
                    <img src='img/rozsak/elisabeth.jpg' alt='Queen Elisabeth rózsa'>
                    <h3>Leírás:</h3>
                    <p>Rózsaszín, finom, szép állású, kecses, telt virágok jellemzik, kellemesen édes illatú.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Ültetés: - szabadgyökerű példányokat kora tavasszal, február második felétől április közepéig, és ősszel október elejétől november végéig ültessünk - konténeres növények telepítése márciustól novemberig ajánlott.</p>  
                    <h3>Növény jellemzői:</h3>
                    <p>Az egyik legnemesebb fajta, erőteljes, felfelé törekvő növekedés jellemzi, az egyik legmagasabb tearózsa, elérheti a 150-200 cm-t is, erőteljes növekedésének köszönhetően elviseli a mostohább körülményeket is, így félárnyékban is szépen fejlődik, fagytűrő képessége figyelemre méltó, talajban nem válogat.</p>   
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='casanova'>Casanova</h2>
                    <hr>
                    <img src='img/rozsak/casanova.png' alt='Casanova rózsa'>
                    <h3>Leírás:</h3>
                    <p>A sárga virágú fajták egyik legszebb változata, alapszíne élénk sárga, de felfedezhető benne némi barackszín is, ettől válik igazán csodálatossá, kellemesen illatos, telt virágok borítják. Bokros, középerős fejlődésű, teljes magasságában 150 cm magas, betegségekre nem fogékony, téli fagyokat jól toleráló, kiváló házikerti fajta.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Metszése: 
                        - február vége és április között (tavaszi metszés)
                        - a beteg, sérült ágakat és vesszőket minden esetben távolítsuk el
                        - az elöregedett részeket tőből vágjuk ki
                        - a hosszúra nyúlt hajtásokat 6-8 szem fölött, a gyengébb, rövid vesszőket tőből, a rövidebb hajtásokat 2-3 szemre vágjuk vissza
                        - az elnyílt virágokat rendszeresen metsszük le, így hamarabb képződik új virág (nyári metszés).</p>      
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='doubledelight'>Double Delight</h2>
                    <hr>
                    <img src='img/rozsak/double.jpg' alt='Double Delight rózsa'>
                    <h3>Leírás:</h3>
                    <p>Krémszínű, piros szegővel, telt virágú, erősen illatos, szálas virágú.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Metszése:
                        - február vége és április között (tavaszi metszés)
                        - a beteg, sérült ágakat és vesszőket minden esetben távolítsuk el
                        - az elöregedett részeket tőből vágjuk ki
                        - a hosszúra nyúlt hajtásokat 6-8 szem fölött, a gyengébb, rövid vesszőket tőből, a rövidebb hajtásokat 2-3 szemre vágjuk vissza
                        - az elnyílt virágokat rendszeresen metsszük le, így hamarabb képződik új virág (nyári metszés)</p>      
                </div>
            
                <div class='kisdoboz'>
                    <h2 id='kronenbourg'>Kronenbourg</h2>
                    <hr>
                    <img src='img/rozsak/kronenbourg.jpg' alt='Kronenbourg rózsa'>
                    <h3>Leírás:</h3>
                    <p>Vörös aranysárga fonákkal, illatos, teltvirágú. Bokros, magas, erős növekedésű, fagytűrő, hosszú szárán hozza nagy virágát, kitűnő vágott virág, ismétlődő virágzás.</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>Metszés: - február vége és április között (tavaszi metszés)
                        - a beteg, sérült ágakat és vesszőket minden esetben távolítsuk el
                        - az elöregedett részeket tőből vágjuk ki
                        - a hosszúra nyúlt hajtásokat 6-8 szem fölött, a gyengébb, rövid vesszőket tőből, a rövidebb hajtásokat 2-3 szemre vágjuk vissza
                        - az elnyílt virágokat rendszeresen metsszük le, így hamarabb képződik új virág (nyári metszés)</p>      
                </div>";

        try {
            $con = mysqli_connect('localhost', 'root', '', 'login&register');
        } catch(mysqli_sql_exception) {
            echo "Hiba történt az adatbázishoz való csatlakozás során...";
        }
        $sql = 'SELECT fajta, rozsa_id,url, alt, leiras, gondozas FROM ismerteto';
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
                <div class='kisdoboz'>
                    <h2 id='$row[rozsa_id]'>$row[fajta]</h2>
                    <hr>
                    <img src='$row[url]' alt='$row[alt]'>
                    <h3>Leírás:</h3>
                    <p>$row[leiras]</p>
                    <h3>Gondozási tudnivalók:</h3>
                    <p>$row[gondozas]</p>      
                </div>";
        }
        mysqli_free_result($result);
        mysqli_close($con);


        echo "   
            </main>
            <footer>   
            </footer>";
    }
?>
</body>
</html>