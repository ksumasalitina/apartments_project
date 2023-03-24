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
                    @if(Auth::check())
                    @if(Auth::user()->favorites()->where('apartment_id',$apartment->id)->exists())
                        <a class="d-flex justify-content-end link-none" href="{{route('favorite.remove',$apartment->id)}}">
                            <v-icon>mdi-heart</v-icon>
                        </a>
                    @else
                        <a class="d-flex justify-content-end link-none" href="{{route('favorite.add',$apartment->id)}}">
                            <v-icon>mdi-heart-outline</v-icon>
                        </a>
                    @endif
                    @else
                        <a class="d-flex justify-content-end link-none" href="{{route('favorite.add',$apartment->id)}}">
                            <v-icon>mdi-heart-outline</v-icon>
                        </a>
                    @endif
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
                    <google-map latitude="{{$apartment->latitude}}" longitude="{{$apartment->longitude}}"></google-map>
                    <div class="mt-7">
                        <v-btn class="in-block mr-2" color="blue" href="#rooms" outlined>Переглянути номери</v-btn>
                        <v-btn class="in-block" color="black" href="#reviews" outlined>Відгуки</v-btn>
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

    <div class="d-flex flex-nowrap mt-5">
        <div class="ml-20">
            <form class="mb-6 mt-5" action="{{route('show',$apartment->id)}}" method="GET">
                @csrf
                <v-card elevation="0" style="border: 0.5px solid black">
                    <v-card-text class="center-box w-100">
                        <v-row>
                            <v-col>
                                <h6 class="text--primary text-h6">Дати подорожі:</h6>
                            </v-col>
                            <v-col>
                                <input value="{{\Illuminate\Support\Facades\Session::get('start_date')}}" type="text"
                                       id="startDateChange" name="startDate" class="find-form w-100" placeholder="З"/>
                            </v-col>
                            <v-col>
                                <input value="{{\Illuminate\Support\Facades\Session::get('end_date')}}" type="text"
                                       id="endDateChange" name="endDate" class="find-form w-100" placeholder="По"/>
                            </v-col>
                            <v-col>
                                <v-btn type="submit" color="red">Змінити дати</v-btn>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </form>
            @include('apartments.show-rooms')
        </div>
        <v-navigation-drawer right style="margin-left: 100px;">
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title class="text-h6">
                        Послуги та зручності
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-divider></v-divider>
            @foreach($apartment->facilities as $facility)
                <v-list-item>
                        <p ><v-icon>mdi-{{$facility->icon}}</v-icon> {{$facility->name}}</p>
                </v-list-item>
            @endforeach
        </v-navigation-drawer>
    </div>
    @include('apartments.show-reviews')
@endsection
<script>
    import GoogleMap from "../../js/components/GoogleMap";

    export default {
        components: {GoogleMap}
    }
</script>
