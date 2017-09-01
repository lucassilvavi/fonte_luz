@extends('layouts.principal')

@section('title','Exemplo de Gráficos')
@section('title-form','Gráficos')


@section('breadcrumb')
    <li><a href="index.html">Home</a></li>
    <li><a>Forms</a></li>
    <li class="active"><strong>Gráficos</strong></li>
@endsection

@section('content')
    <!-- Google Charts API web components -->
    <link rel="import" href="assets/vendor/google-chart/google-chart.html">

    <div class="row">
        <div class="col-md-4">
            <google-chart
                    cols='[{"label": "Data", "type": "string"},{"label": "Value", "type": "number"}]'
                    rows='[["Something", 1]]'>
            </google-chart>
        </div>
        <div class="col-md-8">
            <style>
                /* Phone and tablet */
                #resizing-chart {
                    height: 300px;
                    width: 400px;
                }

                /* Desktop */
                @media screen and (min-width: 1024px) {
                    #resizing-chart {
                        width: 800px;
                    }
                }
            </style>

            <google-chart
                    id="resizing-chart"
                    type="column"
                    options='{"title": "Responsive chart",
              "vAxis": {"minValue" : 0, "maxValue": 10}}'
                    cols='[{"label": "Data", "type": "string"},{"label": "Value", "type": "number"}]'
                    rows='[ ["Col1", 5.0],["Col2", 5.0],["Col3", 5.0] ]'>
            </google-chart>

            <script>
                var media = window.matchMedia('(min-width: 1024px)');
                media.addListener(function () {
                    document.getElementById('resizing-chart').redraw();
                });
            </script>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <google-chart
                    id="mutating-chart"
                    type="column"
                    options='{"title": "Random data",
              "vAxis": {"minValue" : 0, "maxValue": 10},
              "animation": {"duration": "1000"}}'
                    cols='[{"label": "Data", "type": "string"},{"label": "Value", "type": "number"}]'
                    rows='[ ["Col1", 5.0],["Col2", 5.0],["Col3", 5.0] ]'>
            </google-chart>

            <script>
                (function () {
                    function getRandomValue() {
                        return Math.random() * 10;
                    }

                    var chart = document.getElementById('mutating-chart');
                    window.setInterval(function () {
                        chart.rows = [["Col1", getRandomValue()],
                            ["Col2", getRandomValue()],
                            ["Col3", getRandomValue()]];
                    }, 3000);
                }());
            </script>
        </div>
        <div class="col-md-4">
            <style>
                #selection-demo {
                    position: relative;
                    height: 300px;
                }

                #selection-chart {
                    float: left;
                }

                #selection-display {
                    display: inline-block;
                    position: relative;
                    top: 50%;
                }
            </style>
            <div id="selection-demo">
                <google-chart
                        id="selection-chart"
                        type="pie"
                        options='{"title": "Distribution of days in 2001H1"}'
                        cols='[{"label": "Month", "type": "string"},{"label": "Days", "type": "number"}]'
                        rows='[ ["Jan", 31],["Feb", 28],["Mar", 31],["Apr", 30],["May", 31],["Jun", 30] ]'
                        selection='[{"row": 1}]'>
                </google-chart>
                <div id="selection-display">
                    Selected row: <span id="selection-label">None</span>.
                </div>
            </div>

            <script>
                (function () {
                    var chart = document.getElementById('selection-chart');
                    var label = document.getElementById('selection-label');
                    label.textContent = chart.selection[0].row;
                    chart.addEventListener('google-chart-select', function (e) {
                        var newSelection = e.detail.chart.getSelection()[0];  // From the event details
                        label.textContent = newSelection ? newSelection.row : 'None';
                    });
                    chart.addEventListener('selection-changed', function (e) {
                        var newSelection = e.detail.value[0];  // From the event details
                        label.textContent = newSelection ? newSelection.row : 'None';
                    });
                }());
            </script>
        </div>
        <div class="col-md-4">
            <style>
                #mouseover-demo {
                    position: relative;
                    height: 300px;
                }

                #mouseover-chart {
                    float: left;
                }

                #mouseover-display {
                    display: inline-block;
                    position: relative;
                    top: 50%;
                }
            </style>
            <div id="mouseover-demo">
                <google-chart
                        id="mouseover-chart"
                        type="pie"
                        options='{"title": "Distribution of days in 2001H1"}'
                        cols='[{"label": "Month", "type": "string"},{"label": "Days", "type": "number"}]'
                        rows='[ ["Jan", 31],["Feb", 28],["Mar", 31],["Apr", 30],["May", 31],["Jun", 30] ]'
                        events='["onmouseover"]'>
                </google-chart>
                <div id="mouseover-display">
                    Moused over row: <span id="mouseover-label">None</span>.
                </div>
            </div>

            <script>
                (function () {
                    var chart = document.getElementById('mouseover-chart');
                    var label = document.getElementById('mouseover-label');
                    chart.addEventListener('google-chart-onmouseover', function (e) {
                        label.textContent = e.detail.data.row;
                    });
                }());
            </script>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <google-chart
                    type="column"
                    options='{"title": "Inventory"}'
                    data='[["Year", "Things", "Stuff"],
           ["2004", 1000, 400],
           ["2005", 1170, 460],
           ["2006", 660, 1120],
           ["2007", 1030, 540]]'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    type="area"
                    options='{"title": "Days in a month"}'
                    cols='[{"label": "Month", "type": "string"},{"label": "Days", "type": "number"}]'
                    rows='[["Jan", 31],["Feb", 28],["Mar", 31],["Apr", 30],["May", 31],["Jun", 30]]'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    type="md-bar"
                    options='{"title": "Days in a month"}'
                    cols='[{"label": "Month", "type": "string"},{"label": "Days", "type": "number"}]'
                    rows='[["Jan", 31],["Feb", 28],["Mar", 31],["Apr", 30],["May", 31],["Jun", 30]]'></google-chart>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <google-chart
                    type="bubble"
                    data='[["ID", "Life Expectancy", "Fertility Rate", "Region", "Population"],
           ["CAN", 80.66, 1.67, "North America", 33739900],
           ["DEU", 79.84, 1.36, "Europe",        81902307],
           ["DNK", 78.6,  1.84, "Europe",        5523095],
           ["EGY", 72.73, 2.78, "Middle East",   79716203],
           ["GBR", 80.05, 2,    "Europe",        61801570],
           ["IRN", 72.49, 1.7,  "Middle East",   73137148],
           ["IRQ", 68.09, 4.77, "Middle East",   31090763],
           ["ISR", 81.55, 2.96, "Middle East",   7485600],
           ["RUS", 68.6,  1.54, "Europe",        141850000],
           ["USA", 78.09, 2.05, "North America", 307007000]]'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    type="candlestick"
                    options='{"legend": "none"}'
                    data='[["Day", "low", "start", "end", "high"],
           ["Mon", 20, 28, 38, 45],
           ["Tue", 31, 38, 55, 66],
           ["Wed", 50, 55, 77, 80],
           ["Thu", 77, 77, 66, 50],
           ["Fri", 68, 66, 22, 15]]'>
            </google-chart>

        </div>
        <div class="col-md-4">
            <google-chart
                    type="column"
                    options='{"title": "Days in a month"}'
                    cols='[{"label": "Month", "type": "string"},{"label": "Days", "type": "number"}]'
                    rows='[["Jan", 31],["Feb", 28],["Mar", 31],["Apr", 30],["May", 31],["Jun", 30]]'>
            </google-chart>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <google-chart
                    type="combo"
                    options='{"seriesType": "bars", "series": {"2": {"type": "line"}}}'
                    data='[["Day", "A", "B", "C"],
           ["Mon", 20, 45, 28],
           ["Tue", 31, 66, 38],
           ["Wed", 50, 80, 55],
           ["Thu", 77, 50, 77],
           ["Fri", 68, 15, 66]]'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    type="geo"
                    data='[["Country", "Popularity"],
           ["Germany", 200],
           ["United States", 300],
           ["Brazil", 400],
           ["Canada", 500],
           ["France", 600],
           ["RU", 700]]'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    type="histogram"
                    options='{"title": "Days in a month", "legend": "none", "histogram": { "bucketSize": 1 }}'
                    cols='[{"label": "Month", "type": "string"},{"label": "Days", "type": "number"}]'
                    rows='[["Jan", 31],["Feb", 28],["Mar", 31],["Apr", 30],["May", 31],["Jun", 30]]'>
            </google-chart>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <google-chart
                    id="line-chart"
                    type="line"
                    options='{"title": "Days in a month"}'
                    cols='[{"label": "Month", "type": "string"},{"label": "Days", "type": "number"}]'
                    rows='[["Jan", 31],["Feb", 28],["Mar", 31],["Apr", 30],["May", 31],["Jun", 30]]'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    id="line-chart-md"
                    type="md-line"
                    options='{"title": "Days in a month"}'
                    cols='[{"label": "Month", "type": "string"},{"label": "Days", "type": "number"}]'
                    rows='[["Jan", 31],["Feb", 28],["Mar", 31],["Apr", 30],["May", 31],["Jun", 30]]'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    id="org-chart" ,
                    type="org" ,
                    options='{"allowHtml": "true"}'
                    cols='[{"label": "Name", "type": "string"},{"label":"Manager", "type":"string"},{"label":"ToolTip", "type":"string"}]'
                    rows='[[{"v":"Mike", "f":"Mike<div style=\"color:red; font-style:italic\">President</div>"},
            "", "The President"],
            [{"v":"Jim", "f":"Jim<div style=\"color:red; font-style:italic\">Vice President</div>"},
            "Mike", "VP"],
            ["Alice", "Mike", ""],
            ["Bob", "Jim", "Bob Sponge"],
            ["Carol", "Bob", ""]]'>
            </google-chart>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <google-chart
                    type="pie"
                    options='{"title": "Distribution of days in 2001H1"}'
                    cols='[{"label": "Month", "type": "string"},{"label": "Days", "type": "number"}]'
                    rows='[["Jan", 31],["Feb", 28],["Mar", 31],["Apr", 30],["May", 31],["Jun", 30]]'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    type="scatter"
                    options='{"legend": "none"}'
                    data='[["A", "B"],
           [20, 45],
           [31, 66],
           [50, 80],
           [77, 50],
           [68, 15]]'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    type="md-scatter"
                    options='{"legend": "none"}'
                    data='[["A", "B"],
           [20, 45],
           [31, 66],
           [50, 80],
           [77, 50],
           [68, 15]]'>
            </google-chart>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <google-chart
                    type="stepped-area"
                    options='{"title": "Days in a month"}'
                    cols='[{"label": "Month", "type": "string"},{"label": "Days", "type": "number"}]'
                    rows='[["Jan", 31],["Feb", 28],["Mar", 31],["Apr", 30],["May", 31],["Jun", 30]]'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    type="table"
                    options='{"title": "Inventory", "page": "enable", "pageSize": 4}'
                    data='[["Year", "Things", "Stuff"],
           ["2004", 1000, 400],
           ["2005", 1170, 460],
           ["2006", 660, 1120],
           ["2007", 1030, 540],
           ["2008", 1000, 400],
           ["2009", 1170, 460],
           ["2010", 660, 1120],
           ["2011", 1030, 540]]'></google-chart>
        </div>
        <div class="col-md-4">
            <google-chart id="timeline" type="timeline"></google-chart>

            <script>
                (function () {
                    var chart = document.getElementById('timeline');
                    document.createElement('google-chart-loader').dataTable([
                        ['Name', 'Start', 'End'],
                        ['Washington', new Date(1789, 3, 30), new Date(1797, 2, 4)],
                        ['Adams', new Date(1797, 2, 4), new Date(1801, 2, 4)],
                        ['Jefferson', new Date(1801, 2, 4), new Date(1809, 2, 4)]
                    ]).then(function (dataTable) {
                        chart.data = dataTable;
                    });
                }());
            </script>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <google-chart
                    type="gauge"
                    data='[["Label", "Value"],["Memory", 80],["CPU", 55],["Network", 68]]'
                    options='{"width": 400,
                "height": 120,
                "redFrom": 90,
                "redTo": 100,
                "yellowFrom":75,
                "yellowTo": 90,
                "minorTicks": 5}'>
            </google-chart>
        </div>
        <div class="col-md-4">
            <google-chart
                    id="mutating-gauge"
                    type="gauge"
                    data='[["Label", "Value"],["Memory", 80],["CPU", 55],["Network", 68]]'
                    options='{"width": 400,
                "height": 120,
                "redFrom": 90,
                "redTo": 100,
                "yellowFrom": 75,
                "yellowTo": 90,
                "minorTicks": 5}'>
            </google-chart>

            <script>
                (function () {
                    function getRandomGaugeValue(offset, factor) {
                        return offset + Math.round(factor * Math.random());
                    }

                    var gauge = document.getElementById('mutating-gauge');
                    window.setInterval(function () {
                        gauge.data = [
                            ['Label', 'Value'],
                            ['Memory', getRandomGaugeValue(40, 60)],
                            ['CPU', getRandomGaugeValue(40, 60)],
                            ['Network', getRandomGaugeValue(60, 20)]
                        ];
                    }, 3000);
                }());
            </script>
        </div>
        <div class="col-md-4">
            <google-chart
                    type="treemap"
                    options='{"showScale": true, "maxPostDepth": 2}'
                    data='[["Location", "Parent", "Value"],
             ["Global", null, 0],
             ["America", "Global", 0],
             ["Europe", "Global", 0],
             ["Asia", "Global", 0],
             ["Australia", "Global", 0],
             ["Africa", "Global", 0],
             ["Brazil", "America", 11],
             ["USA", "America", 52],
             ["Mexico", "America", 24],
             ["Canada", "America", 16],
             ["France", "Europe", 42],
             ["Germany", "Europe", 31],
             ["Sweden", "Europe", 22],
             ["Italy", "Europe", 17],
             ["UK", "Europe", 21],
             ["China", "Asia", 36],
             ["Japan", "Asia", 20],
             ["India", "Asia", 40],
             ["Laos", "Asia", 4],
             ["Mongolia", "Asia", 1],
             ["Israel", "Asia", 12],
             ["Iran", "Asia", 18],
             ["Pakistan", "Asia", 11],
             ["Egypt", "Africa", 21],
             ["S. Africa", "Africa", 30],
             ["Sudan", "Africa", 12],
             ["Congo", "Africa", 10],
             ["Zaire", "Africa", 8]]'>
            </google-chart>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <google-chart
                    id="source-datatable"
                    type="bar">
            </google-chart>

            <script>
                (function () {
                    var chart = document.getElementById('source-datatable');
                    document.createElement('google-chart-loader').dataTable([
                        ['Label', 'Value'],
                        ['Memory', 10],
                        ['CPU', 12],
                        ['Network', 14]
                    ]).then(function (dataTable) {
                        chart.data = dataTable;
                    });
                }());
            </script>
        </div>
        <div class="col-md-4">
            <google-chart
                    id="source-dataview"
                    type="bar">
            </google-chart>

            <script>
                (function () {
                    var chart = document.getElementById('source-dataview');
                    var loader = document.createElement('google-chart-loader');
                    loader.dataTable([
                        ['Label', 'Value'],
                        ['Memory', 10],
                        ['CPU', 12],
                        ['Network', 14]
                    ]).then(function (dataTable) {
                        loader.dataView(dataTable).then(function (dataView) {
                            chart.view = dataView;
                            var setRandomRow = function () {
                                var rowCount = dataTable.getNumberOfRows();
                                var row = Math.floor(Math.random() * rowCount);
                                var row2 = (row + 1) % rowCount;
                                chart.view.setRows([row, row2]);
                                chart.redraw();
                            };
                            setInterval(setRandomRow, 3000);
                        });
                    });
                }());
            </script>
        </div>
        <div class="col-md-4">
            <img id="line-chart-img">

            <script>
                (function () {
                    var chart = document.getElementById('line-chart');
                    var img = document.getElementById('line-chart-img');
                    chart.addEventListener('google-chart-ready', function () {
                        img.src = chart.imageURI;
                    });
                }());
            </script>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
    </div>
@endsection

@section('scripts')

    <!-- Google Charts API web components -->
    <script src="{{asset('assets/vendor/webcomponentsjs/webcomponents-lite.js')}}"></script>

@endsection