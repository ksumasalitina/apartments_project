@extends('emails.layout')
@section('content')
    <h1 style="text-align: center"><b>Ваше бронювання успішне</b></h1>
    <div>
        <h2>Готель <em>{{$booking->apartment->name}}</em></h2>
        <p>{{$booking->apartment->email}}</p>
    </div>
    <hr>
    <div>
        <h2>Адреса</h2>
        <p>{{$booking->apartment->street}}, {{$booking->apartment->building}}, {{$booking->apartment->postcode}}, {{$booking->apartment->city->city}}</p>
    </div>
    <hr>
    <div>
        <h2>Дата заїзду</h2>
        <p>{{$booking->check_in}}</p>
        <h2>Дата виїзду</h2>
        <p>{{$booking->check_out}}</p>
    </div>
    <hr>
    <div>
        <h2>Кількість гостей</h2>
        <p>{{$booking->people}}</p>
    </div>
    <hr>
    <div>
        <h2>До сплати</h2>
        <p>{{$booking->total}} UAH</p>
    </div>
    <h2 class="footer" ><b>Бажаємо Вам гарного відпочинку!</b></h2>
@endsection
