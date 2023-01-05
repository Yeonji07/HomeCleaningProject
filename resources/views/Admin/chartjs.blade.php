@extends("Admin.master");
@section("title","Daftar Appointment")
@section("content")
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var month = {{$month}};
    var user = {{$pekerja}};

    var barChartData = {
        labels: month,
        datasets: [{
            label: 'Pekerja',
            backgroundColor: "Teal",
            data: user
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 0,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Statistik Tahunan Pekerja'
                },
                options: {
                    scales: {
                    y: {
                        beginAtZero: true
                    }
                    }
                },
            }
        });
    };
</script>
@endsection
