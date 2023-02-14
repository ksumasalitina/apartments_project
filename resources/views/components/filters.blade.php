@section('filters')
    <div class="p-3 w-75 center-box marg-b-10">
        <form action="{{route('filter')}}" method="GET">
            @csrf
            <v-row>
                <v-col cols="5">
                    <p><b>Сортувати</b></p>
                    <v-radio-group name="sort">
                        <v-radio label="Ціна (за спаданням)" value="price-descending"></v-radio>
                        <v-radio label="Ціна (за зростанням)" value="price-ascending"></v-radio>
                        <v-radio label="Кільсть зірок" value="stars"></v-radio>
                        <v-radio label="Рейтинг" value="rate"></v-radio>
                        <v-radio label="Розташування" value="location"></v-radio>
                        <v-radio label="Чистота" value="clean"></v-radio>
                        <v-radio label="Комфорт" value="comfort"></v-radio>
                        <v-radio label="Обслуговування" value="staff"></v-radio>
                    </v-radio-group>
                </v-col>
                <v-col></v-col>
                <v-col cols="6">
                    <p align="end"><b>Фільтри</b></p>
                    <v-range-slider
                        label="Ціна"
                        v-model="price"
                        @input="filter"
                        min="{{$apartments->min('price')}}"
                        max="{{$apartments->max('price')}}"
                        thumb-label="always"
                        class="mt-4"
                    ></v-range-slider>
                    <input type="hidden" name="price" id="price">
                    <v-slider
                        label="Мінімальний рейтинг"
                        v-model="rate"
                        @input="filter"
                        max="10"
                        min="1"
                        thumb-label="always"
                        class="mt-3"
                    ></v-slider>
                    <input type="hidden" name="rate" id="rate">
                    <v-slider
                        label="Кількість зірок"
                        @input="filter"
                        v-model="stars"
                        max="5"
                        min="1"
                        thumb-label="always"
                        class="mt-4"
                    ></v-slider>
                    <input type="hidden" name="stars" id="stars">
                    <v-btn type="submit" color="blue" outlined class="filter-btn">Застосувати фільтри</v-btn>
                </v-col>
            </v-row>
        </form>
    </div>
@show
