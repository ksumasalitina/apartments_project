@extends('layouts.app')

@section('title')
    Бронювання
@endsection

@section('content')
    <div class="p-3">
        <h2 class="mb-5">{{$apartment->name}}</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Номер</th>
                <th scope="col">Гість</th>
                <th scope="col">Дата заїзду</th>
                <th scope="col">Дата виїзду</th>
                <th scope="col">Кімната</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $i => $booking)
                @if($booking->status=='processing')
                    @php($color = 'blue')
                @elseif($booking->status=='confirmed')
                    @php($color = 'green')
                @elseif($booking->status=='canceled')
                    @php($color = 'red')
                @else
                    @php($color = 'grey')
                @endif
                <tr>
                    <td><b>{{$booking->id}}</b></td>
                    <td>{{$booking->guest_firstname}} {{$booking->guest_lastname}}</td>
                    <td><b>{{date_format(date_create($booking->check_in), 'd-m-Y')}}</b></td>
                    <td><b>{{date_format(date_create($booking->check_out), 'd-m-Y')}}</b></td>
                    <td>{{$booking->room->number}}</td>
                    <td><p style="color: {{$color}}">{{$booking->status}}</p></td>
                    <td>
                        <v-btn color="blue" dark data-bs-toggle="modal" data-bs-target="#bookingDetails-{{$i}}">
                            Переглянути
                        </v-btn>

                        <!-- Modal -->
                        <div class="modal fade" id="bookingDetails-{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Номер бронювання: {{$booking->id}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="border-0 table">
                                            <tbody>
                                                <tr>
                                                    <td><b>Імʼя</b></td>
                                                    <td>{{$booking->guest_firstname}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Прізвище</b></td>
                                                    <td>{{$booking->guest_lastname}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email</b></td>
                                                    <td>{{$booking->guest_email}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Дата заїзду</b></td>
                                                    <td>{{$booking->check_in}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Дата виїзду</b></td>
                                                    <td>{{$booking->check_out}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Кількість людей</b></td>
                                                    <td>{{$booking->people}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Приміщення</b></td>
                                                    <td>{{$apartment->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Кімната</b></td>
                                                    <td>{{$booking->room->number}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Сума</b></td>
                                                    <td>{{$booking->total}} UAH</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Статус</b></td>
                                                    <td>{{$booking->status}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{route('booking.update.status',$booking->id)}}">
                                            @csrf
                                            <input type="hidden" name="status" v-model="booking_status">
                                            <v-btn type="submit" color="yellow" @click="booking_status='finished'">Завершити</v-btn>
                                            <v-btn type="submit" color="red" dark @click="booking_status='canceled'">Скасувати</v-btn>
                                            <v-btn type="submit" color="green" dark @click="booking_status='confirmed'">Підтвердити</v-btn>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
