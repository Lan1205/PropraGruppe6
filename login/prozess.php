<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="prozess.css">
    <script type="text/javascript" src="prozess.js"></script>
    <title>Reifenmanagement</title>
</head>

<body>

    <!--Menu Bar-->
    <nav id="menu">
        <ul>
            <li><a href="prozess.html">Prozess</a></li>
            <li><a href="wetter.html">Wetter</a></li>
            <li><a href="history.html">History</a></li>
            <button id="button"><a href="login.php">Log out</a></button>
        </ul>
    </nav>

    <!--Input Form Bestellung-->
    <div class="inline">
        <form action="" id="form">
            <div class="block">
                <label for="bestellung">Neue Reifenset bestellen</label>
                <select name="bestellung" id="bestellung" onchange="extraVariante()">
                    <optgroup label="Slicks">
                        <option value="1">Cold(H/E)</option>
                        <option value="2">Medium(G/D)</option>
                        <option value="3">Hot(I/F)</option>
                    </optgroup>
                    <optgroup label="Inters">
                        <option value="4">Intermediate(H+/E+)</option>
                    </optgroup>
                    <optgroup label="Rain">
                        <option value="5">Dry wet(T/T)</option>
                        <option value="7">Heavy wet(A/A)</option>
                    </optgroup>
                </select><br><br>
                <div id="extra">
                    <label for="vorderachse">Vorderachse</label>
                    <select name="vorder" id="vorder">
                        <option value="eg">Extra grooved</option>
                        <option value="si">Sipped</option>
                        <option value="egsi">Extra grooved and sipped</option>
                    </select><br><br>
                    <label for="hinterachse">Hinterachse</label>&nbsp;
                    <select name="hinter" id="hinter">
                        <option value="eg">Extra grooved</option>
                        <option value="si">Sipped</option>
                        <option value="egsi">Extra grooved and sipped</option>
                    </select>
                </div><br>
                <label for="zeit">Zeit</label>
                <input type="text" id="zeit" name="zeit">
                <label for="">Minuten</label>
                <button type="button" onclick="addReifenSet()" id="bestellen">Jetzt bestellen</button>
            </div>

            <!--Input Form Reifendruck-->
            <div class="inline">
                <p class="paragraph">Reifendruck messen</p><br>
                <label for="fl1">Front left</label> &nbsp;
                <input type="text" name="fl1" id="fl1"><br>
                <label for="fr1">Front right</label>
                <input type="text" name="fr1" id="fr1"><br>
                <label for="bl1">Back left</label> &nbsp;
                <input type="text" name="bl1" id="bl1"><br>
                <label for="br1">Back right</label>
                <input type="text" name="br1" id="br1">
            </div>

            <div class="inline" style="float:right">
                <p class="paragraph">Reifendruck angepasst</p><br>
                <label for="fl2">Front left</label>&ensp;
                <input type="text" name="fl2" id="fl2"><br>
                <label for="fr2">Front right</label>
                <input type="text" name="fr2" id="fr2"><br>
                <label for="bl2">Back left</label>&ensp;
                <input type="text" name="bl2" id="bl2"><br>
                <label for="br2">Back right</label>
                <input type="text" name="br2" id="br2"><br><br>
                <button id="inHeizdecke">Weiter in Heizdecke</button>

            </div>

            <div class="block">
                <label for="formel">Formel</label>
                <input type="text" id="formel" name="formel">
            </div>

            <!--Input Form Heizdecke-->
            <div class="inline">
                <p class="paragraph">In Heizdecke</p><br>
                <label for="">Temperatur: </label>
                <input type="radio" id="grad40" name="temperatur" value="grad40">
                  <label for="grad40">40 Grad</label>
                  <input type="radio" id="grad90" name="temperatur" value="grad90">
                  <label for="grad90">90 Grad</label><br><br>
                <button id="montage">Weiter zur Montage</button>
            </div>
            <!--Input Form Motage-->
            <div class="inline">
                <p class="paragraph">Montieren</p><br>
                <button id="fertig">Fertig</button>
            </div>

        </form>
    </div>


    <!--Bestellte und gearbeitete Reifensets sind hier gezeigt-->
    <div id="progress">
    </div>

</body>

</html>