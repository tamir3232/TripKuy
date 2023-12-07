@extends('layouts.main')


@section('container')
    <h1 style="text-align: center">Data Pembayaran</h1>
    <div class="container" style="background-color: white; border-radius:0; color:black; border:solid black; width:30%;">
        @if ($transaksi->attachment == null && $transaksi->status == 'Menunggu Pembayaran')
            <h2 style="text-align: center">SELESAIKAN DALAM </h2>
            <h3 id ="demo" style="text-align: center; color:#E76F51">60:00</h3>
        @endif

        <p>KODE TIKET : </p>
        <p style="font-size: 16px; font-family:Arial, Helvetica, sans-serif">{{ $transaksi->code }}</p>
        <p>TOTAL PEMBAYARAN: </p>
        <p style="font-size: 16px;  font-family:Arial, Helvetica, sans-serif">Rp{{ $transaksi->total_price }}</p>
        <p>STATUS</p>
        <p style="font-size: 16px;  font-family:Arial, Helvetica, sans-serif">{{ $transaksi->status }}</p>
        <p>Bukti Pembayaran</p>
        <div>
            <img src="{{ asset('storage/post-image') . '/' . $transaksi->attachment }}" style="width: 100%;">
        </div>
    </div>

    @if ($transaksi->status != 'Pembayaran Ditolak' && $transaksi->status != 'Pembayaran Diterima')
        <form action="/AdminPesanan/{{ $transaksi->id }}" method="post">

            @csrf
            @method('PUT')


            <input type="hidden" name="status" value="">

            <div class="container" style="background-color: white; border-radius:0; color:black; width:36%; ">

                <button type="submit" class="btn btn-primary btn-lg"
                    style="background-color: red; margin-right: 20px; margin-left:100px" id="cancel">Tolak
                    Pembayaran</button>
                <button type="submit" class="btn btn-secondary btn-lg" id="confirm">Konfirmasi Pembayaran</button>

            </div>


        </form>
    @else
        <div class="container" style="background-color: white; border-radius:0; color:black;  width:30%;">

            <button type="submit" style="width: 100%" class="btn btn-secondary btn-lg">{{ $transaksi->status }}</button>
        </div>
    @endif






    <script>
        document.getElementById('cancel').addEventListener('click', function() {
            // Ubah nilai input status menjadi "menolak pembayaran"
            document.querySelector('input[name="status"]').value = "Pembayaran Ditolak";
        });

        document.getElementById('confirm').addEventListener('click', function() {
            // Ubah nilai input status menjadi "pembayaran diterima"
            document.querySelector('input[name="status"]').value = "Pembayaran Diterima";
        });
    </script>
@endsection
