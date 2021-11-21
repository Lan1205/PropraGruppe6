
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
    let regex = /[a-z]/;
    if (regex.test(zeit)) {
        alert("Eingabe der Zeit ungültig");
        return;
    }  
    var reifen = "";
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
        <nav class="item" id="bestellungOutput">
            <div style="padding:3px">
            <p>Bestellung</p><br>
            <p>Time left: </p>
            <p id="countdown"></p>
            </div>
        </nav>
        <nav class="item" id="reifendruckOutput">
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
        <nav class="item" id="heizdeckeOutput">
            <div style="padding:3px">
                <p>In Heizdecke</p>
            </div>
        </nav>
        <nav class="item" id="montageOutput">
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

function timer() {
    document.getElementById("bestellen").setAttribute("disabled","disabled");
    let seconds = document.getElementById("zeit").value;

    displayTime(seconds);

    const count = setInterval (() => {
        seconds--;
        displayTime(seconds);
        if(seconds <= 0 || seconds < 1) {
            clearInterval(count);
            endTime();
            
        }
    },1000);
}

function displayTime(second) {
    let timeOutput = document.getElementById("countdown");
    let min=Math.floor(second/60);
    let sec=Math.floor(second%60);

    timeOutput.innerHTML=`${min<10 ? "0" : ""}${min}:${sec<10 ? "0" : ""}${sec}`;

}

function endTime() {
    let timeOutput = document.getElementById("countdown");
    timeOutput.innerHTML="00:00";
    document.getElementById("bestellungOutput").style.backgroundColor = "rgb(111, 189, 111)";
    document.getElementById("bestellen").removeAttribute("disabled");

}
