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
                        <form class="form-horizontal" method="post">
                            <div class="form-group ">
                                <label class="control-label col-sm-3" for="id">
                                    Id pacijenta
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="id" type="number"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 requiredField" for="date" >
                                    Datum i vrijeme
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control input-append date form_datetime" name="date" placeholder="Kliki ovdje za dodati datum"
                                           type="text"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 requiredField" for="date" >
                                    Opis zahvata
                                </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" cols="40"name="textarea" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-3">
                                    <button class="btn btn-primary " name="submit" type="submit">
                                        Potvrdi
                                    </button>
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