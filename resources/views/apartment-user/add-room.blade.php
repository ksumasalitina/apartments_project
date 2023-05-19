@extends('layouts.app')

@section('title')
    Нове житло
@endsection

@section('content')
    <div>
        <h2 align="center">Додати кімнату</h2>
        <h5 align="center">{{$apartment->name}}</h5>
        <v-layout justify-center>
            <v-flex xs4>
                @include('apartment-user.room-errors')

                <form action="{{route('room.store')}}" method="POST">
                    @csrf
                    <div class="col-12" id="marg-t-15">
                        <label for="number" class="form-label">Номер кімнати *</label>
                        <input type="text" class="form-control" id="number" name="number">
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="people" class="form-label">Максимальна кількість людей *</label>
                        <input type="number" class="form-control" id="people" name="people">
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="floor" class="form-label">Поверх *</label>
                        <input type="number" class="form-control" id="floor" name="floor">
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="beds" class="form-label">Кількість ліжок *</label>
                        <input type="number" class="form-control" id="beds" name="beds">
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="cost" class="form-label">Вартість *</label>
                        <input type="text" class="form-control" id="cost" name="cost">
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="description" class="form-label">Опис *</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
                    <input type="hidden" name="add_room" v-model="add_room">
                    <div class="col-12" id="marg-t-15">
                        <v-row>
                            <v-col>
                                <v-btn type="submit" color="red" dark href="{{route('my-apartments.index')}}">Назад</v-btn>
                            </v-col>
                            <v-col>
                                <v-btn type="submit" color="blue" dark>Зберегти</v-btn>
                            </v-col>
                            <v-col>
                                <v-btn type="submit" color="yellow" @click="addRoom">Додати ще кімнату</v-btn>
                            </v-col>
                        </v-row>
                    </div>
                </form>

            </v-flex>
        </v-layout>
    </div>
@endsection
