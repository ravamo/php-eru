$(document).ready(function() {
    //Initialize Select2 Elements
    $('#territorial-selection').select2();
    $('#territorial-selection').on('change', function (e) {
        updateTerritorialCharts();
    });

    // GÉNERO
    var totalGenderDonut = new Morris.Donut({
        element: 'gender-chart',
        resize: true,
        colors: ["#3c8dbc", "#f56954"],
        data: [
            {label: "Hombres", value: 52},
            {label: "Mujeres", value: 30}
        ],
        hideHover: 'auto'
    });

    var ctx = $("#erus-person");
    var data = {
        datasets: [{
            data: [10, 20, 30],
            backgroundColor: [
                '#ff0000',
                '#00ff00',
                '#0000ff',
            ]
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            '5 ERUs',
            '4 ERUs',
            '2 ERUs'
        ]
    };

    var erusPersonChart = new Chart(ctx, {
        type: 'doughnut',
        data: data
    });

    var ctx2 = $("#people-eru-gender");
    var data2 = {
        labels  : ['UCBS', 'SANMAS', 'PSS', 'TELECOM', 'LOG', 'RELIEF', 'M15'],
        datasets: [
            {
                label               : 'Hombres',
                backgroundColor     : 'rgb(245, 105, 84)',
                data                : [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label               : 'Mujeres',
                backgroundColor     : 'rgb(60, 141, 188)',
                data                : [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };

    var peopleEruGenderChart = new Chart(ctx2, {
        type: 'bar',
        data: data2,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    updateTerritorialCharts();

    function updateTerritorialCharts() {
        console.log('updateTerritorialCharts');
        var territorialId = $('#territorial-selection').val();

        updateTerritorialTotalGenderDonut(territorialId);
        updateTerritorialGenderByEruBar(territorialId);
    }

    function updateTerritorialTotalGenderDonut(territorialId) {
        console.log('updateTerritorialTotalGenderDonut');

        var territorialTotalGenderWs = '/territorial-total-gender';
        var elementSelector = '#total-gender-donut';
        var data = {
            id: territorialId
        };

        xhr_get(territorialTotalGenderWs, 'json', data, elementSelector).done(function(data) {
            console.log('succes getting territorialTotalGender data');

            totalGenderDonut.setData(data);
            hideLoadingImg(elementSelector);
        });
    }

    function updateTerritorialGenderByEruBar(territorialId) {
        console.log('updateTerritorialGenderByEruBar');

        var territorialGenderByEruWs = '/territorial-eru-gender';
        var elementSelector = '#eru-gender-bar';
        var data = {
            id: territorialId
        };

        xhr_get(territorialGenderByEruWs, 'json', data, elementSelector).done(function(data) {
            console.log('succes getting updateTerritorialGenderByEruBar data');

            peopleEruGenderChart.config.data = data;
            peopleEruGenderChart.update();

            hideLoadingImg(elementSelector);
        });
    }
});