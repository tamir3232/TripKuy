@extends('layouts.main')

@section('container')
    <div class="container" style="background-color: white; border-radius:0; color:black; border:solid black; width:30%">
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
        @if ($transaksi->attachment)
            <div>
                <img src="{{ asset('storage/post-image') . '/' . $transaksi->attachment }}" style="width: 100%;">
            </div>
        @endif

    </div>
    @if ($transaksi->attachment == null && $transaksi->status == 'Menunggu Pembayaran')
        <form action="/pembayaran" method="post" enctype="multipart/form-data">

            @csrf

            <div class="container" style="background-color: white;">
                <p style="color: #000;">UPLOAD BUKTI PEMBAYARAN</p>
                <div class="input-group mb-3">
                    <input type="file" class="form-control @error('images')is-invalid @enderror" name='images'
                        id="images" accept="image/*" required="false">

                </div>
                <input type="hidden" name="transaksi" value="{{ $transaksi->id }}">
            </div>

            <div class="container" style="background-color: white; border-radius:0; color:black; width:30%; ">

                <button type="submit" class="btn btn-primary btn-lg"
                    style="background-color: red; margin-right: 20px; margin-left:100px" id="cancel">Batal
                    Pemesanan</button>
                <button type="submit" class="btn btn-secondary btn-lg" id="pay">Bayar</button>

            </div>

        </form>
    @elseif ($transaksi->status == 'Pembayaran Diterima')
        <table
            class="table container"style="background-color: white; border-radius:0; color:black; border:solid black; font-family:arial">
            <thead>
                <tr>
                    <th>NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No.Wa</th>
                    <th scope="col">Kota Asal</th>
                    <th scope="col">Kota Tujuan</th>
                    <th scope="col">Tanggal Keberangkatan</th>
                    <th scope="col">Jam Keberangkatan</th>
                    <th scope="col">No.Kursi</th>
                    <th style="width: 50px">email</th>

                </tr>
            </thead>
            <tbody>
                {{ $i = 1 }}
                @foreach ($tikets as $tiket)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $tiket->penumpang->name }}</td>
                        <td>{{ $tiket->penumpang->alamat }}</td>
                        <td>{{ $tiket->penumpang->no_wa }}</td>
                        <td>{{ $transaksi->keberangkatan->from }}</td>
                        <td>{{ $transaksi->keberangkatan->to }}</td>
                        <td>{{ $transaksi->keberangkatan->date }}</td>
                        <td>{{ $transaksi->keberangkatan->keberangkatan }}</td>
                        <td>{{ $tiket->kursi->nama }}</td>
                        <td>{{ $tiket->penumpang->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif





    <script>
        document.getElementById('cancel').addEventListener('click', function() {
            document.getElementById('images').removeAttribute('required');
        });

        document.querySelector('pay').addEventListener('submit', function() {
            event.preventDefault(); // Hindari pengiriman form secara otomatis
            document.getElementById('images').setAttribute('required', 'true');
        });
    </script>
@endsection
