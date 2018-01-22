@extends('layouts.app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Rezerviraj termin
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i> <a href="{{url("/")}}">DentalCMS</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>
                            <small>Dodaj novi termin</small>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <form class="form-horizontal" method="post" action="{{url("/addsession")}}">
                            {{ csrf_field() }}
                                    <input class="form-control" name="id" type="hidden"
                                           @if(isset($id))
                                           value={{$id}}
                                            @endif
                                    />
                            <div class="form-group ">
                                <label class="control-label col-sm-3" for="name">
                                    Ime
                                </label>
                                <div class="col-sm-9">
                                    <label class="form-control">{{$name}}</label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-sm-3" for="lastname">
                                    Prezime
                                </label>
                                <div class="col-sm-9">
                                    <label class="form-control">{{$lname}}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 requiredField" for="date">
                                    Datum i vrijeme
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control input-append date form_datetime" name="date"
                                           placeholder="Kliki ovdje za dodati datum"
                                           type="text" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 requiredField" for="date">
                                    Opis zahvata
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" cols="40" name="description" rows="4" maxlength="2000"></textarea>
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
        <!-- /#page-wrapper -->
    </div>
@endsection
