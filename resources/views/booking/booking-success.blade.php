@extends('layouts.app')

@section('title')
    Бронювання успішне
@endsection

@section('content')
    <div style="height: 500px">
        <div class="alert alert-success center-box">
            <h5 align="center">Бронювання пройшло успішно! Вам надіслано email з детальною інформацією.</h5>
            <p align="center">Надалі очікуйте підтвердження бронювання від адміністрації помешкання. Гарного дня!</p>
        </div>
    </div>
@endsection
