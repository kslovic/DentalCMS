@extends('layouts.app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Pregled termina
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i> <a href="{{url("/")}}">DentalCMS</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>
                            <small>Pregled termina</small>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <h3>Pretraga</h3>
            <hr>

            <div class="container-fluid">
                <div class="row">
                    <form class="form-horizontal" method="post" action="{{url("/sessionschedule")}}">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <label class="control-label col-sm-2" for="date">
                                Unesite datum
                            </label>
                            <div class="col-sm-3">
                                <input class="form-control input-append date form_datetime2" name="date"
                                       placeholder="Unesite datum" type="text"/>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-primary mt-2" name="submit" type="submit">
                                    Potvrdi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row result-list">
                <section class="content">
                    <div class="col-md-12">
                        <div class="table-container">
                            <h3>Rezultati pretrage: <small>(Navedeni datum)</small></h3>

                            <table class="table table-filter">
                                <tbody>
                                @foreach($sessionlist as $sessionitem)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <a href="#" class="pull-left">
                                                <img src="http://via.placeholder.com/128x128" class="media-photo">
                                            </a>
                                            <div class="media-body">
                                                <span class="pull-right-md">Vrijeme termina: {{$sessionitem->s_date}}</span>
                                                <br class="hide-md">
                                                <h4 class="title">
                                                    {{$sessionitem->name}}
                                                    {{$sessionitem->lname}}
                                                </h4>
                                                <p class="summary"><strong>Opis: </strong>{{$sessionitem->description}}</p>
                                            </div>
                                            <button class="pull-right btn btn-primary" name="submit" type="submit">
                                                        <span
                                                                class="pull-right-md">Izmjeni termin</span>
                                            </button>
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
@endsection