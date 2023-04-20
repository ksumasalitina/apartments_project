@extends('emails.layout')
@section('content')
    <h1 style="text-align: center"><b>Ваше бронювання успішне</b></h1>
    <div>
        <img src="https://media.istockphoto.com/vectors/hotel-icon-vector-vector-id926478812?k=6&m=926478812&s=170667a&w=0&h=hGL1VhgghSnzZtRGHwCPbAJQwRr23fKZdkoVfxMPzeg="
             width="400px" height="270px" alt="Photo">
        <h2>Готель <em>{{$apartment->name}}</em></h2>
        <p>{{$apartment->email}}</p>
    </div>
    <hr>
    <div>
        <h2>Адреса</h2>
        <p>{{$apartment->street}}, {{$apartment->building}}, {{$apartment->postcode}}, {{$apartment->city->city}}</p>
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


    {{--<div style="margin-left: 30%">
        <img src="https://avt.mkklcdnv6temp.com/49/k/10-1583483962.jpg"  width="400px" height="250px">
        <h2 >Готель <em>Koroan</em></h2>
        <p>телефонбб имейл</p>
        </div>
   <hr style="width: 500px">
        <div style="margin-left: 30%">
        <h2 >Adress</h2>
            <p>cajcaosicjoaiscj</p>
    </div>
        <hr style="width: 500px">
        <div style="margin-left: 30%">
            <h2>Viizd</h2>
            <p>13-09-20022</p>
            <h2>Zaizf</h2>
            <p>16-09-20022</p>
        </div>--}}
@endsection
