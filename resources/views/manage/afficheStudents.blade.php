@extends('home_'.ucfirst(\Auth::user()->role))
@section('content1')
<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#id</th>
                <th scope="col">massar</th>
                <th scope="col">name</th>
                <th scope="col">level</th>
            </tr>
        </thead>
        @foreach($students as $student)
        <tr>
            <th scope="row">{{$student->id}}</th>
            <td>{{$student->massar}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->level}}</td>
        </tr>
        @endforeach
    </table>
    <a class="btn btn-warning" href="{{route('export') }}"> Export students liste</a>
</div>
@endsection