@extends('home_'.ucfirst(\Auth::user()->role))
@section('content1')
<div class="container">
    <form method="post" action="/markAbsence/{{$id}}">
        {{csrf_field()}}
        <table class="table">
            <thead class="table table-striped table-dark">
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">massar</th>
                    <th scope="col">name</th>
                    <th scope="col">absence</th>
                </tr>
            </thead>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->massar}}</td>
                <td>{{$student->name}}</td>
                <td><input type="checkbox" id="row-1-age" name="absence[]" value="{{$student->id}}"></td>
            </tr>
            @endforeach
        </table>
        <input type="submit" name="submit" value="submit">
    </form>

</div>
@endsection