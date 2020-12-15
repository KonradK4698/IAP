<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://cdn.amcharts.com/lib/4/lang/pl_PL.js"></script>
<script src="https://cdn.amcharts.com/lib/4/fonts/notosans-sc.js"></script>



@if(Route::current()->getName() == 'home')
    <script>
    am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.XYChart);

    chart.colors.step = 2;
    chart.maskBullets = false;

    // Add data
    chart.data = [@yield('statystykaCisnienie')];

    // Create axes
    
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.baseInterval = {
    "timeUnit": "second",
    "count": 1
    }
    dateAxis.skipEmptyPeriods = true;
    dateAxis.tooltipDateFormat = "HH:mm, d MMMM";
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.renderer.minGridDistance = 50;
    dateAxis.renderer.grid.template.disabled = true;
    dateAxis.renderer.fullWidthTooltip = true;

    var distanceAxis = chart.yAxes.push(new am4charts.ValueAxis());
    distanceAxis.title.text = "Skurczowe";
    //distanceAxis.renderer.grid.template.disabled = true;

    var durationAxis = chart.yAxes.push(new am4charts.ValueAxis());
    durationAxis.title.text = "Rozkurczowe";
    //durationAxis.baseUnit = "lolo";
    //durationAxis.renderer.grid.template.disabled = true;
    durationAxis.renderer.opposite = true;
    durationAxis.syncWithAxis = distanceAxis;

    //durationAxis.durationFormatter.durationFormat = "hh'h' mm'min'";

    var latitudeAxis = chart.yAxes.push(new am4charts.ValueAxis());
    latitudeAxis.renderer.grid.template.disabled = true;
    latitudeAxis.renderer.labels.template.disabled = true;
    latitudeAxis.syncWithAxis = distanceAxis;

    // Create series
    var distanceSeries = chart.series.push(new am4charts.ColumnSeries());
    distanceSeries.dataFields.valueY = "tetno";
    distanceSeries.dataFields.dateX = "data";
    distanceSeries.yAxis = distanceAxis;
    distanceSeries.tooltipText = "Tętno: {valueY}";
    distanceSeries.name = "Tętno";
    distanceSeries.columns.template.fillOpacity = 0.7;
    distanceSeries.columns.template.propertyFields.strokeDasharray = "dashLength";
    distanceSeries.columns.template.propertyFields.fillOpacity = "alpha";
    distanceSeries.showOnInit = true;

    var distanceState = distanceSeries.columns.template.states.create("hover");
    distanceState.properties.fillOpacity = 0.9;

    var durationSeries = chart.series.push(new am4charts.LineSeries());
    durationSeries.dataFields.valueY = "skurczowe";
    durationSeries.dataFields.dateX = "data";
    durationSeries.yAxis = durationAxis;
    durationSeries.name = "Skurczowe";
    durationSeries.strokeWidth = 2;
    //durationSeries.propertyFields.strokeDasharray = "dashLength";
    durationSeries.tooltipText = "{valueY}";
    durationSeries.showOnInit = true;

    var durationBullet = durationSeries.bullets.push(new am4charts.Bullet());
    var durationRectangle = durationBullet.createChild(am4core.Rectangle);
    durationBullet.horizontalCenter = "middle";
    durationBullet.verticalCenter = "middle";
    durationBullet.width = 7;
    durationBullet.height = 7;
    durationRectangle.width = 7;
    durationRectangle.height = 7;

    var durationState = durationBullet.states.create("hover");
    durationState.properties.scale = 1.2;

    var latitudeSeries = chart.series.push(new am4charts.LineSeries());
    latitudeSeries.dataFields.valueY = "rozkurczowe";
    latitudeSeries.dataFields.dateX = "data";
    latitudeSeries.yAxis = latitudeAxis;
    latitudeSeries.name = "Rozkurczowe";
    latitudeSeries.strokeWidth = 2;
    latitudeSeries.propertyFields.strokeDasharray = "dashLength";
    latitudeSeries.tooltipText = "{valueY}";
    latitudeSeries.showOnInit = true;

    var latitudeBullet = latitudeSeries.bullets.push(new am4charts.CircleBullet());
    latitudeBullet.circle.fill = am4core.color("#fff");
    latitudeBullet.circle.strokeWidth = 2;
    latitudeBullet.circle.propertyFields.radius = "townSize";

    var latitudeState = latitudeBullet.states.create("hover");
    latitudeState.properties.scale = 1.2;

    var latitudeLabel = latitudeSeries.bullets.push(new am4charts.LabelBullet());
    latitudeLabel.label.text = "{townName2}";
    latitudeLabel.label.horizontalCenter = "left";
    latitudeLabel.label.dx = 14;

    // Add legend
    chart.legend = new am4charts.Legend();

    // Add cursor
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.fullWidthLineX = true;
    chart.cursor.xAxis = dateAxis;
    chart.cursor.lineX.strokeOpacity = 0;
    chart.cursor.lineX.fill = am4core.color("#000");
    chart.cursor.lineX.fillOpacity = 0.1;

    }); // end am4core.ready()
    </script>
@endif
