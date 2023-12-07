@extends('layouts.main')


@section('container')
    @include('layouts.caraousel')

    <div
        style="width: 100%; display:flex; justify-content:center; align-items:center; margin-top:-600px;  position: absolute;">
        <div class="containerr">
            <h1>Keberangkatan</h1>
            <form class="row g-4" style="margin-left:60px" action="/list-keberangkatan" method="get">
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">Dari</label>
                    <select id="inputState" class="form-select" name="from"
                        style="font-family: Arial, Helvetica, sans-serif">
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
                <div class="col-md-3">
                    <label for="inputPassword4" class="form-label">Ke</label>
                    <select id="inputState" class="form-select" name="to"
                        style="font-family: Arial, Helvetica, sans-serif">
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
                <div class="col-3">
                    <label for="inputAddress" class="form-label">Tanggal Berangkat</label>
                    <input type="date" class="form-control" id="inputAddress" name="date"
                        style="font-family: Arial, Helvetica, sans-serif">
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>


        </div>
    </div>

    {{-- <div class="container marketing" style="width: 80%; background-color:white; color:#E9C46A">
        <div class="row">
            <div class="col-lg-4">
                <img src="image/seat.png" style="width:70%; height:70%; border-radius:20px">
                <h2 class="fw-normal">Tranksasi Kapan Saja</h2>


            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                </svg>
                <h2 class="fw-normal">Bisa Pilih Kursi</h2>


            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                </svg>
                <h2 class="fw-normal">Pembayaran Banyak Jenis</h2>
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->keberangkatan
        <div class="card-group">
            <div class="card">
                <img src="image/BANDA.jpg" class="card-img-top" alt="..." style="width: 600px; height:300px">
            </div>
            <div class="card">
                <img src="image/medan.jpg" class="card-img-top" alt="..." style="width: 600px; height:300px">
            </div>
            <div class="card">
                <img src="image/padang.jpg" class="card-img-top" alt="..." style="width: 500px; height:300px">
            </div>
        </div>
    </div> --}}
@endsection
