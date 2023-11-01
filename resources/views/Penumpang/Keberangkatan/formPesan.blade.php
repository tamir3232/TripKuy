@extends('layouts.main')

@section('container')
    <div class='container'
        style="color: black; background-color:white; border-style:solid; border-radius:0; padding:20px; border-width:1px;">

        <form class="row g-3" action="form-pesanan" method="POST">
            @csrf
            @foreach ($seats as $seat)
                <div style="border-bottom: solid black">
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="inputAddress" name="nama[]">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat[]">
                    </div>
                    <input type="hidden" name="seat[]" value="{{ $seat }}">


                </div>
            @endforeach
            <input type="hidden" name="keberangkatan" value="{{ $keberangkatan }}">
            <div class="row g-3">
                <div class="col">
                    <label for="inputAddress" class="form-label">No.HP</label>
                    <input type="text" class="form-control" placeholder="First name" name="no_wa">
                </div>
                <div class="col">
                    <label for="inputAddress" class="form-label">Email</label>
                    <input type="text" class="form-control" placeholder="Last name" name="email">
                </div>
            </div>
            <div class="col-12">
                <label class="visually-show" for="inlineFormSelectPref">Metode Pembayaran</label>
                <select class="form-select" id="inlineFormSelectPref">
                    <option selected>Choose...</option>
                    <option value="1">ATM</option>
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
        </form>
    </div>
@endsection
