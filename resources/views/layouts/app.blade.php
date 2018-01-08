<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DentalCMS v0.1</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">DentalCMS <small class="text-danger">v0.1</small></a>
        </div>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                @guest
                    <li {{{ (Request::is('/') ? 'class=active' : '') }}}>
                        <a href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> Prijava</a>
                    </li>
                @else
                    <li {{{ (Request::is('/') ? 'class=active' : '') }}}>
                        <a href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> Današnji termini</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#termini"><i
                                    class="fa fa-fw fa-clock-o"></i> Termini<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="termini" class="collapse">
                            {{--<li>--}}
                                {{--<a href="{{url("/addsessionform")}}"><i--}}
                                            {{--class="fa fa-fw fa-calendar-check-o"></i> Rezerviraj termin</a>--}}
                            {{--</li>--}}
                            <li>
                                <a href="{{url("/sessionschedule")}}"><i
                                            class="fa fa-fw fa-calendar"></i> Pregled termina</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#pacijenti"><i
                                    class="fa fa-fw fa-users"></i> Pacijenti<i
                                    class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="pacijenti" class="collapse">
                            <li>
                                <a href="{{url("/addpatientform")}}"><i
                                            class="fa fa-fw fa-address-card-o"></i> Dodaj novog pacijenta</a>
                            </li>
                            <li>
                                <a href="{{url("/patientlist")}}"><i
                                            class="fa fa-fw fa-list"></i> Popis pacijenata</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#korisnik"><i
                                    class="fa fa-fw fa-user"></i> Korisnik<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="korisnik" class="collapse">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i
                                            class="fa fa-fw fa-sign-out"></i>
                                    Odjava
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    @yield('content')

</div>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
