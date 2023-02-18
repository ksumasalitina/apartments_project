@section('rooms')
    @if($rooms)
        <div id="rooms">
            <h2 class="find-apart rooms-header" align="center">Доступні номери для бронювання:</h2>
            <div class="center-box w-75">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Тип</th>
                        <th scope="col">Ліжка</th>
                        <th scope="col">Кількість людей</th>
                        <th scope="col">Вартість за 1 ніч</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $r)
                        <tr>
                            <td>{{$r->description}}</td>
                            <td>{{$r->beds}}</td>
                            <td align="center">{{$r->people}}</td>
                            <td>{{$r->cost}}</td>
                            <td>
                                <v-btn color="red" outlined>Забронювати</v-btn>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h2 class="find-apart rooms-header" align="center"><em>Оберіть дати подорожі</em></h2>
    @endif
@show