var licenceNr = window.location.href.split("=");
licenceNr = licenceNr[1];
var url = "https://batikego.myhostpoint.ch/api/get_player_elos_details.php?licence=" + licenceNr;
var method = 'GET';
var async = true;

var xhr = new XMLHttpRequest();
xhr.open('GET', url, async);
xhr.send(null);

xhr.onload = function () {
    var done = 4;
    var ok = 200;

    if (xhr.readyState == done && xhr.status == ok){
        let data = JSON.parse(this.responseText);

        if (data.length == 0){
            let el = document.getElementById("alert");
            el.setAttribute("style", "display: block");
            let chart = document.getElementById("myChart");
            chart.setAttribute("style", "display: none");
        }

        let playersFirstname;

        let datax = [];
        let datay = [];
        let i = 0;

        for (let d in data) {
            let temp = data[i];

            playersFirstname = temp['firstname'] + " " + temp['lastname'];

            let month = temp['month'];
            let year = temp['year'];

            let elo = temp['elo'];
            let x = month + " " + year;

            i++;

            datax.push(x);
            datay.push(elo);
        }

        let chartData = [];
        chartData['x'] = datax;
        chartData['y'] = datay;

        chartjs(chartData, playersFirstname);
    }else{
        console.log('Error: Status ' + xhr.status);
        console.log('Error: readyState ' + xhr.readyState);
    }
}

function chartjs(dataxy, playername) {

    var ctx = document.getElementById('myChart').getContext('2d');

    let length = dataxy['x'].length;
    var allX = []
    var allY = []

    var max = 0;
    var min = 20000;

    for(let i = 0; i < length; i++){

        allX.push(dataxy['x'][i]);
        allY.push(dataxy['y'][i]);

        if(max < dataxy['y'][i]){
            max = dataxy['y'][i];
        }

        if(min > dataxy['y'][i]){
            min = parseInt(dataxy['y'][i]) - 100;
        }
    }

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: allX,
            datasets: [{
                label: 'Elo Punkte',
                data: allY,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.0)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMin: min,
                        suggestedMax: max,
                        //beginAtZero: true
                        //beginAtZero: false
                    }
                }]
            },
            title: {
                display: true,
                text: 'Eloverlauf von ' + playername
            },
        },
        responsive: true,
    });
}

