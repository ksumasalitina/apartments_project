@extends('layouts.app')

@section('title')
    Головна
@endsection

@section('content')
    <div>
        <div class="d-flex justify-content-center">
            <v-card width="70%" shaped style="border: 1px solid #6a1a21">
                <v-card-title>
                    Знайдіть житло для вашої подорожі!
                </v-card-title>

                <v-card-text>
                    <form class="col-md-15 text-center mt-5 d-flex flex-row justify-content-center" method="GET"
                          action="{{route('find')}}">
                        @csrf
                        <select class="find-form form-select marg-r-8" name="city">
                            <option disabled selected>Куди їдемо</option>
                            @foreach($cities as $c)
                                <option value="{{$c->id}}">{{$c->city}}</option>
                            @endforeach
                        </select>
                        <input type="text" placeholder="З" class="find-form marg-r-8" name="startDate"
                               id="startDate">
                        <input type="text" placeholder="По" class="find-form marg-r-8" name="endDate"
                               id="endDate">
                        <select class="find-form form-select marg-r-8" name="people">
                            <option selected disabled>Людей</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <v-btn type="submit" color="black" outlined>Пошук</v-btn>
                    </form>
                </v-card-text>

                <v-card-text>
                    <span class="alert-danger">
                        @error('city')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                        @error('startDate')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                        @error('endDate')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                        @error('people')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                    </span>
                </v-card-text>
            </v-card>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <v-btn href="{{route('search.random')}}" color="blue" text>Не знаєте куди поїхати? Довірте вибір нам!</v-btn>
    </div>

    <div class="marg-t-15">
        <p class="find-apart font-weight-medium" style="font-size: xx-large; margin-left: 10%">Найкращі пропозиції✨</p>
    </div>
    <div class="d-flex flex-nowrap ">
        <div class="d-flex flex-column flex-shrink-0 p-3 w-12 center-box marg-r-0">
            @foreach($cities as $c)
                <button class="btn btn-outline-dark marg-b-5 chooseCity"
                        @click="dropdown({{$c->id}})">{{$c->city}}</button>
            @endforeach
        </div>
        <div class="w-65 center-box">
            @foreach($apartments as $x)
                <div class="test {{$x->city_id}}">
                    <div class="p-3" style="width: 900px">
                        <div
                            class="row g-0 rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 marg-r-20 position-relative hotel-box-border">
                            <div class="col-auto d-flex align-items-center">
                                <v-carousel height="200" hide-delimiter-background :show-arrows="false"
                                            class="d-flex align-items-center">
                                    <v-carousel-item>
                                        <img src="{{$x->image_1}}" width="250" height="200" alt="Hotel photo"/>
                                    </v-carousel-item>
                                    <v-carousel-item>
                                        <img src="{{$x->image_2}}" width="250" height="200" alt="Hotel photo"/>
                                    </v-carousel-item>
                                    <v-carousel-item>
                                        <img src="{{$x->image_3}}" width="250" height="200" alt="Hotel photo"/>
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
    </div>
    </div>
@endsection
