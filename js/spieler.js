
var url = window.location.href;
var licenceNr = getURLParameter(url);

var playerInforamtions = '';
var isPlayerDataEmpty = 0;

var get_player_informations;
var get_player_elos;
var get_player_piste;

// 0, 1 und 2 = good, 3 = keine Daten
var statusOfData = 1;

ajax('GET', 'https://batikego.myhostpoint.ch/ajax/get_player_informations.php?licence=' + licenceNr, true);
ajax('GET', 'https://batikego.myhostpoint.ch/ajax/get_player_elos.php?licence=' + licenceNr, true);
ajax('GET', 'https://batikego.myhostpoint.ch/ajax/get_player_piste.php?licence=' + licenceNr, true);


function ajax(method, url, async){

    let xhr = new XMLHttpRequest();

    xhr.open(method, url, async);
    xhr.send(null);

    xhr.onload = function () {
        var done = 4;
        var ok = 200;
        if (xhr.readyState == done && xhr.status == ok){

            let playerdata = JSON.parse(this.responseText);

            get_player_informations = playerdata['get_player_informations'];

            alertNoPlayer(playerdata);

        }else{
            console.log('Error: Status ' + xhr.status);
            console.log('Error: readyState ' + xhr.readyState);
        }
    };
}

function getData(method, url, async) {
    return new Promise((resolve, reject) => {
        const req = new XMLHttpRequest();
        req.open(method, url, async);
        req.onload = () => req.status === 200 ? resolve(req.response) : reject(Error(req.statusText));
        req.onerror = (e) => reject(Error(`Network Error: ${e}`));
        req.send();
    });
}

function valuReturn(param) {
    this.playerInforamtions = param;
    return this.playerInforamtions;
}

function alertNoPlayer(data) {

    try{

        if(data['get_player_informations'].length == 1){
            console.log("if")

        }else{
            consol.log("else");
            statusOfData += 1;
        }
        console.log("try");


        if(statusOfData == 3){
            console.log("abbruch");
            console.log(statusOfData);
        }

        console.log(statusOfData);

    }catch (e) {
        console.log(e)
    }
}

function alertNoPlayer2(data) {

    try{
        let licenceNr = data[0]['licenceNr'] * 1;
        let lastname = data[0]['lastname'];

        let alert = document.getElementById("no-player");
        alert.setAttribute("style", "display: none;")

    }catch (e) {
        let playerInformations = document.getElementById("player-informations");
        playerInformations.setAttribute("style", "display: none;");
        console.log(e)
    }
}

function createHTMLInformation(id, data){

    data = data[0];

    console.log(data);

    let doc = document.getElementById("club");
    let club = document.createElement("td");

    club.innerText = data['clubname'];

    doc.appendChild(club);}

function getURLParameter(url) {

    let parameter = url.split('=');

    parameter = parameter[1];

    return parameter;

}
