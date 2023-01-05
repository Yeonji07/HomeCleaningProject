{{-- @extends("Admin.master");
@section("title","Statistik")
@section("content")
<style>
    body{
        background-color: white;
    }

    #header .admin-title {
        font-size: 28px;
        margin: 0;
        padding: 0;
        line-height: 1;
        font-weight: 300;
        letter-spacing: 0.5px;
        font-family: "Poppins", sans-serif;
    }

    #header .admin-title a {
        color: #469FDF;
    }

    #header .admin-title img {
        max-height: 40px;
    }

    @media (max-width: 992px) {
        #header .admin-title {
            font-size: 28px;
        }
    }

    </style>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="/assets/js/main.js"></script>
<body>
    <!-- Chart's container -->
    <div id="chart" style="height: 300px;"></div>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('Test1')",
      });
    </script>
  </body> --}}
@extends("Admin.master");
@section("title","Statistik")
@section("content")
<style>
    body{
        background-color: white;
    }

    #header .admin-title {
        font-size: 28px;
        margin: 0;
        padding: 0;
        line-height: 1;
        font-weight: 300;
        letter-spacing: 0.5px;
        font-family: "Poppins", sans-serif;
    }

    #header .admin-title a {
        color: #469FDF;
    }

    #header .admin-title img {
        max-height: 40px;
    }

    @media (max-width: 992px) {
        #header .admin-title {
            font-size: 28px;
        }
    }

    </style>

    <div class="pricing-header px-3 py-5 pt-md-5 pb-md-5 mx-auto text-center">
        <h1 class="display-4"></h1>
    </div>

    <!-- Chart's container -->
    <center>Jumlah Transaksi yang dilakukan dalam 1 tahun</center>
    <div id="chart1" style="height: 300px;"></div>
    <br><br><br>
    <center>Jumlah Penggunaan voucher dalam 30 hari</center>
    <div id="chart2" style="height: 300px;"></div>

    <center>Jumlah Appointment yang dilakukan dalam 1 tahun</center>
    <div id="chart3" style="height: 300px;"></div>

    <center>Jumlah User yang mendaftar dalam 1 tahun</center>
    <div id="chart4" style="height: 300px;"></div>

    <center>Jumlah Paket / Voucher yang dibeli dalam 1 tahun</center>
    <div id="chart5" style="height: 300px;"></div>

    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->

    <script>
      const chart = new Chartisan({
        el: '#chart1',
        url: "@chart('chart1')",
      });
    </script>

    <script>
      const chart2 = new Chartisan({
        el: '#chart2',
        url: "@chart('chart2')",
      });
    </script>

    <script>
        const chart3 = new Chartisan({
            el: '#chart3',
            url: "@chart('chart3')",
        });
    </script>

    <script>
        const chart4 = new Chartisan({
            el: '#chart4',
            url: "@chart('chart4')",
        });
    </script>

    <script>
        const chart5 = new Chartisan({
            el: '#chart5',
            url: "@chart('chart5')",
        });
    </script>
@endsection
