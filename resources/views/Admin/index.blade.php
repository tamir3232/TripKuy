@extends('layouts.main')


@section('container')
    <div class="card-group ">
        <a class="card container" style="margin: 20px; border-radius:20px; text-decoration:none;"
            href="/AdminPesanan?status=Pengecekan Pembayaran">
            <div class="card-body">
                <h3 class="card-text" style="text-align: center">Pesanan Baru</h3>
                <h1 class="card-title" style="text-align: center">{{ $pesananBaru }}</h1>
            </div>
        </a>

        <a class="card container" style="margin: 20px; border-radius:20px; text-decoration:none;"
            href="/AdminPesanan?status=Pembayaran Diterima">
            <div class="card-body">
                <h3 class="card-text" style="text-align: center">Pesanan Selesai</h3>
                <h1 class="card-title" style="text-align: center">{{ $pesananSelesai }}</h1>

            </div>
        </a>
        <a class="card container" style="margin: 20px; border-radius:20px; text-decoration:none;"
            href="/keberangkatan?status=ONGOING">
            <div class="card-body">
                <h3 class="card-text" style="text-align: center">Keberangkatan Tersedia</h3>
                <h1 class="card-title" style="text-align: center">{{ $keberangaktanTersedia }}</h1>

            </div>
        </a>
        <a class="card container" style="margin: 20px; border-radius:20px; text-decoration:none;"
            href="/keberangkatan?status=COMPLETE">
            <div class="card-body">
                <h3 class="card-text" style="text-align: center">Keberangkatan Selesai</h3>
                <h1 class="card-title" style="text-align: center">{{ $keberangaktanSelesai }}</h1>
                </h1>
            </div>
        </a>
    </div>


    <div id="grafik"></div>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        var tanggal = <?php echo json_encode($tanggal_transaksi); ?>;
        var total = <?php echo json_encode($total_transaksi); ?>;

        Highcharts.chart('grafik', {
            title: {
                text: ' TOTAL PEMESANAN SELESAI HARIAN'
            },
            xAxis: {
                categories: tanggal
            },
            yAxis: {

                title: {
                    text: 'Total Pemesanan Harian'
                },
                allowDecimals: false, // Mengatur agar tidak ada desimal pada sumbu Y
                tickInterval: 1 // Mengatur interval untuk label sumbu Y (misalnya, setiap 1 angka)
            },
            series: [{
                name: 'TANGGAL',
                data: total
            }]

        });
    </script>
@endsection
