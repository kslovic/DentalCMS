@extends('layouts.app')

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

      <div class="row">
          <div class="col-md-12">

            <h1 class="page-header">Postavke</h1>
            @if(isset($status))
                <div class="alert alert-success">
                    <strong>{{$status}}!</strong>
                </div>
            @endif
      </div>
    </div>


    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <form class="form-horizontal" method="post" action="{{url("/settingspost")}}">
              {{ csrf_field() }}
            <div class="form-group">
              <div class="col-sm-3">
                <label class="control-label" for="email">Email:</label>
              </div>
              <div class="col-sm-9">
                <input class="form-control" name="email" type="email" required value={{$config->email}} /><br>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label class="control-label requiredField" for="time">Vrijeme slanja obavijesti:</label>
              </div>
              <div class="col-sm-9">
                <input class="form-control" name="time" type="time" required value={{date("H:i",strtotime($config->time))}} />
              </div>
            </div>
              <div class="form-group">
                  <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <button class="btn btn-primary btn-block " name="submit" type="submit">
                            Potvrdi
                        </button>
                    </div>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>



  </div>
</div>
@endsection
