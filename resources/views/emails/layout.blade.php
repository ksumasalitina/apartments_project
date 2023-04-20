<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    --}}
    <style>
        .rows{
            background: #ffe4e1;
        }
        .footer{
            color: darkred;
            text-align: center;
        }
        .image{
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<h1 class="header_text" style="color: #6a1a21">APARTments.ua</h1>
<div id="app">
    @yield('content')
</div>
</body>
</html>
