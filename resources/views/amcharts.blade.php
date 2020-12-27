<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://cdn.amcharts.com/lib/4/lang/pl_PL.js"></script>
<script src="https://cdn.amcharts.com/lib/4/fonts/notosans-sc.js"></script>



@if(Route::current()->getName() == 'home')

<script>
//Dane statystyczne ciśnienia
am4core.ready(function() {
am4core.useTheme(am4themes_animated);
var chart = am4core.create("chartdiv", am4charts.XYChart);
var data = [@yield('statystykaCisnienie')];
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "czasDodania";
categoryAxis.baseInterval = {
    "timeUnit": "second",
    "count": 1
    }
categoryAxis.skipEmptyPeriods = true;
categoryAxis.tooltipDateFormat = "HH:mm, d MMMM";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.fullWidthTooltip = true;
categoryAxis.renderer.labels.template.fontSize = 20;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

var columnSeries = chart.series.push(new am4charts.ColumnSeries());
columnSeries.name = "Tętno";
columnSeries.dataFields.valueY = "tetno";
columnSeries.dataFields.categoryX = "czasDodania";

columnSeries.columns.template.tooltipText = "[#fff font-size: 15px]Wartość tętna\n W dniu: {categoryX}\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
columnSeries.columns.template.propertyFields.stroke = "stroke";
columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
columnSeries.tooltip.label.textAlign = "middle";
columnSeries.tooltip.getFillFromObject = false;
columnSeries.tooltip.background.fill = am4core.color("#6b8fff");
columnSeries.fill = am4core.color("#6b8fff");
columnSeries.stroke = am4core.color("#6b8fff");

var lineSeries = chart.series.push(new am4charts.LineSeries());
lineSeries.name = "Skurczowe";
lineSeries.dataFields.valueY = "skurczowe";
lineSeries.dataFields.categoryX = "czasDodania";

lineSeries.stroke = am4core.color("#ff0000");
lineSeries.strokeWidth = 3;
lineSeries.propertyFields.strokeDasharray = "lineDash";
lineSeries.tooltip.label.textAlign = "middle";

var bullet = lineSeries.bullets.push(new am4charts.Bullet());
bullet.fill = am4core.color("#ff0000"); // tooltips grab fill from parent by default
bullet.tooltipText = "[#fff font-size: 15px]Ciśnienie skurczowe\n W dniu: {categoryX}\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
var circle = bullet.createChild(am4core.Circle);
circle.radius = 4;
circle.fill = am4core.color("#fff");
circle.strokeWidth = 3;


var lineSeries2 = chart.series.push(new am4charts.LineSeries());
lineSeries2.name = "Rozkurczowe";
lineSeries2.dataFields.valueY = "rozkurczowe";
lineSeries2.dataFields.categoryX = "czasDodania";

lineSeries2.stroke = am4core.color("#0D9B7F");
lineSeries2.strokeWidth = 3;
lineSeries2.propertyFields.strokeDasharray = "lineDash";
lineSeries2.tooltip.label.textAlign = "middle";

var bullet1 = lineSeries2.bullets.push(new am4charts.Bullet());
bullet1.fill = am4core.color("#0D9B7F"); // tooltips grab fill from parent by default
bullet1.tooltipText = "[#fff font-size: 15px]Ciśnienie rozkurczowe\n W dniu: {categoryX}\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
var circle1 = bullet1.createChild(am4core.Circle);
circle1.radius = 4;
circle1.fill = am4core.color("#fff");
circle1.strokeWidth = 3;

chart.data = data;

chart.exporting.menu = new am4core.ExportMenu();
chart.exporting.menu.items = [{
  "label": "Pobierz",
  "menu": [
          { "type": "xlsx", "label": "Excel" },
          { "type": "pdfdata", "label": "PDF" },
        ]
}];
chart.exporting.menu.align = "left";

chart.scrollbarX = new am4core.Scrollbar();
chart.scrollbarX.parent = chart.bottomAxesContainer;
chart.scrollbarX.background.fill = am4core.color("#6b8fff");
chart.scrollbarX.thumb.background.fill = am4core.color("#0D9B7F");
chart.scrollbarX.startGrip.icon.stroke = am4core.color("#ffffff");
chart.scrollbarX.endGrip.icon.fill = am4core.color("#ffffff");
chart.scrollbarX.startGrip.background.states.getKey("hover").properties.fill = am4core.color("#ff0000");
chart.scrollbarX.endGrip.background.states.getKey("hover").properties.fill = am4core.color("#ff0000");

chart.legend = new am4charts.Legend();
chart.legend.labels.template.text = "[font-size: 18px bold ]{name}[/]";
}); //Dane statystyczne ciśnienia koniec


//Dane statystyczne ilości leków

am4core.ready(function() {
am4core.useTheme(am4themes_animated);
var chart = am4core.create("chartdiv2", am4charts.XYChart3D);

chart.data = [@yield('statystykaLeki')];

let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "nazwa";
categoryAxis.renderer.labels.template.rotation = 0;
categoryAxis.renderer.labels.template.hideOversized = false;
categoryAxis.renderer.minGridDistance = 60;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.labels.template.horizontalCenter = "center";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.renderer.labels.template.dx = -20;
categoryAxis.cursorTooltipEnabled = false;

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "Ilość leku";
valueAxis.title.fontWeight = "bold";

var series = chart.series.push(new am4charts.ColumnSeries3D());
series.dataFields.valueY = "ilosc";
series.dataFields.categoryX = "nazwa";
series.name = "Ilosc";
series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
columnTemplate.stroke = am4core.color("#FFFFFF");

columnTemplate.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

columnTemplate.adapter.add("stroke", function(stroke, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

chart.cursor = new am4charts.XYCursor();
chart.cursor.lineX.strokeOpacity = 0;
chart.cursor.lineY.strokeOpacity = 0;

});

//Dane statystyczne ilości leków koniec

</script>

@endif
