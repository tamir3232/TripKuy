@extends('layouts.main')


@section('container')
    <div style="width: 100%; display:flex; justify-content:center; align-items:center;   ">
        <div class="containerr">
            <h1 style="font-weight: normal">Keberangkatan</h1>
            <form class="row g-4" action="/list-keberangkatan" method="get">
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">Dari</label>
                    <select id="inputState" class="form-select" name="from">
                        @php
                            $cities = ['Banda Aceh', 'Medan', 'Pekan Baru', 'Palembang', 'Jambi', 'Lampung', 'Jakarta'];
                        @endphp
                        <option selected>{{ $request->from }}</option>
                        @foreach ($cities as $city)
                            @if ($city !== $request->from)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputPassword4" class="form-label">Ke</label>
                    <select id="inputState" class="form-select" name="to">
                        @php
                            $cities = ['Banda Aceh', 'Medan', 'Pekan Baru', 'Palembang', 'Jambi', 'Lampung', 'Jakarta'];
                        @endphp
                        <option selected>{{ $request->to }}</option>
                        @foreach ($cities as $city)
                            @if ($city !== $request->to)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endif
                        @endforeach
                    </select>
                    </select>
                </div>
                <div class="col-3">
                    <label for="inputAddress" class="form-label">Tanggal Berangkat</label>
                    <input name="date" type="text" class="form-control" onfocus="(this.type='date')"
                        placeholder="{{ \Carbon\Carbon::parse($request->date)->format('m/d/Y') }}">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>


        </div>
    </div>
    @foreach ($keberangkatans as $keberangkatan)
        <div class="accordion">
            <div class="container accordion-item"
                style="border-radius: 20px; background-color:#E7E7E7; color:black; width:70%;">
                <div class="accordion-title">
                    <p>{{ $keberangkatan->bus->nama }}</p>
                    <div style=" display : flex; flex-direction : row;">
                        <div style="width: 250px">
                            <p>{{ $keberangkatan->user->nama_loket }}</p>
                        </div>

                        <div
                            style="text-align: center; width: 100%; display:flex; justify-content:center; align-items:center;">
                            <div style="display: inline-block; margin-right:50px">
                                <p style="text-align: center; ">{{ $keberangkatan->from }} <br>
                                    {{ \Carbon\Carbon::parse($keberangkatan->keberangkatan)->format('H:i') }}</p>
                            </div>
                            <div>

                            </div>
                            <div style="display: inline-block">
                                <p>{{ $keberangkatan->to }}
                                    <br>{{ \Carbon\Carbon::parse($keberangkatan->sampai)->format('H:i') }}
                                </p>
                            </div>
                        </div>
                        <div style="display: inline-block">
                            <p style="width: 200px">Rp{{ $keberangkatan->price }}</p>
                        </div>
                    </div>


                    <div style=" display : flex; ">
                        <div style="width: 100%">
                            <p style="display: inline-block">
                                {{ \Carbon\Carbon::parse($keberangkatan->date)->format('d-M-Y') }}
                            </p>
                        </div>
                        <div style=" width:100%;display:flex; justify-content:right; align-items:right";>
                            <a href="/kursi?keberangkatan_id={{ $keberangkatan->id }}"
                                style="text-decoration: none;color:black;">
                                <button type="button" class="btn btn-primary" style="background-color:#E76F51 "> PESAN
                                    TIKET</button>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="accordion-content">
                    <p style="font-size: 16px">Fasilitas</p>
                    <div>
                        <ul>
                            @if ($keberangkatan->ac == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p>AC</p>
                                    </div>
                                </li>
                            @endif
                            @if ($keberangkatan->tv == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p> TV </p>
                                    </div>
                                </li>
                            @endif
                            @if ($keberangkatan->sleeper == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p> SLEEPER </p>
                                    </div>
                                </li>
                            @endif
                            @if ($keberangkatan->wifi == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p> WIFI </p>
                                    </div>
                                </li>
                            @endif
                            @if ($keberangkatan->charging_station == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p> CHARGIN STATION </p>
                                    </div>
                                </li>
                            @endif
                            @if ($keberangkatan->bantal == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p> BANTAL </p>
                                    </div>
                                </li>
                            @endif
                            @if ($keberangkatan->selimut == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p> SELIMUT </p>
                                    </div>
                                </li>
                            @endif
                            @if ($keberangkatan->bagasi == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p> BAGASI </p>
                                    </div>
                                </li>
                            @endif
                            @if ($keberangkatan->kursi_L == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p> KURSI(L) </p>
                                    </div>
                                </li>
                            @endif
                            @if ($keberangkatan->kursi_xl == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p> KURSI(XL) </p>
                                    </div>
                                </li>
                            @endif
                            @if ($keberangkatan->kuris_xll == true)
                                <li style="display:inline-block; margin-right:20px">
                                    <div>
                                        <p> KURSI(XLL) </p>
                                    </div>
                                </li>
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



    <script>
        const titles = document.querySelectorAll('.accordion-title');

        titles.forEach(title => {
            title.addEventListener('click', () => {
                const content = title.nextElementSibling;
                if (content.style.display === 'block') {
                    content.style.display = 'none';
                } else {
                    content.style.display = 'block';
                }
            });
        });
    </script>
@endsection
