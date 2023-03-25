@extends('layouts.app')

@section('title')
    Вхід
@endsection

@section('content')
    <v-app>
        <v-main>
            <v-container>
                <v-layout align-center justify-center>
                    <v-flex xs12 sm8 md4>
                        <v-card class="elevation-12">
                            <v-toolbar>
                                <v-toolbar-title>Відновлення паролю</v-toolbar-title>
                            </v-toolbar>
                            <v-card-text>
                            <span class="alert-danger">
                        @error('email')
                            <p class="text-danger center-text">{{$message}}</p>
                        @enderror
                            </span>
                                <form action="{{route('reset-password')}}" method="POST">
                                    @csrf
                                    <v-text-field
                                        label="Email"
                                        type="email"
                                        name="email"
                                        required
                                    ></v-text-field>
                                    <v-btn type="submit" dark class="mt-4" color="#b32d2e" width="100%">
                                        Відправити
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
