<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
<v-app id="app">
    <v-app-bar height="auto" elevation="4" class="navbar navbar-expand-lg navbar-light bg-light container-header">
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
               <a href="/"><v-img src="{{asset('/img/logo.png')}}" max-width="250"></v-img></a>
            </div>
            <div style="margin-left: auto">
                <v-btn href="{{route('search')}}" color="blue" rounded outlined small><v-icon>mdi-magnify</v-icon> Пошук</v-btn>
                @auth("web")
                    <v-btn href="{{route('profile.show')}}" color="blue" text>Вітаємо, {{auth()->user()->first_name}}</v-btn>
                    <v-btn href="{{route('logout')}}" color="red" outlined>Вийти</v-btn>
                @endauth
                @guest("web")
                    <v-btn href="{{route('register-page')}}" target="_blank" color="red" outlined>Реєстарція</v-btn>
                    <v-btn href="{{route('login')}}" target="_blank" color="red" outlined>Вхід</v-btn>
                @endguest
            </div>
        </div>
    </v-app-bar>
    <v-main class="mt-5">
        <div id="app" style="min-height: 500px">
            @if ($message = Session::get('message'))
                <div class="alert alert-success w-75 center-box">
                    <p align="center">{{ $message }}</p>
                </div>
            @endif
            @yield('content')
        </div>
    </v-main>
    <v-footer padless color="white">
        <v-col class="text-center" cols="12">
            <p class="text-center text-muted">© 2023 Company, Inc</p>
        </v-col>
    </v-footer>
</v-app>
<script src="{{asset('/js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>
