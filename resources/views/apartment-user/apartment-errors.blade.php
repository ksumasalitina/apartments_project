@section('errors')
<span class="alert-danger">
    @error('name')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('type')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('city_id')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('building')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('street')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('postcode')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('email')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('stars')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('description')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('latitude')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('longitude')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    @error('image_1')
    <p class="text-danger center-text">{{$message}}</p>
    @enderror
    @error('image_2')
    <p class="text-danger center-text">{{$message}}</p>
    @enderror
    @error('image_3')
    <p class="text-danger center-text">{{$message}}</p>
    @enderror
</span>
@show
