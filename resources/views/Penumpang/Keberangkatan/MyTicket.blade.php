@extends('layouts.main')

@section('container')
    @foreach ($datas as $data)
        <div class="container" style="border-radius: 20px; background-color:#E7E7E7; color:black">
            <p>{{ $data['bus']['nama'] }}</p>
            <div style=" display : flex; flex-direction : row;">
                <div style="text-align: center; width: 100%; display:flex; justify-content:center; align-items:center;">
                    <div style="display: inline-block; margin-right:50px">
                        <p style="text-align: center; ">{{ $data['keberangkatan']['from'] }} <br>
                            {{ \Carbon\Carbon::parse($data['keberangkatan']['keberangkatan'])->format('H:i') }}</p>
                    </div>
                    <div style="display: inline-block">
                        <p>{{ $data['keberangkatan']['to'] }}
                            <br>{{ \Carbon\Carbon::parse($data['keberangkatan']['sampai'])->format('H:i') }}
                        </p>
                    </div>
                </div>
                <div style="display: inline-block;">
                    <p style="width: 200px">Rp{{ $data['transaksi']['total_price'] }}</p>
                </div>

            </div>
            <div style=" display : flex; ">
                <div style="width: 100%">
                    <p style="display: inline-block">
                        {{ \Carbon\Carbon::parse($data['keberangkatan']['date'])->format('d-M-Y') }}
                    </p>
                </div>
                <div style=" width:100%;display:flex; justify-content:right; align-items:right";>
                    <a href="pembayaran/{{ $data['transaksi']['id'] }}">
                        <button type="button" class="btn btn-primary" style="background-color:#E76F51 ">
                            {{ $data['transaksi']['status'] }}</button>
                    </a>

                </div>

            </div>
        </div>
    @endforeach
@endsection
