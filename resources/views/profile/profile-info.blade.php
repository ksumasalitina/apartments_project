@extends('layouts.app')

@section('title')
    Профіль
@endsection

@section('content')
    <main class="d-flex flex-nowrap">
        @include('profile.profile-sidebar')
        <form enctype="multipart/form-data" action="{{route('profile.update')}}" method="POST" class="marg-t-15" >
            @csrf
                <div class="center-box w-75">
                    <div>
                        @isset($user->avatar)
                            <img src="{{Storage::url('avatars/'.$user->avatar)}}" class="round" width="100px" height="100px" ref="avatar" alt="Profile avatar">
                                @else
                            <img src="{{asset('/img/no-avatar.png')}}" class="round" width="100px" height="100px" ref="avatar" alt="Profile avatar">
                        @endisset
                        <template>
                                <v-btn class="btn btn-light center-butt" @click="showAddAvatar">Змінити аватар
                                    <v-file-input

                                        @change="handleFileUpload"
                                        id="fileInput"
                                        style="display: none;"
                                        name="avatar"
                                    ></v-file-input>
                                </v-btn>
                            </template>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Імʼя</label>
                            <input type="text" class="form-control" id="firstName" name="first_name"
                                   value="{{$user->first_name}}" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Прізвище</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" value="{{$user->last_name}}">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="{{$user->email}}">
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Номер телефону</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Дата народження</label>
                            <input type="text" class="form-control" id="dob" name="dob" value="{{$user->dob}}">
                        </div>
                        <div class="col-12">
                            <label for="nationality" class="form-label">Національність</label>
                            <select class="form-control" name="nationality">
                                <option selected>{{$user->nationality}}</option>
                                @foreach($countries as $c)
                                    <option value="{{$c->name}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="is_companion" class="form-label">Шукаю супутника</label>
                            @if($user->is_companion == 0)
                            <input type="checkbox" id="is_companion" name="is_companion" value="1">
                            @else
                                <input type="checkbox" id="is_companion" name="is_companion" value="1" checked>
                            @endif
                        </div>
                        <div class="col-12">
                            <textarea type="checkbox" class="form-control" placeholder="Напишіть більше про те куди подорожуєте" name="message">{{$user->message}}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger" id="marg-t-15">Зберегти</button>
                    <span class="alert-danger">
                        @error('first_name')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                        @error('last_name')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                        @error('email')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                        @error('password')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                        @error('dob')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                        @error('nationality')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                        @error('phone')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                    </span>
                </div>
        </form>
    </main>
@endsection
