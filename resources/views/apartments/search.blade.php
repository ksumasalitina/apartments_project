@extends('layouts.app')

@section('title')
    Пошук
@endsection

@section('content')
    <main class="d-flex flex-nowrap">
        @include('components.search-sidebar')
        <div class="p-3 ml-3" style="width: 90%">
            <form action="{{route('search')}}" method="GET">
                @csrf
                <v-row>
                    <v-col cols="10">
                        <v-text-field
                            label="Що бажаєте знайти?..."
                            prepend-inner-icon="mdi-magnify"
                            name="param"
                        ></v-text-field>
                    </v-col>
                    <v-col>
                        <v-btn type="submit" color="blue" outlined>Go</v-btn>
                    </v-col>
                </v-row>

            </form>
            @if(filled($apartments))
                <div class="w-65">
                    @foreach($apartments as $x)
                        <div class="test {{$x->city_id}}">
                            <div class="p-3" style="width: 900px">
                                <div
                                    class="row g-0 rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 marg-r-20 position-relative hotel-box-border">
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
                                                <v-btn color="black" outlined href="{{route('show',$x->id)}}">Переглянути</v-btn>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
@endsection
