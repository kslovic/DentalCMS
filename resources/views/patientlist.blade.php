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
            <!-- /.row -->

            <h3>Pretraga</h3>
            <hr>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <form class="form-horizontal" method="post">
                            <div class="form-group ">
                                <label class="control-label col-sm-2" for="name">
                                    Ime
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text"/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-sm-2" for="lastname">
                                    Prezime
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="lastname" type="text"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button class="btn btn-primary " name="submit" type="submit">
                                        Potvrdi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <section class="content">
                    <div class="col-md-12">
                        <div class="table-container">
                            <h3>Popis pacijenata</h3>
                            <table class="table table-filter">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <a href="#" class="pull-left">
                                                <img src="http://via.placeholder.com/128x128" class="media-photo">
                                            </a>
                                            <div class="media-body">
                                                <a href="{{url("/patientprofile")}}"><span
                                                            class="pull-right-md">Otvori za više detalja</span></a>
                                                <a href="#"><span
                                                            class="pull-right-md">Rezerviraj termin &nbsp;- &nbsp;</span></a>
                                                <br class="hide-md">
                                                <p class="summary"><strong>Ime: </strong></p>
                                                <p class="summary"><strong>Prezime: </strong></p>
                                                <p class="summary"><strong>Email: </strong></p>
                                                <p class="summary"><strong>Broj telefona: </strong></p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <a href="#" class="pull-left">
                                                <img src="http://via.placeholder.com/128x128" class="media-photo">
                                            </a>
                                            <div class="media-body">
                                                <a href="{{url("/patientprofile")}}"><span
                                                            class="pull-right-md">Otvori za više detalja</span></a>
                                                <a href="#"><span
                                                            class="pull-right-md">Rezerviraj termin &nbsp;- &nbsp;</span></a>
                                                <br class="hide-md">
                                                <p class="summary"><strong>Ime: </strong></p>
                                                <p class="summary"><strong>Prezime: </strong></p>
                                                <p class="summary"><strong>Email: </strong></p>
                                                <p class="summary"><strong>Broj telefona: </strong></p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <a href="#" class="pull-left">
                                                <img src="http://via.placeholder.com/128x128" class="media-photo">
                                            </a>
                                            <div class="media-body">
                                                <a href="{{url("/patientprofile")}}"><span
                                                            class="pull-right-md">Otvori za više detalja</span></a>
                                                <a href="#"><span
                                                            class="pull-right-md">Rezerviraj termin &nbsp;- &nbsp;</span></a>
                                                <br class="hide-md">
                                                <p class="summary"><strong>Ime: </strong></p>
                                                <p class="summary"><strong>Prezime: </strong></p>
                                                <p class="summary"><strong>Email: </strong></p>
                                                <p class="summary"><strong>Broj telefona: </strong></p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <a href="#" class="pull-left">
                                                <img src="http://via.placeholder.com/128x128" class="media-photo">
                                            </a>
                                            <div class="media-body">
                                                <a href="{{url("/patientprofile")}}"><span
                                                            class="pull-right-md">Otvori za više detalja</span></a>
                                                <a href="#"><span
                                                            class="pull-right-md">Rezerviraj termin &nbsp;- &nbsp;</span></a>
                                                <br class="hide-md">
                                                <p class="summary"><strong>Ime: </strong></p>
                                                <p class="summary"><strong>Prezime: </strong></p>
                                                <p class="summary"><strong>Email: </strong></p>
                                                <p class="summary"><strong>Broj telefona: </strong></p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <a href="#" class="pull-left">
                                                <img src="http://via.placeholder.com/128x128" class="media-photo">
                                            </a>
                                            <div class="media-body">
                                                <a href="{{url("/patientprofile")}}"><span
                                                            class="pull-right-md">Otvori za više detalja</span></a>
                                                <a href="#"><span
                                                            class="pull-right-md">Rezerviraj termin &nbsp;- &nbsp;</span></a>
                                                <br class="hide-md">
                                                <p class="summary"><strong>Ime: </strong></p>
                                                <p class="summary"><strong>Prezime: </strong></p>
                                                <p class="summary"><strong>Email: </strong></p>
                                                <p class="summary"><strong>Broj telefona: </strong></p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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