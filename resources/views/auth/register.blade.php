@extends('layouts.app')

@section('title')
    Реєстрація
@endsection

@section('content')
    <v-app>
        <v-main>
            <v-container>
                <v-layout align-center justify-center>
                    <v-flex xs12 sm8 md4>
                        <v-card class="elevation-12 mb-5">
                            <v-toolbar dark color="#b32d2e">
                                <v-toolbar-title>Реєстрація</v-toolbar-title>
                            </v-toolbar>
                            <v-card-text>
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
                                <form action="{{route('register')}}" method="POST">
                                    @csrf
                                    <v-text-field
                                        label="Імʼя *"
                                        type="text"
                                        name="first_name"
                                        required
                                    ></v-text-field>

                                    <v-text-field
                                        label="Прізвище *"
                                        type="text"
                                        name="last_name"
                                        required
                                    ></v-text-field>

                                    <v-text-field
                                        label="Email *"
                                        type="email"
                                        name="email"
                                        required
                                    ></v-text-field>

                                    <v-text-field
                                        label="Пароль *"
                                        type="password"
                                        name="password"
                                        required
                                    ></v-text-field>

                                    <v-text-field
                                        label="Підтвердіть пароль *"
                                        type="password"
                                        name="password_confirmation"
                                        required
                                    ></v-text-field>

                                    <v-text-field
                                        label="Номер телефону *"
                                        type="text"
                                        name="phone"
                                        required
                                    ></v-text-field>

                                    <input
                                        placeholder="Дата народження *"
                                        type="text"
                                        class="w-100 mb-8 mt-5 dob"
                                        name="dob"
                                        id="dob"
                                        required
                                    />

                                    <select class="find-form form-select" name="nationality">
                                        <option disabled selected>Національність *</option>
                                        @foreach($countries as $c)
                                            <option value="{{$c->name}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>

                                    <v-btn type="submit" dark class="mt-4" color="#b32d2e" width="100%">
                                        Зареєструватися
                                    </v-btn>

                                    <v-btn color="#b32d2e" text width="100%" href="{{route('login')}}">
                                        В мене вже є аккаунт
                                    </v-btn>
                                </form>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-main>
    </v-app>
@endsection
