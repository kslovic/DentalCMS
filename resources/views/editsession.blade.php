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
                            <small>Uredi termin</small>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            @foreach($session as $psession)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <form class="form-horizontal" method="post" action="{{url("/editsession")}}">
                            {{ csrf_field() }}
                            <input class="form-control" name="session_id" type="hidden"
                                   @if(isset($psession->id))
                                   value={{$psession->id}}
                                    @endif
                            />
                            @foreach($patient as $spatient)
                            <div class="form-group ">
                                <label class="control-label col-sm-3">
                                    Ime
                                </label>
                                <div class="col-sm-9">
                                    <label class="form-control">{{$spatient->name}}</label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-sm-3">
                                    Prezime
                                </label>
                                <div class="col-sm-9">
                                    <label class="form-control">{{$spatient->lname}}</label>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group">
                                <label class="control-label col-sm-3 requiredField" for="date">
                                    Datum i vrijeme
                                </label>
                                <div class="col-sm-9">
                                    <input name="date"
                                           placeholder="Kliki ovdje za dodati datum"
                                           type="datetime-local" value={{date("Y-m-d\TH:i:s", strtotime($psession->s_date))}} />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 requiredField" for="date">
                                    Opis zahvata
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" cols="40" name="description" rows="4" maxlength="2000">{{$psession->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <button class="btn btn-primary " name="submit" type="submit">
                                            Izmjeni
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" method="post" action="{{url("/deletesession")}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="session_id" value={{$psession->id}} />
                            <div class="col-sm-2 col-sm-offset-1">
                                <button class="btn btn-primary " name="submit" type="submit">
                                    Obriši termin
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection