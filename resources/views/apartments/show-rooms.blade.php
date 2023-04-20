@section('rooms')
    @if($rooms)
        @if(count($rooms)==0)
            <div class="alert alert-danger w-75 center-box">
                <p align="center">Нажаль, вільних номерів за обраними датами немає :(</p>
            </div>
        @else
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
                                <v-btn href="{{route('booking.page',$r->id)}}" color="red" outlined>Забронювати</v-btn>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    @else
        <div class="alert alert-info w-75 center-box">
            <p align="center">Щоб переглянути доступні номери, оберіть дати подорожі</p>
        </div>
    @endif
@show
