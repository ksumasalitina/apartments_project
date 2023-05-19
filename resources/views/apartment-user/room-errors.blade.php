@section('errors')
    <span class="alert-danger">
    @error('number')
        <p class="text-danger center-text">{{$message}}</p>
    @enderror
    @error('people')
        <p class="text-danger center-text">{{$message}}</p>
    @enderror
    @error('floor')
        <p class="text-danger center-text">{{$message}}</p>
    @enderror
    @error('beds')
        <p class="text-danger center-text">{{$message}}</p>
    @enderror
    @error('cost')
        <p class="text-danger center-text">{{$message}}</p>
    @enderror
    @error('description')
        <p class="text-danger center-text">{{$message}}</p>
    @enderror
    </span>
@show
