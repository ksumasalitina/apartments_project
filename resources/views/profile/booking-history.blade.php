@extends('layouts.app')

@section('title')
    Історія бронювань
@endsection

@section('content')
    <main class="d-flex flex-nowrap">
        @include('profile.profile-sidebar')
        <div class="w-75">
            @foreach($bookings as $b)
                @if($b->status=='processing')
                    @php($color = 'blue')
                @elseif($b->status=='confirmed')
                    @php($color = 'green')
                @elseif($b->status=='canceled')
                    @php($color = 'red')
                @else
                    @php($color = 'grey')
                @endif

                <div class="p-3 w-75 bg-light rounded-3 booked_box" style="border: 1px solid {{$color}}">
                    <v-row>
                        <v-col cols="5">
                            <img src="{{$b->apartment->image_1}}" width="280" height="220">
                        </v-col>
                        <v-col>
                            <div class="in-block">
                                <a style="color: black" href="{{route('show',$b->apartment_id)}}"><h2>{{$b->apartment->name}}</h2></a>
                                <b>Місто {{$b->apartment->city->city}}</b>
                                <p class="marg-b-1">{{date('d/m/Y', strtotime($b->check_in))}} <b>-</b> {{date('d/m/Y', strtotime($b->check_out))}}</p>
                                <b class="marg-b-1">Прізвище та імʼя: </b>{{$b->guest_lastname}} {{$b->guest_firstname}} <br/>
                                <b class="marg-b-1">Гостей: </b>{{$b->people}} <br/>

                                <p class="marg-b-1">Статус: <em style="color: {{$color}}">{{$b->status}}</em></p>

                                <h5 class="marg-b-1">Сума: {{$b->total}}</h5>
                            </div>
                        </v-col>
                    </v-row>


                    @if($b->status == "finished")
                        <div class="but_more mt-3">
                            <a href="" class="btn btn-outline-dark">Залишити відгук</a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </main>
@endsection
