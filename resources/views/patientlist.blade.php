@extends('layouts.app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Lista pacijenata
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i> <a href="{{url("/")}}">DentalCMS</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>
                            <small>Lista pacijenata</small>
                        </li>
                    </ol>
                </div>
            </div>
            <hr>
            @if(isset($status))
                <div class="alert alert-success">
                    <strong>Pacijent uspiješno {{$status}}!</strong>
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <form class="form-horizontal" method="post" action="{{url("/patientlist")}}">
                            {{ csrf_field() }}
                            <div class="form-group ">
                                <label class="control-label col-sm-2" for="name">
                                    Ime
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" required/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-sm-2" for="lastname">
                                    Prezime
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="lastname" type="text" required/>
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4 col-sm-offset-8">
                                    <button class="btn btn-primary btn-block" name="submit" type="submit">
                                        Potvrdi
                                    </button>
                                </div>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if(isset($name)&&isset($lname))
            <h3>Pretraga: {{$name}} {{$lname}}</h3>
            @endif
            <div class="row">
                <section class="content">
                    <div class="col-md-12">
                        <div class="table-container">
                            <h3>Popis pacijenata</h3>
                            <table class="table table-filter">
                                <tbody>
                                @foreach($patients as $patient)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <a href="#" class="pull-left">
                                                <img src="http://via.placeholder.com/128x128" class="media-photo">
                                            </a>
                                            <div class="media-body">
                                                <form class="form-horizontal" method="post" action="{{url("/patientprofile")}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value={{$patient->id}} >
                                                    <button class="btn btn-primary pull-right-md" name="submit" type="submit">
                                                        <span
                                                                class="pull-right-md">Otvori za više detalja</span>
                                                    </button>
                                                </form>
                                                <form class="form-horizontal" method="post" action="{{url("/addsessionform")}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value={{$patient->id}} >
                                                    <button class="btn btn-primary pull-right-md" name="submit" type="submit">
                                                        <span
                                                                class="pull-right-md">Rezerviraj termin</span>
                                                    </button>
                                                </form>
                                                <br class="hide-md">
                                                <p class="summary"><strong>Ime: </strong>{{$patient->name}}</p>
                                                <p class="summary"><strong>Prezime: </strong>{{$patient->lname}}</p>
                                                <p class="summary"><strong>Email: </strong>{{$patient->email}}</p>
                                                <p class="summary"><strong>Broj telefona: </strong>{{$patient->phone}}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>

        </div>
        <!-- /#page-wrapper -->
    </div>
    @if(!isset($name)&&!isset($lname))
        <div align = "center">
            {{ $patients->links() }}
        </div>
    @endif
@endsection
