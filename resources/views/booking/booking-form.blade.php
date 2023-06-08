<?php $people = filled(Session::get('people')) ? Session::get('people') : $room->people?>
@extends('layouts.app')

@section('title')
    Бронювання
@endsection

@section('content')
    <main class="d-flex flex-nowrap">
        @include('booking.booking-sidebar')
        <div>
            <div class="p-3 center-box" style="margin-left: 10%; width: 900px">
                <div
                    class="row g-0 rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative hotel-box-border">
                    <div class="col-auto d-flex align-items-center">
                        <img src="{{Storage::url('apartments/'.$apartment->image_1)}}" width="250" height="200" alt="Hotel photo"/>
                    </div>
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong
                            class="d-inline-block mb-2 text-primary d-flex justify-content-end">Рейтинг: {{$apartment->rate}}</strong>
                        <h3 class="mb-0">{{$apartment->name}}</h3>
                        <div class="stars mb-3">
                            @for($i=0; $i < $apartment->stars; $i++)
                                <div class="in-block">
                                    <v-icon color="orange">mdi-star-outline</v-icon>
                                </div>
                            @endfor
                        </div>
                        <p class="card-text mb-3">
                            {{$apartment->street}}, {{$apartment->building}}, {{$apartment->postcode}},
                            {{$apartment->city->city}}</p>
                        <h5 class="card-text mb-3">Номер {{$room->description}}</h5>
                    </div>
                </div>
            </div>
            <div class="p-3 center-box" style="margin-left: 10%; width: 900px">
                <div class="row g-0 rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative hotel-box-border">
                    <div class="p-3">
                        <h4>Особиста інформація</h4>
                    </div>

                    <form class="p-3 row" method="POST" action="{{route('booking.process')}}">
                        @csrf
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Імʼя *</label>
                            <input type="text" class="form-control" id="firstName" name="guest_firstname"
                                   value="{{$user->first_name}}" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Прізвище *</label>
                            <input type="text" class="form-control" id="lastName" name="guest_lastname" value="{{$user->last_name}}" required>
                        </div>
                        <div class="col-12" id="marg-t-15">
                            <label for="email" class="form-label">Email * (На цю пошту буде відправлено підтвердження)</label>
                            <input type="text" class="form-control" id="email" name="guest_email" value="{{$user->email}}" required>
                        </div>
                        <div class="col-12" id="marg-t-15">
                            <label for="people" class="form-label">Кількість гостей *</label>
                            <select class="find-form form-select" name="people">
                                <option selected value="{{$people}}">{{$people}}</option>
                                @for($num = 1; $num <= $room->people; $num++)
                                    <option value="{{$num}}">{{$num}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-12" id="marg-t-15">
                            <label for="notice" class="form-label">Ообисті побажання та запити</label>
                            <textarea class="form-control" id="notice" name="notice"></textarea>
                        </div>

                        <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
                        <input type="hidden" name="room_id" value="{{$room->id}}">

                        <v-row class="p-3 d-flex justify-content-end">
                            <v-col>
                                <a class="link-none" href="{{route('show', $apartment->id)}}"><--Назад</a>
                            </v-col>
                            <v-col>
                                <v-btn color="red" dark  type="submit" style="width: 100%">Підтвердити</v-btn>
                            </v-col>
                        </v-row>
                    </form>
                </div>
            </div>

            <span class="alert-danger">
                @error('guest_firstname')
                    <p class="text-danger center-text">{{$message}}</p>
                @enderror
                @error('guest_lastname')
                    <p class="text-danger center-text">{{$message}}</p>
                @enderror
                @error('guest_email')
                    <p class="text-danger center-text">{{$message}}</p>
                @enderror
            </span>

        </div>
    </main>
@endsection
