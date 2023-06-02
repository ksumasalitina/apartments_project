@extends('layouts.app')

@section('title')
    Пошук супутників
@endsection

@section('content')
    <main class="d-flex flex-nowrap">
        @include('components.search-sidebar')
        <div>
            <p class="mb-2 marg-l-4 find-heading">Зараз {{count($users)}} користувачів шукають супутників</p>

        @foreach($users as $user)
            <div class="p-3 center-box" style="margin-left: 10%; width: 700px">
                <div
                    class="row g-0 rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative hotel-box-border">
                    <div class="col-auto d-flex align-items-center">
                        @isset($review->user->avatar)
                            <v-avatar size="80">
                                <img src="{{Storage::url('avatars/'.$user->avatar)}}" alt="Profile avatar">
                            </v-avatar>
                        @else
                            <v-avatar color="warning lighten-2" size="80">
                                <span>{{mb_substr($user->first_name,0,1,'UTF-8')}}{{mb_substr($user->last_name,0,1,'UTF-8')}}</span>
                            </v-avatar>
                        @endisset
                    </div>
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0">{{$user->first_name}} {{$user->last_name}}</h3>
                        <div class="stars mb-3">
                            {{$user->nationality}}
                        </div>
                        <p class="card-text mb-3">{{$user->message}}</p>
                        <div class="d-flex justify-content-end">
                            <div class="in-block">
                                <v-btn color="black" href="{{route('show.user',$user->id)}}" outlined>Переглянути профіль</v-btn>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
        </div>
@endsection
