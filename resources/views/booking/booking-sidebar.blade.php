@section('sidebar')
    <div class="ml-20">
        <v-card  class="mx-auto" style="border: 0.5px solid #6a1a21">
            <v-navigation-drawer permanent>
                <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title class="text-h6">
                            Деталі подорожі
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <div class="p-2">
                    <v-row>
                        <v-col>
                            <b>Заїзд</b>
                            <h5>{{Session::get('start_date')}}</h5>
                        </v-col>
                        <v-col>
                            <b>Виїзд</b>
                            <h5>{{Session::get('end_date')}}</h5>
                        </v-col>
                    </v-row>
                </div>

                <div class="p-2">
                    <p>Загальний строк проживання:</p>
                    <b>{{Session::get('days')}} ночей</b>
                </div>
                <v-divider></v-divider>
                <div class="p-2">
                    <h5>1 номер для {{$people}} людей</h5>
                </div>
                <v-divider></v-divider>
                <div class="p-2">
                    <h5>До сплати: </h5>
                    <h5>{{$total}} UAH</h5>
                </div>
            </v-navigation-drawer>
        </v-card>
    </div>
@show

