@extends('layouts.main')

@php
    $i = 1;
@endphp
@section('container')
    {{-- {{ var_dump($penumpang) }} --}}
    <div class="container" style="border-radius: 20px; background-color:#E7E7E7; color:black">
        <p>{{ $keberangkatan->bus->nama }}</p>
        <div style=" display : flex; flex-direction : row;">
            <div style="text-align: center; width: 100%; display:flex; justify-content:center; align-items:center;">
                <div style="display: inline-block; margin-right:50px">
                    <p style="text-align: center; ">{{ $keberangkatan->from }} <br>
                        {{ \Carbon\Carbon::parse($keberangkatan->keberangkatan)->format('H:i') }}</p>
                </div>
                <div style="display: inline-block">
                    <p>{{ $keberangkatan->to }}
                        <br>{{ \Carbon\Carbon::parse($keberangkatan->sampai)->format('H:i') }}
                    </p>
                </div>
            </div>
            <div style="display: inline-block;">
                <p style="width: 200px">Rp{{ $keberangkatan->price }}</p>
            </div>

        </div>
        <div style=" display : flex; ">
            <div style="width: 100%">
                <p style="display: inline-block">{{ \Carbon\Carbon::parse($keberangkatan->date)->format('d-M-Y') }}</p>
            </div>
            <div style=" width:100%;display:flex; justify-content:right; align-items:right";>
                @if ($keberangkatan->status == 'ONGOING')
                    <button type="button" class="btn btn-primary" style="background-color:#E76F51; margin-right:20px"
                        id="">
                        <a href="/form-keberangkatan/{{ $keberangkatan->id }}"
                            style="text-decoration: none; color:white">PERBARUI </a></button>
                @endif

                <button type="button" class="btn btn-primary" style="background-color:#E76F51" id="showConfirmationModal">
                    {{ $keberangkatan->status }}</button>

            </div>

        </div>
    </div>
    <div style="width: 100%; display:flex; justify-content:center; align-items:center; margin-top:20px;">
        <table
            class="table"style="background-color: white; border-radius:0; color:black; border:solid black;  font-family:Arial, Helvetica, sans-serif">
            <thead>
                <tr>
                    <th>NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No.Wa</th>
                    <th>email</th>
                    <th>code</th>
                    <th>kursi</th>
                    <th>status</th>
                </tr>
            </thead>

            <tbody>
                @if ($penumpang)
                    @foreach ($penumpang as $p)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td> {{ $p['penumpang']['name'] }}</td>
                            <td>{{ $p['penumpang']['alamat'] }}</td>
                            <td>{{ $p['penumpang']['no_wa'] }}</td>
                            <td>{{ $p['penumpang']['email'] }}</td>
                            <td>{{ $p['transaksi']['code'] }}</td>
                            <td>{{ $p['kursi'] }}</td>
                            <td>{{ $p['transaksi']['status'] }}</td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Perubahan Status</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    Apakah Keberangkatan Telah Selesai
                </div>
                <div class="modal-footer">


                    <button type="submit" class="btn btn-secondary" id="cancel" data-dismiss="modal">Batal</button>

                    <form action="/keberangkatan/{{ $keberangkatan->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="COMPLETE">
                        <button type="submit" class="btn btn-primary" id="confirmStatusChange">Keberangkatan Telah
                            Selesai</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#showConfirmationModal').click(function() {
                $('#confirmationModal').modal('show');
            });
            $('#cancel').click(function() {
                $('#confirmationModal').modal('hide');
            });



        });
    </script>

@endsection
