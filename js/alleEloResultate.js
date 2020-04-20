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

    console.log(xhr.responseText);
    if (xhr.readyState == done && xhr.status == ok){
        let data = JSON.parse(this.responseText);

        if (data.length == 0){
            let el = document.getElementById("alert");
            el.setAttribute("style", "display: block")
        }

        let datax = [];
        let datay = [];
        let i = 0;

        for (let d in data) {
            let temp = data[i];

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

        chartjs(chartData);
    }else{
        console.log('Error: Status ' + xhr.status);
        console.log('Error: readyState ' + xhr.readyState);
    }
}

function chartjs(dataxy) {

    var ctx = document.getElementById('myChart').getContext('2d');

    let length = dataxy['x'].length;
    var allX = []
    var allY = []

    for(let i = 0; i < length; i++){

        allX.push(dataxy['x'][i]);
        allY.push(dataxy['y'][i]);

    }

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: allX,
            datasets: [{
                label: 'Elo Punkte',
                data: allY,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
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
                        beginAtZero: true
                        //beginAtZero: false
                    }
                }]
            }
        }
    });
}

