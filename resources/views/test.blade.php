@extends('layouts.main')


@section('container')
    @foreach ($data as $dat)
        <p>{{ $dat->name }}</p>
        <p>{{ $dat->email }}</p>
    @endforeach
@endsection
