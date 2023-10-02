@extends('layouts.main')


@section('container')
    <div class="card-group ">
        <a class="card container" style="margin: 20px; border-radius:20px; text-decoration:none;" href="/Admin/">
            <div class="card-body">

                <h3 class="card-text" style="text-align: center">Pesanan Baru</h3>
                <h1 class="card-title" style="text-align: center">99+</h1>
            </div>
        </a>
        <a class="card container" style="margin: 20px; border-radius:20px; text-decoration:none;" href="google.com">
            <div class="card-body">
                <h3 class="card-text" style="text-align: center">Pesanan Selesai</h3>
                <h1 class="card-title" style="text-align: center">99+</h1>

            </div>
        </a>
        <a class="card container" style="margin: 20px; border-radius:20px; text-decoration:none;" href="/keberangkatan">
            <div class="card-body">
                <h3 class="card-text" style="text-align: center">Keberangkatan Tersedia</h3>
                <h1 class="card-title" style="text-align: center">99+</h1>

            </div>
        </a>
        <a class="card container" style="margin: 20px; border-radius:20px; text-decoration:none;" href="google.com">
            <div class="card-body">
                <h3 class="card-text" style="text-align: center">Keberangkatan Selesai</h3>
                <h1 class="card-title" style="text-align: center">99+</h1>
            </div>
        </a>
    </div>

    <div style="width: 100%; display:flex; justify-content:center; align-items:center; margin-top:20px;">
        <table class="table caption-top" style="border-block: 20px">
            <caption>List of users</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
