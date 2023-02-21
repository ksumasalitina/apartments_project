@section('rooms')
    @if($rooms)
        <div id="rooms" style="margin-top: 5%">
            <h2 class="find-apart rooms-header">Доступні номери для бронювання:</h2>
            <div >
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
        <h2 class="find-apart rooms-header"><em>Оберіть дати подорожі</em></h2>
    @endif
@show
