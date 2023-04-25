@extends('emails.layout')
@section('content')
    <h1 style="text-align: center"><b>Ваше бронювання успішне</b></h1>
    <div>
        <img src="https://media.istockphoto.com/vectors/hotel-icon-vector-vector-id926478812?k=6&m=926478812&s=170667a&w=0&h=hGL1VhgghSnzZtRGHwCPbAJQwRr23fKZdkoVfxMPzeg="
             width="400px" height="270px" alt="Photo">
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
        <p>{{$booking->total}}</p>
    </div>
    <h2 class="footer" ><b>Бажаємо Вам гарного відпочинку!</b></h2>
@endsection
