@extends('layouts.app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Današnji termini
                        <br class="hide-md">
                        <small>{{date("d/m/Y")}}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="{{url("/")}}">DentalCMS</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>
                            <small>Današnji termini</small>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <section class="content">
                    <div class="col-md-12">
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>
                                @foreach($sessions as $sessionitem)
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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection


{{--@section('content')--}}
{{--<div class="container">--}}
{{--@foreach ($sessions as $dental_session)--}}
{{--<table>--}}
{{--<thead>--}}
{{--<th>Name</th>--}}
{{--<th>Date</th>--}}
{{--<th>Description</th>--}}
{{--</thead>--}}
{{--<tbody>--}}
{{--<tr>--}}
{{--<td>{{$dental_session->name }}</td>--}}
{{--<td>{{$dental_session->s_date }}</td>--}}
{{--<td>{{$dental_session->description }}</td>--}}
{{--</tr>--}}
{{--</tbody>--}}
{{--</table>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--@endsection--}}
