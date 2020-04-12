
var xhr = new XMLHttpRequest();
xhr.open('GET', 'https://batikego.myhostpoint.ch/ajax/get_all_players.php', true);
xhr.send(null);

xhr.onload = function () {
    var done = 4;
    var ok = 200;
    if (xhr.readyState == done && xhr.status == ok){
        let playerdata = JSON.parse(this.responseText);
        createPlayersOverviewTable(playerdata);
    }else{
        console.log('Error: Status ' + xhr.status);
        console.log('Error: readyState ' + xhr.readyState);
    }
}

function createPlayersOverviewTable(jsonData) {

    let tableBody = document.getElementById("players-data");

    for(let i = 0; i < jsonData.length; i++){

        let tr = document.createElement("tr");

        tr.onclick = function() { selectetPlayer(jsonData[i]['licenceNr']); };

        let licenceNr = document.createElement("td");
        let firstname = document.createElement("td");
        let lastname = document.createElement("td");

        licenceNr.innerText = jsonData[i]['licenceNr'];
        firstname.innerText = jsonData[i]['firstname'];
        lastname.innerText = jsonData[i]['lastname'];

        tr.appendChild(licenceNr);
        tr.appendChild(firstname);
        tr.appendChild(lastname);

        tableBody.appendChild(tr);
    }
}

function selectetPlayer(licenceNr) {
    window.location.href='spieler.php?licence=' + licenceNr + '';
}

