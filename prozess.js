
//Display für Abfrage von Bearbeitungsvarianten
function extraVariante() {
    let reifen = document.getElementById("bestellung").value;
    if (reifen == 1) {
        document.getElementById("extra").innerHTML =  `
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
        `;
    } else if (reifen == 2 || reifen == 3 || reifen == 4 || reifen == 5) {
        document.getElementById("extra").innerHTML = "";
    } else if (reifen == 7) {
        document.getElementById("extra").innerHTML = `
        <label for="vorderachse">Vorderachse</label>
        <select name="vorder" id="vorder">
            <option value="eg">Extra grooved</option>
        </select><br><br>
        <label for="hinterachse">Hinterachse</label>&nbsp;
        <select name="hinter" id="hinter">
            <option value="eg">Extra grooved</option>
        </select>
        `;
    }
}


//Bestellte und bearbeitete Reifensets auf Bildschirm bestätigen und zeigen
var zahl = 1;
function addReifenSet() {
    let zeit = document.getElementById("zeit").value;
    let regex = /[0-9]+$/;
    if (regex.test(zeit)==false) {
        alert("Eingabe der Zeit ungültig");
    }   

    let reifen = "";
    
    switch (document.getElementById("bestellung").value) {
        case "1": let vorder = document.getElementById("vorder").value;
                let hinter = document.getElementById("hinter").value;
                if (vorder=="eg" && hinter == "eg") {reifen = "1" + zahl + "-/-";}
                else if (vorder=="eg" && hinter == "si") { reifen = "1" + zahl + "-/|";}
                else if (vorder=="eg" && hinter == "egsi") {reifen = "1" + zahl + "-/+";}
                else if (vorder=="si" && hinter == "eg") {reifen = "1" + zahl +"|/-";}
                else if (vorder=="si" && hinter == "si") {reifen = "1" + zahl +"|/|";}
                else if (vorder=="si" && hinter == "egsi") {reifen= "1" + zahl +"|/+";}
                else if (vorder=="egsi" && hinter == "eg") {reifen = "1" + zahl + "+/-";}
                else if (vorder=="egsi" && hinter == "si") {reifen = "1" + zahl +"+/|";}
                else if (vorder=="egsi" && hinter == "egsi") {reifen = "1" + zahl + "+/+";}
                break;
        case "2": reifen = "2" + zahl;
                break;
        case "3": reifen = "3" + zahl;
                break;
        case "4": reifen= "4" + zahl;
                break;
        case "5": reifen = "5" + zahl;
                break;
        case "7": reifen = "7" + zahl+ "-/-";
                break;
        default: reifen="";
        break;
    }
    if (zahl < 10) {
        reifen = [reifen.slice(0,1),"0",reifen.slice(1)].join("");
    }
    
    let template = `
    <section id="section">
    <p style="margin:5px;font-weight:bold">Reifenset: ${reifen}</p>
    <section id="smallSection">
        <nav class="item" id="bestellung">
            <div style="padding:3px">
            <p>Bestellung</p><br>
            <p>Time left: </p>
            <p>${zeit} minutes</p>
            </div>
        </nav>
        <nav class="item" id="reifendruck">
            <div style="padding: 3px">
            <p>Reifendruck</p>
            <table>
                <tr>
                    <td></td>
                    <td></td>   
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            </div>
        </nav>
        <nav class="item" id="heizdecke">
            <div style="padding:3px">
                <p>In Heizdecke</p>
            </div>
        </nav>
        <nav class="item" id="montage">
            <div style="padding:3px">
                <p>Montieren</p>
            </div>
        </nav>
        <nav class="item" id="fertig">
            <div style="padding:3px">
                <p>Fertig</p>
            </div>
        </nav>
    </section>
</section>
    `;
    document.getElementById("progress").innerHTML += template;
    zahl = zahl+1;
}