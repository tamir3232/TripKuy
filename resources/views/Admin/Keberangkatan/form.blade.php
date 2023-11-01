@extends('layouts.main')

@section('container')
    <div class='container' style="color: black; background-color:white; border-style:solid; border-radius:0; padding:20px">
        <form class="row g-3" method="POST" action="/form-keberangkatan">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">From</label>
                <select name="from" id="inputState" class="form-select">
                    <option value="Medan">Medan</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">To</label>
                <select name="to" id="inputState" class="form-select">
                    <option value="Banda Aceh">Banda Aceh</option>
                </select>
            </div>

            <div class="col-12">
                <label for="inputAddress2" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" id="inputAddress2" required>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Bus Type</label>
                <select name="bus" id="inputState" class="form-select" required>
                    @foreach ($bus as $bu)
                        <option value="{{ $bu->id }}">{{ $bu->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="form-label">Jam Keberangkatan</label>
                <input type="time" id="appt" name="keberangkatan" min="00:00" max="23:00" class="form-select"
                    required />
            </div>
            <div>
                <label class="form-label">Jam Sampai</label>
                <input type="time" id="appt" name="sampai" min="00:01" max="24:00"
                    class="form-select"required />
            </div>
            <label>Facility</label>

            <div class="form-check">
                <input class="form-check-input" name="kamar_mandi" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Kamar Mandi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="tv" type="checkbox" value="true" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Tv
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="ac" type="checkbox" value="true" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Ac
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="sleeper" type="checkbox" value="true" id="flexCheckChecked" checked>
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
                <input class="form-check-input" name="bagasi" type="checkbox" value="true" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Bagasi
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

            <div class="col-12">
                <label for="inputAddress" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" id="inputAddress" required>
                <button>Price prediction</button>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary">Tambah Keberangkatan</button>
            </div>
        </form>
    </div>


    <script></script>
@endsection
