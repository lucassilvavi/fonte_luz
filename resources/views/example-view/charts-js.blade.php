@extends('layouts.principal')

@section('title','Exemplo de Gráficos')
@section('title-form','Gráficos')


@section('breadcrumb')
    <li><a href="index.html">Home</a></li>
    <li><a>Forms</a></li>
    <li class="active"><strong>Gráficos</strong></li>
@endsection



@section('content')
    <div class="row">
        <div class="col-md-3">
            <canvas id="chart-line"></canvas>
        </div>

        <div class="col-md-3">
            <canvas id="chart-bar"></canvas>
        </div>

        <div class="col-md-3">
            <canvas id="chart-bubble"></canvas>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div>
        <div class="col-md-3">
            <canvas id="chart-radar"></canvas>
        </div>

        <div class="col-md-3">
            <canvas id="chart-polar"></canvas>
        </div>

        <div class="col-md-3">
            <canvas id="chart-pie"></canvas>
        </div>

        <div class="col-md-3">
            <canvas id="chart-doughnut"></canvas>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-3">
            <canvas id="chart-axis" width="200" height="200"></canvas>
        </div>
    </div>





@endsection



@section('scripts')
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.js')}}"></script>

    <script>
        var myLineChart = new Chart(document.getElementById("chart-line"), {
            type: 'line',
            data: {
                labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho"],
                datasets: [
                    {
                        label: "1º Dataset",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(75,192,192,0.4)",
                        borderColor: "rgba(75,192,192,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [65, 59, 80, 81, 56, 55, 40],
                        spanGaps: false,
                    },{
                        label: "2º Dataset",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(255,99,132,0.4)",
                        borderColor: "rgba(255,99,132,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(255,99,132,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(255,99,132,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [45, 99, 60, 71, 36, 45, 10],
                        spanGaps: false,
                    }
                ]
            }
        });
    </script>

    <script>
        var myChart = new Chart(document.getElementById("chart-bar"), {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
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
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        var myRadarChart = new Chart(document.getElementById("chart-radar"), {
            type: 'radar',
            data: {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                datasets: [
                    {
                        label: "My First dataset",
                        backgroundColor: "rgba(179,181,198,0.2)",
                        borderColor: "rgba(179,181,198,1)",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(179,181,198,1)",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        backgroundColor: "rgba(255,99,132,0.2)",
                        borderColor: "rgba(255,99,132,1)",
                        pointBackgroundColor: "rgba(255,99,132,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(255,99,132,1)",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]
            }
        });
    </script>

    <script>
        new Chart(document.getElementById("chart-polar"), {
            type: 'polarArea',
            data: {
                datasets: [{
                    data: [
                        11,
                        16,
                        7,
                        3,
                        14
                    ],
                    backgroundColor: [
                        "#FF6384",
                        "#4BC0C0",
                        "#FFCE56",
                        "#E7E9ED",
                        "#36A2EB"
                    ],
                    label: 'My dataset' // for legend
                }],
                labels: [
                    "Red",
                    "Green",
                    "Yellow",
                    "Grey",
                    "Blue"
                ]
            }
        });
    </script>

    <script>

        var data = {
            labels: [
                "Red",
                "Blue",
                "Yellow"
            ],
            datasets: [
                {
                    data: [300, 50, 100],
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ],
                    hoverBackgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ]
                }]
        };

        var myPieChart = new Chart(document.getElementById("chart-pie"),{
            type: 'pie',
            data: data
        });

        var myDoughnutChart = new Chart(document.getElementById("chart-doughnut"), {
            type: 'doughnut',
            data: data
        });
    </script>

    <script>
        var myBubbleChart = new Chart(document.getElementById("chart-bubble"),{
            type: 'bubble',
            data: {
                datasets: [
                    {
                        label: 'First Dataset',
                        data: [
                            {
                                x: 20,
                                y: 30,
                                r: 15
                            },
                            {
                                x: 10,
                                y: 50,
                                r: 10
                            },
                            {
                                x: 30,
                                y: 80,
                                r: 30
                            },
                            {
                                x: 14,
                                y: 7,
                                r: 40
                            }
                        ],
                        backgroundColor:"#FF6384",
                        hoverBackgroundColor: "#FF6384",
                    }]
            },
            options: {
                elements: {
                    points: {
                        borderWidth: 1,
                        borderColor: 'rgb(0, 0, 0)'
                    }
                }
            }
        });
    </script>

    <script>

        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(231,233,237)'
        };

        window.randomScalingFactor = function() {
            return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
        }

        var color = Chart.helpers.color;
        var scatterChartData = {
            datasets: [{
                borderColor: window.chartColors.red,
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                label: "V(node2)",
                data: [{
                    x: 1,
                    y: -1.711e-2,
                }, {
                    x: 1.26,
                    y: -2.708e-2,
                }, {
                    x: 1.58,
                    y: -4.285e-2,
                }, {
                    x: 2.0,
                    y: -6.772e-2,
                }, {
                    x: 2.51,
                    y: -1.068e-1,
                }, {
                    x: 3.16,
                    y: -1.681e-1,
                }, {
                    x: 3.98,
                    y: -2.635e-1,
                }, {
                    x: 5.01,
                    y: -4.106e-1,
                }, {
                    x: 6.31,
                    y: -6.339e-1,
                }, {
                    x: 7.94,
                    y: -9.659e-1,
                }, {
                    x: 10.00,
                    y: -1.445,
                }, {
                    x: 12.6,
                    y: -2.110,
                }, {
                    x: 15.8,
                    y: -2.992,
                }, {
                    x: 20.0,
                    y: -4.102,
                }, {
                    x: 25.1,
                    y: -5.429,
                }, {
                    x: 31.6,
                    y: -6.944,
                }, {
                    x: 39.8,
                    y: -8.607,
                }, {
                    x: 50.1,
                    y: -1.038e1,
                }, {
                    x: 63.1,
                    y: -1.223e1,
                }, {
                    x: 79.4,
                    y: -1.413e1,
                }, {
                    x: 100.00,
                    y: -1.607e1,
                }, {
                    x: 126,
                    y: -1.803e1,
                }, {
                    x: 158,
                    y: -2e1,
                }, {
                    x: 200,
                    y: -2.199e1,
                }, {
                    x: 251,
                    y: -2.398e1,
                }, {
                    x: 316,
                    y: -2.597e1,
                }, {
                    x: 398,
                    y: -2.797e1,
                }, {
                    x: 501,
                    y: -2.996e1,
                }, {
                    x: 631,
                    y: -3.196e1,
                }, {
                    x: 794,
                    y: -3.396e1,
                }, {
                    x: 1000,
                    y: -3.596e1,
                },]
            }]
        };


        var ctx = document.getElementById("chart-axis").getContext("2d");
        window.myScatter = Chart.Scatter(ctx, {
            data: scatterChartData,
            options: {
                title: {
                    display: true,
                    text: 'Chart.js Scatter Chart - Logarithmic X-Axis'
                },
                scales: {
                    xAxes: [{
                        type: 'logarithmic',
                        position: 'bottom',
                        ticks: {
                            userCallback: function(tick) {
                                var remain = tick / (Math.pow(10, Math.floor(Chart.helpers.log10(tick))));
                                if (remain === 1 || remain === 2 || remain === 5) {
                                    return tick.toString() + "Hz";
                                }
                                return '';
                            },
                        },
                        scaleLabel: {
                            labelString: 'Frequency',
                            display: true,
                        }
                    }],
                    yAxes: [{
                        type: 'linear',
                        ticks: {
                            userCallback: function(tick) {
                                return tick.toString() + "dB";
                            }
                        },
                        scaleLabel: {
                            labelString: 'Voltage',
                            display: true
                        }
                    }]
                }
            }
        });


    </script>

@endsection