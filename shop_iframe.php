<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="iframe">
        <h2>Shop</h2>
    </header>

    <main id="shop_main">
        <div class="sidebar">
            <input type="checkbox" name="checkbox" id="szal" checked = "checked"> Rózsaszál, csokor <br>
            <input type="checkbox" name="checkbox" id="to" checked = "checked"> Rózsatő
            <div class="egyedi">
                <form >
                    <h1>Egyedi megrendelés:</h1>
                    <select name="egyedi">
                        <option value="egyedi_csokor">Egyedi csokor</option>
                        <option value="sajat_fajta">Egyedi fajta</option>
                        <option value="ami_nincs">Olyan fajta, ami a shop-ban nincs</option>
                        <option value="egyeb"> egyéb</option>
                    </select>
                    <textarea name="reszletez" id="reszlet" cols="25" rows="5">Kérlek részletezd megrendelésed...</textarea>
                    <button>Küldés</button>
                </form>
    
            </div>
        </div>

        <div class="shop_table">
            <table>
                <tr>
                    <td>
                        <div class="container">
                            <img src="img/rozsak/bianca.jpg" alt="Bianca rózsa">
                            <div class="overlay">
                                <h3>Bianca</h3>
                                <button>Kosárba</button>
                            </div>
                        </div>
                    </td>
                    
                    <td>
                        <div class="container">
                            <img src="img/rozsak/sissi.jpg" alt="Sissi rózsa">
                            <div class="overlay">
                                <h3>Sissi</h3>
                                <button>Kosárba</button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="container">
                        <img src="img/rozsak/casanova.png" alt="Casanova rózsa">
                        <div class="overlay">
                            <h3>Casanova</h3>
                            <button>Kosárba</button>
                        </div>
                    </div>
                    </td>
                   
                </tr>
                <tr>
                    <td>
                        <div class="container">
                        <img src="img/rozsak/elisabeth.jpg" alt="Elisabeth rózsa">
                        <div class="overlay">
                            <h3>Elisabeth</h3>
                            <button>Kosárba</button>
                        </div>
                    </div>
                    </td>
                    
                    <td>                       
                        <div class="container">

                        <img src="img/rozsak/double.jpg" alt="Double rózsa">
                        <div class="overlay">
                            <h3>Double</h3>
                            <button>Kosárba</button>
                        </div>
                    </div>
                    </td>
                    <td>
                        <div class="container">
                        <img src="img/rozsak/mrlincoln.jpeg" alt="Mr.Lincoln rózsa">
                        <div class="overlay">
                            <h3>Mr.Lincoln</h3>
                            <button>Kosárba</button>
                        </div>
                    </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="container">
                        <img src="img/rozsak/kronenbourg.jpg" alt="kronenbourg rózsa">
                        <div class="overlay">
                            <h3>Kronenbourg</h3>
                            <button>Kosárba</button>
                        </div>
                    </div>
                    </td>
                    
                    <td>
                        <div class="container">
                        <img src="img/rozsak/gaumo.jpg" alt="Gaumo rózsa">
                        <div class="overlay">
                            <h3>Gaumó</h3>
                            <button>Kosárba</button>
                        </div>
                    </div>
                    </td>
                    <td>
                    </td>
                </tr>
                

            </table>


        </div>
    </main>


    <footer></footer>
</body>
</html>