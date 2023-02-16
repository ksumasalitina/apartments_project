@extends('layouts.app')

@section('title')
    {{$apartment->name}}
@endsection

@section('content')
    <main class="d-flex flex-nowrap">
        @include('components.search-sidebar')
        <div class="p-3 ml-3" style="width: 90%">
            <div
                class="row g-0 rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <button class="d-flex justify-content-end">
                        <v-icon>mdi-heart-outline</v-icon>
                    </button>
                    <h3 class="mb-0">{{$apartment->name}}</h3>
                    <div class="stars mb-3">
                        @for($i=0; $i < $apartment->stars; $i++)
                            <div class="in-block">
                                <v-icon color="orange">mdi-star-outline</v-icon>
                            </div>
                        @endfor
                    </div>
                    <p class="card-text mt-3">{{$apartment->description}}</p>
                    <p class="mt-4"><b>Email:</b> {{$apartment->email}}</p>
                    <p><b>Адреса: </b>
                        {{$apartment->street}}, {{$apartment->building}},
                        {{$apartment->city->city}}, {{$apartment->postcode}}</p>
                    <v-btn color="blue" text width="45%">Показати на карті</v-btn>
                    <div class="mt-7">
                        <v-btn class="in-block mr-2" color="blue" outlined>Переглянути номери</v-btn>
                        <v-btn class="in-block" color="black" outlined>Відгуки</v-btn>
                    </div>
                </div>
                <div class="col-auto d-flex">
                    <img src="{{$apartment->image_1}}" width="450" height="400" alt="Hotel photo"
                         class="d-flex align-items-center"/>
                </div>
                <div class="col-auto align-items-center">
                        <img src="{{$apartment->image_2}}" width="225" height="190" alt="Hotel photo" class="mb-4"/><br>
                        <img src="{{$apartment->image_3}}" width="225" height="190" alt="Hotel photo"/>
                </div>
            </div>
        </div>
    </main>
@endsection
