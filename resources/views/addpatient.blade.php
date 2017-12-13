@extends('layouts.app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Dodaj novog pacijenta
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i> <a href="{{url("/")}}">DentalCMS</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>
                            <small>Dodaj novog pacijenta</small>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <form class="form-horizontal" method="post" action="{{url("/addpatient")}}">
                            {{ csrf_field() }}
                            <div class="form-group ">
                                <label class="control-label col-sm-3" for="name">
                                    Ime
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="name" type="text"/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-sm-3" for="lastname">
                                    Prezime
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="lastname" type="text"/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-sm-3 requiredField" for="email">
                                    Email
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="email" type="text"/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-sm-3" for="phone">
                                    Broj telefona
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="phone" type="text"/>
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