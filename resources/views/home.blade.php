@extends('layouts.app')

@section('content')
<div class="container">
                @foreach ($sessions as $dental_session)
                    <table>
                        <thead>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Description</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$dental_session->name }}</td>
                            <td>{{$dental_session->s_date }}</td>
                            <td>{{$dental_session->description }}</td>
                        </tr>
                        </tbody>
                    </table>
                @endforeach
</div>
@endsection
