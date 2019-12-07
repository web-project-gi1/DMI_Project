@extends('home_Admin')

@section('content')
<div class="container">
    <h1>filieres list of Mathematics and Computer Science Department:</h1>
    <ul>
    @foreach($filieres as $filiere)
    <li><a href="#">{{$filiere->name}}</a></li>
    @endforeach
    </ul>
</div>
@endsection