@extends('layouts.app')

@section('content')
    <div id="page-wrapper">
        @foreach($patients as $patient)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Podatci pacijenta:
                            <small>{{$patient->name}}</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i> <a href="{{url("/")}}">DentalCMS</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>
                                <small>Profil pacijenta</small>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-xs-12 col-sm-10">


                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Info</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-3 " align="center"><img alt="Avatar"
                                                                                    src="http://via.placeholder.com/300x300"
                                                                                    class="img-circle img-responsive">
                                </div>
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>Ime</td>
                                            <td>{{$patient->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Prezime</td>
                                            <td>{{$patient->lname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$patient->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Broj telefona</td>
                                            <td>{{$patient->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Opis zahvata</td>
                                            <td>
                                                <ul class="list-group">
                                                    @foreach($sessionlist as $sessionitem)
                                                        <li class="list-group-item">{{$sessionitem->description}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <form class="form-horizontal" method="post" action="{{url("/editpatientform")}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value={{$patient->id}} />
                                        <button class="pull-right btn btn-primary" name="submit" type="submit">
                                                        <span
                                                                class="pull-right-md">Izmjeni podatke</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            {{--<div class="container-fluid">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                            {{--<form class="form-horizontal" method="post">--}}
                            {{--<div class="form-group ">--}}
                            {{--<label class="control-label col-sm-3" for="name">--}}
                            {{--Ime--}}
                            {{--</label>--}}
                            {{--<div class="col-sm-9">--}}
                            {{--<p>Anal mandica</p>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group ">--}}
                            {{--<label class="control-label col-sm-3" for="lastname">--}}
                            {{--Prezime--}}
                            {{--</label>--}}
                            {{--<div class="col-sm-9">--}}
                            {{--<input class="form-control" name="lastname" type="text"/>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group ">--}}
                            {{--<label class="control-label col-sm-3 requiredField" for="email">--}}
                            {{--Email--}}
                            {{--</label>--}}
                            {{--<div class="col-sm-9">--}}
                            {{--<input class="form-control" name="email" type="text"/>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group ">--}}
                            {{--<label class="control-label col-sm-3" for="phone">--}}
                            {{--Broj telefona--}}
                            {{--</label>--}}
                            {{--<div class="col-sm-9">--}}
                            {{--<input class="form-control" name="phone" type="text"/>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<div class="col-sm-10 col-sm-offset-3">--}}
                            {{--<button class="btn btn-primary " name="submit" type="submit">--}}
                            {{--Izmijeni podatke--}}
                            {{--</button>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</form>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                        </div>
                    @endforeach
                    <!-- /#page-wrapper -->
                    </div>
@endsection