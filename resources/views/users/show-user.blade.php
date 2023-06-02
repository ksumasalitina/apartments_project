@extends('layouts.app')

@section('title')
    Пошук супутників
@endsection

@section('content')
    <main class="d-flex flex-nowrap">
        @include('components.search-sidebar')
        <div>
            <div class="center-box w-75">
                <div>
                    @isset($review->user->avatar)
                        <v-avatar size="80" class="round">
                            <img src="{{Storage::url('avatars/'.$user->avatar)}}" alt="Profile avatar">
                        </v-avatar>
                    @else
                        <v-avatar color="warning lighten-2" size="80" class="round">
                            <span>{{mb_substr($user->first_name,0,1,'UTF-8')}}{{mb_substr($user->last_name,0,1,'UTF-8')}}</span>
                        </v-avatar>
                    @endisset
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Імʼя</label>
                        <input type="text" class="form-control" id="firstName" name="first_name"
                               value="{{$user->first_name}}" required disabled>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Прізвище</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" value="{{$user->last_name}}" disabled>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="{{$user->email}}" disabled>
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label">Номер телефону</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}" disabled>
                    </div>
                    <div class="col-12">
                        <label for="nationality" class="form-label">Національність</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" value="{{$user->nationality}}" disabled>
                    </div>
                    <div class="col-12">
                        @isset($user->is_companion)
                            <p><b>Шукає супутника</b></p>
                            <p>{{$user->message}}</p>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
@endsection
