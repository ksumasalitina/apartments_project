@extends('layouts.app')

@section('title')
    Моє житло
@endsection

@section('content')
    <div class="p-3">
        <div class="mb-2">
            <v-btn color="blue" href="{{route('my-apartments.create')}}">Додати помешкання</v-btn>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Назва</th>
                    <th scope="col">Місто</th>
                    <th scope="col">Бронювання</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($apartments as $apartment)
                <tr>
                    <td><h5>{{$apartment->name}}</h5></td>
                    <td>{{$apartment->city->city}}</td>
                    <td><p style="color: red">{{$apartment->books}}</p></td>
                    <td width="40%">
                        <v-row>
                            <v-col>
                                <v-btn color="yellow" href="{{route('show',$apartment->id)}}">Переглянути</v-btn>
                            </v-col>
                            <v-col>
                                <v-btn color="blue" dark href="{{route('room.create',$apartment->id)}}">Додати кімнати</v-btn>
                            </v-col>
                            <v-col>
                                <v-btn color="red" dark href="{{route('my-apartments.show',$apartment->id)}}">Бронювання</v-btn>
                            </v-col>
                        </v-row>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
