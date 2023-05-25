@extends('layouts.app')

@section('title')
    Новий відгук
@endsection

@section('content')
    <div>
        <h2 align="center">Додати відгук на помешкання {{$apartment->name}}</h2>
        <v-layout justify-center>
            <v-flex xs6>
                <form action="{{route('review.store')}}" method="POST">
                    @csrf
                    <div class="col-12" id="marg-t-15">
                        <label for="title" class="form-label">Загальне враження *</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="comment" class="form-label">Розгорнутий коментар *</label>
                        <textarea class="form-control" id="comment" name="comment"></textarea>
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="rate" class="form-label">Оцінка *</label>
                        <v-radio-group id="rate" name="rate" row>
                            @for($i = 1; $i <= 10; $i++)
                                <v-radio label="{{$i}}" value="{{$i}}"></v-radio>
                            @endfor
                        </v-radio-group>
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="comfort" class="form-label">Оцініть комфорт *</label>
                        <v-radio-group name="comfort" id="comfort" row>
                            @for($i = 1; $i <= 10; $i++)
                                <v-radio label="{{$i}}" value="{{$i}}"></v-radio>
                            @endfor
                        </v-radio-group>
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="clean" class="form-label">Оцініть чистоту *</label>
                        <v-radio-group name="clean" id="clean" row>
                            @for($i = 1; $i <= 10; $i++)
                                <v-radio label="{{$i}}" value="{{$i}}"></v-radio>
                            @endfor
                        </v-radio-group>
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="staff" class="form-label">Оцініть обслуговування *</label>
                        <v-radio-group name="staff" id="staff" row>
                            @for($i = 1; $i <= 10; $i++)
                                <v-radio label="{{$i}}" value="{{$i}}"></v-radio>
                            @endfor
                        </v-radio-group>
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="location" class="form-label">Оцініть розташування *</label>
                        <v-radio-group name="location" id="location" row>
                            @for($i = 1; $i <= 10; $i++)
                                <v-radio
                                    label="{{$i}}"
                                    value="{{$i}}"
                                ></v-radio>
                            @endfor
                        </v-radio-group>
                    </div>

                    <input type="hidden" name="apartment_id" value="{{$apartment->id}}">

                    <v-row>
                        <v-col>
                            <v-btn href="{{route('booking.history')}}" color="blue" outlined>Назад</v-btn>
                        </v-col>
                        <v-col>
                            <v-btn color="yellow" type="submit">Зберегти</v-btn>
                        </v-col>
                    </v-row>
                </form>
            </v-flex>
        </v-layout>
    </div>
@endsection
