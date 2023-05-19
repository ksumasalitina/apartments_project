@extends('layouts.app')

@section('title')
    Нове житло
@endsection

@section('content')
    <div>
        <h2 align="center">Нове житло</h2>
        <v-layout justify-center>
            <v-flex xs4>
                @include('apartment-user.apartment-errors')
                <form action="{{route('my-apartments.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12" id="marg-t-15">
                        <label for="name" class="form-label">Назва помекшкання *</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <select class="find-form form-select" id="type" name="type">
                            <option selected disabled>Оберіть тип *</option>
                            <option value="hotel">Готель</option>
                            <option value="hostel">Хостел</option>
                            <option value="flat">Квартира</option>
                        </select>
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <select class="find-form form-select" name="city_id">
                            <option selected disabled>Оберіть місто *</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->city}}</option>
                            @endforeach
                        </select>
                    </div>

                    <map-change></map-change>

                    <div class="col-12" id="marg-t-15">
                        <label for="street" class="form-label">Вулиця *</label>
                        <input type="text" class="form-control" id="street" name="street">
                    </div>

                    <div class="col-12 in-block" id="marg-t-15">
                        <label for="building" class="form-label">Номер будинку *</label>
                        <input type="text" class="form-control" id="building" name="building">
                    </div>

                    <div class="col-12 in-block" id="marg-t-15">
                        <label for="postcode" class="form-label">Індекс *</label>
                        <input type="text" class="form-control" id="postcode" name="postcode">
                    </div>

                    <div id="map"></div>

                    <div class="col-12" id="marg-t-15">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <select class="find-form form-select" name="stars">
                            <option selected disabled>Кількість зірок *</option>
                            @for($i = 1; $i <= 5; $i++)
                               <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-12" id="marg-t-15">
                        <label for="description" class="form-label">Опис *</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="col-12 mb-3" id="marg-t-15">
                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Виберіть зручності у помешканні *
                            </button>
                            <ul class="dropdown-menu">
                                @foreach($facilities as $facility)
                                    <li>
                                        <input type="checkbox" id="facility" @input="addFacility({{$facility->id}})"/>
                                        <label for="facility">{{$facility->name}}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <input type="hidden" v-model="facilities" name="facilities">
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Оберіть 3 зображення *</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="image_1">
                        <input class="form-control" type="file" id="formFileMultiple" name="image_2">
                        <input class="form-control" type="file" id="formFileMultiple" name="image_3">
                    </div>

                    <v-btn color="yellow" type="submit">Зберегти</v-btn>
                </form>
            </v-flex>
        </v-layout>
    </div>
@endsection

<script>
    import MapChange from "../../js/components/MapChange";

    export default {
        components: {MapChange}
    }
</script>
