@section('sidebar-search')
    <div class="ml-20">
        <v-card width="256" class="mx-auto" shaped style="border: 1px solid #6a1a21">
            <v-navigation-drawer permanent>
                <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title class="text-h6">
                            Знайти житло
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>
                <form action="{{route('find')}}" method="GET">
                    @csrf
                    <v-list dense nav>
                        <v-list-item>
                            <v-list-item-content>
                                <select class="find-form form-select" name="city">
                                    <option disabled selected>Куди їдемо</option>
                                    @foreach($cities as $c)
                                        <option value="{{$c->id}}">{{$c->city}}</option>
                                    @endforeach
                                </select>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                <input type="text" placeholder="З"  class="find-form" id="startDate" name="startDate">
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                <input type="text" placeholder="По" class="find-form" name="endDate" id="endDate">
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                <select class="find-form form-select" name="people">
                                    <option selected disabled>Людей</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-btn type="submit" color="black" outlined>Пошук</v-btn>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                @error('city')
                                <p class="text-danger center-text">{{$message}}</p>
                                @enderror
                                @error('startDate')
                                <p class="text-danger center-text">{{$message}}</p>
                                @enderror
                                @error('endDate')
                                <p class="text-danger center-text">{{$message}}</p>
                                @enderror
                                @error('people')
                                <p class="text-danger center-text">{{$message}}</p>
                                @enderror
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </form>
            </v-navigation-drawer>
        </v-card>
    </div>
@show

