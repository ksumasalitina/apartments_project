@extends('emails.layout')
@section('content')
    <h1 style="text-align: center"><b>Нове бронювання {{$booking->apartment->name}}</b></h1>
    <div>
        <table class="border-0 table">
            <tbody>
            <tr>
                <td><b>Імʼя</b></td>
                <td>{{$booking->guest_firstname}}</td>
            </tr>
            <tr>
                <td><b>Прізвище</b></td>
                <td>{{$booking->guest_lastname}}</td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td>{{$booking->guest_email}}</td>
            </tr>
            <tr>
                <td><b>Дата заїзду</b></td>
                <td>{{date_format(date_create($booking->check_in), 'd-m-Y')}}</td>
            </tr>
            <tr>
                <td><b>Дата виїзду</b></td>
                <td>{{date_format(date_create($booking->check_out), 'd-m-Y')}}</td>
            </tr>
            <tr>
                <td><b>Кількість людей</b></td>
                <td>{{$booking->people}}</td>
            </tr>
            <tr>
                <td><b>Кімната</b></td>
                <td>{{$booking->room->number}}</td>
            </tr>
            <tr>
                <td><b>Сума</b></td>
                <td>{{$booking->total}} UAH</td>
            </tr>
            <tr>
                <td><b>Дата бронювання</b></td>
                <td>{{date_format(date_create($booking->created_at), 'd-m-Y')}}</td>
            </tr>
            <tr>
                <td><b>Статус</b></td>
                <td>{{$booking->status}}</td>
            </tr>
            </tbody>
        </table>
        <v-btn href="{{route('my-apartments.show',$booking->apartment->id)}}">Переглянути та змінити статус</v-btn>
    </div>
@endsection
