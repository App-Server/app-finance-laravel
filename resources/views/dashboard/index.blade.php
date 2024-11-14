<x-layout title="Dashboard">
    <div class="row">
        <div class="col-md-8">
            <h5>Dashboard</h5>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5>Histórico de receita e despesa</h5>
            <div id="chartContainer" style="height: 450px; width: 100%;"></div>
            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        </div>
    </div>

    <script>
        window.onload = function () {
            // Dados da receita
            var revenueData = [
                @foreach($revenue2024 as $r)
                    { x: new Date(2024, {{ $r->month - 1 }}, 1), y: {{ $r->total }} },
                @endforeach
            ];
    
            // Dados da despesa
            var expenseData = [
                @foreach($expense2024 as $e)
                    { x: new Date(2024, {{ $e->month - 1 }}, 1), y: {{ $e->total }} },
                @endforeach
            ];
    
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
    
                axisX: {
                    valueFormatString: "MMM YY",
                    interval: 1,
                    intervalType: "month"
                },
            
                legend: {
                    cursor: "pointer",
                    fontSize: 16,
                    itemclick: toggleDataSeries
                },
    
                toolTip: {
                    shared: true,
                    contentFormatter: function (e) {
                        var date = CanvasJS.formatDate(e.entries[0].dataPoint.x, "MMM YYYY");
                        var content = date + "<br>";
    
                        e.entries.forEach(function(entry) {
                            content += entry.dataSeries.name + ": R$ " + entry.dataPoint.y.toFixed(2) + "<br>";
                        });
    
                        return content;
                    }
                },
    
                data: [
                    {
                        type: "spline",
                        name: "Receita",
                        showInLegend: true,
                        yValueFormatString: "R$ #,##0.00",
                        dataPoints: revenueData
                    },
                    {
                        type: "spline",
                        name: "Despesa",
                        showInLegend: true,
                        yValueFormatString: "R$ #,##0.00",
                        dataPoints: expenseData
                    }
                ]
            });
            
            chart.render();
    
            function toggleDataSeries(e) {
                e.dataSeries.visible = !(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible);
                chart.render();
            }
        }
    </script>
    
</x-layout>
