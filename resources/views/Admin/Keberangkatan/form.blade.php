@extends('layouts.main')

@section('container')
    <div class='container' style="color: black; background-color:white; border-style:solid; border-radius:0; padding:20px">
        <form class="row g-3" id="predictionForm">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Kota Asal</label>
                <select name="from" id="inputState" class="form-select" required>
                    <option value="" disabled selected style="display:none;"> </option>
                    <option value="Banda Aceh">Banda Aceh</option>
                    <option value="Medan">Medan</option>
                    <option value="Pekan Baru">Pekan Baru</option>
                    <option value="Palembang">Palembang</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Lampung">Lampung</option>
                    <option value="Jakarta">Jakarta</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Kota Tujuan</label>
                <select name="to" id="inputState" class="form-select" required>
                    <option value="" disabled selected style="display:none;"> </option>
                    <option value="Banda Aceh">Banda Aceh</option>
                    <option value="Medan">Medan</option>
                    <option value="Pekan Baru">Pekan Baru</option>
                    <option value="Palembang">Palembang</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Lampung">Lampung</option>
                    <option value="Jakarta">Jakarta</option>
                </select>
            </div>

            <div class="col-12">
                <label for="inputAddress2" class="form-label">Tanggal Berangkat</label>
                <input type="date" name="date" class="form-control" id="inputAddress2" required>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Tipe Bus</label>
                <select name="bus" id="inputState" class="form-select">
                    @foreach ($bus as $bu)
                        <option value="{{ $bu->id }}">{{ $bu->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="form-label">Jam Keberangkatan</label>
                <input type="time" id="appt" name="keberangkatan" min="00:00" max="23:00" class="form-select"
                    required>
            </div>
            <div>
                <label class="form-label">Jam Sampai</label>
                <input type="time" id="appt" name="sampai" min="00:01" max="24:00" class="form-select"
                    required>
            </div>
            <label>Fasilitas</label>

            <div class="form-check">
                <input class="form-check-input" name="kamar_mandi" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Kamar Mandi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="ac" type="checkbox" value="true" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Ac
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="sleeper" type="checkbox" value="true" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Sleeper
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="charging_station" type="checkbox" value="true"
                    id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Charging Station
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="wifi" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    WIFI
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="bantal" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Bantal
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="selimut" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Selimut
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="kursi_l" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    KURSI(L)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="kursi_xl" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    KURSI(XL)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="kursi_xll" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    KURSI(XLL)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="non_stop" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    NON STOP
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="toilet" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Toilet
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="makan" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Makan
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="minum" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Minum
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="sandaran_kaki" type="checkbox" value="true"
                    id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Sandaran Kaki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="smoking_room" type="checkbox" value="true"
                    id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Smoking Room
                </label>
            </div>
            <div>
                <label class="form-check-label" for="flexCheckDefault">
                    Jarak
                </label>
                <input class="" name="jarak" type="text" id="flexCheckDefault" style="margin-left:40px">

            </div>
            <div>
                <label class="form-check-label" for="flexCheckDefault">
                    Harga BBM
                </label>
                <input name="harga_bbm" type="text" id="flexCheckDefault">

            </div>
            <div class="col-12">
                <label for="price" class="form-label">Harga</label>
                <input type="text" id = "price" name="price" class="form-control" id="inputAddress">
                <button id="pricePredictionBtn">Prediksi Harga</button>
            </div>



            <div class="col-12">
                <button id= "tambahKeberangkatanBtn" type="submit" class="btn btn-primary">Tambah Keberangkatan</button>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ketika elemen dengan ID 'pricePredictionBtn' diklik
            $('#pricePredictionBtn').click(function() {
                // Ubah aksi formulir menjadi GET
                event.preventDefault();
                // $('form').attr('action', '/prediction').attr('method', 'GET');
                $.ajax({
                    url: '/prediction', // Route Laravel yang menangani permintaan
                    type: 'GET',
                    data: $('#predictionForm').serialize(), // Mengambil data dari formulir
                    success: function(response) {
                        // Mengisi nilai input 'price' dengan respons dari API Django
                        $('#price').val((Math.round(response)));
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Menampilkan pesan kesalahan jika ada
                    }
                });
            });

            // Ketika elemen dengan ID 'tambahKeberangkatanBtn' diklik
            $('#tambahKeberangkatanBtn').click(function() {
                // Ubah aksi formulir menjadi POST
                $('form').attr('action', '/form-keberangkatan').attr('method', 'POST');
            });
        });
    </script>
@endsection
