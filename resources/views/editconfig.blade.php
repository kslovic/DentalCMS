@extends('layouts.app')

@section('content')
    <h1>Postavke</h1>
    @if(isset($status))
        <div class="alert alert-success">
            <strong>{{$status}}!</strong>
        </div>
    @endif
    <form class="form-horizontal" method="post" action="{{url("/settingspost")}}">
        {{ csrf_field() }}
        <label for="email">Email:</label>
        <input name="email" type="email" required value={{$config->email}} /><br>
        <label for="time">Vrijeme slanja obavijesti:</label>
        <input name="time" type="time" required value={{date("H:i",strtotime($config->time))}} />
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-3">
                <button class="btn btn-primary " name="submit" type="submit">
                    Potvrdi
                </button>
            </div>
        </div>
    </form>
@endsection