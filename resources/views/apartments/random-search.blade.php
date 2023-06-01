@extends('layouts.app')

@section('title')
    Результати пошуку
@endsection

@section('content')
    <main class="d-flex flex-nowrap">
        @include('components.search-sidebar')
            <div>
                <p class="mb-2 marg-l-4 find-heading">{{$city->city}}: знайдено {{count($apartments)}} варіантів</p>
                <v-btn href="{{route('search.random')}}" class="mb-3 position-relative marg-l-80" color="primary" outlined>
                    <v-icon>mdi-reload</v-icon>
                    Знайти інше місто
                </v-btn>


                @foreach($apartments as $x)
                    <div class="p-3 center-box" style="margin-left: 10%; width: 900px">
                        <div
                            class="row g-0 rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative hotel-box-border">
                            <div class="col-auto d-flex align-items-center">
                                <v-carousel height="200" hide-delimiter-background :show-arrows="false"
                                            class="d-flex align-items-center">
                                    <v-carousel-item>
                                        <img src="{{Storage::url('apartments/'.$x->image_1)}}" width="250" height="200" alt="Hotel photo"/>
                                    </v-carousel-item>
                                    <v-carousel-item>
                                        <img src="{{Storage::url('apartments/'.$x->image_2)}}" width="250" height="200" alt="Hotel photo"/>
                                    </v-carousel-item>
                                    <v-carousel-item>
                                        <img src="{{Storage::url('apartments/'.$x->image_3)}}" width="250" height="200" alt="Hotel photo"/>
                                    </v-carousel-item>
                                </v-carousel>
                            </div>
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong
                                    class="d-inline-block mb-2 text-primary d-flex justify-content-end">Рейтинг: {{$x->rate}}</strong>
                                <h3 class="mb-0">{{$x->name}}</h3>
                                <div class="stars mb-3">
                                    @for($i=0; $i < $x->stars; $i++)
                                        <div class="in-block">
                                            <v-icon color="orange">mdi-star-outline</v-icon>
                                        </div>
                                    @endfor
                                </div>
                                <p class="card-text mb-3">{{$x->description}}</p>
                                <div class="d-flex justify-content-end">
                                    <div class="in-block mr-2">
                                        @if(Auth::check())
                                            @if(Auth::user()->favorites()->where('apartment_id',$x->id)->exists())
                                                <v-btn href="{{route('favorite.remove',$x->id)}}" text>
                                                    <v-icon>mdi-heart</v-icon>
                                                </v-btn>
                                            @else
                                                <v-btn href="{{route('favorite.add',$x->id)}}" text>
                                                    <v-icon>mdi-heart-outline</v-icon>
                                                </v-btn>
                                            @endif
                                        @else
                                            <v-btn href="{{route('favorite.add',$x->id)}}" text>
                                                <v-icon>mdi-heart-outline</v-icon>
                                            </v-btn>
                                        @endif
                                    </div>
                                    <div class="in-block">
                                        <v-btn color="black" href="{{route('show',$x->id)}}" outlined target="_blank">Переглянути</v-btn>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </main>
@endsection
