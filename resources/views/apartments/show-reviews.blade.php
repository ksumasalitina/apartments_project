@section('reviews')
    <div id="reviews" class="mt-10" style="margin-left: 30px">
        <h3>Відгуки гостей</h3>
        <div class="mt-3">
            <div class="in-block">
                <h3 class="rounded-2 rate-number">{{$apartment->rate}}</h3>
            </div>
            <div class="in-block">
                <a><h5>- {{count($apartment->reviews)}} відгуків </h5></a>
            </div>
        </div>

        <div class="mt-5">
            <v-row>
                <v-col>
                    <div>
                        <p class="in-block">Чистота</p>
                        <div class="in-block w-75 ml-2">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                     style="width: {{$apartment->clean/10*100}}%" aria-valuenow="{{$apartment->clean}}"
                                     aria-valuemin="0" aria-valuemax="10">
                                    {{$apartment->clean}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="in-block">Персонал</p>
                        <div class="in-block w-75 ml-2">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                     style="width: {{$apartment->staff/10*100}}%" aria-valuenow="{{$apartment->staff}}"
                                     aria-valuemin="0" aria-valuemax="10">
                                    {{$apartment->staff}}
                                </div>
                            </div>
                        </div>
                    </div>
                </v-col>
                <v-col>
                    <div>
                        <p class="in-block">Комфорт</p>
                        <div class="in-block w-75 ml-2">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                     style="width: {{$apartment->comfort/10*100}}%"
                                     aria-valuenow="{{$apartment->comfort}}" aria-valuemin="0" aria-valuemax="10">
                                    {{$apartment->comfort}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="in-block">Розташування</p>
                        <div class="in-block w-75 ml-2">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                     style="width: {{$apartment->location/10*100}}%"
                                     aria-valuenow="{{$apartment->location}}" aria-valuemin="0" aria-valuemax="10">
                                    {{$apartment->location}}
                                </div>
                            </div>
                        </div>
                    </div>
                </v-col>
            </v-row>

            <v-btn small color="black" text>Переглянути усі відгуки</v-btn>
            <div class="center-box w-75 mt-7 scrollmenu mb-7">
                @foreach($apartment->reviews->take(6) as $review)
                    <div class="in-block mr-2 ml-2">
                        <v-row>
                            <v-col>
                                <v-card width="300" height="200" elevation="4">
                                    <v-card-title>
                                        <v-avatar color="warning lighten-2" size="40">
                                            <span>{{substr($review->user->first_name,0,1)}}{{substr($review->user->last_name,0,1)}}</span>
                                        </v-avatar>
                                        <h4 class="ml-3 mt-4">{{$review->user->first_name}}<br>
                                            <p class="text--secondary"
                                               style="font-size: small">{{$review->user->nationality}}</p></h4>
                                    </v-card-title>
                                    <v-card-text class="text--primary"><p>{{$review->title}}</p></v-card-text>
                                </v-card>
                            </v-col>
                        </v-row>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@show
