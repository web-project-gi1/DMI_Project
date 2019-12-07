@extends('home_'.ucfirst(\Auth::user()->role))
@section('content1')
<div class="container">
    <form method="post" action="/AddExamMark/{{$id}}">
        {{csrf_field()}}
        <table class="table">
            <thead class="table table-striped table-dark">
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">massar</th>
                    <th scope="col">name</th>
                    <th scope="col">Exam Mark</th>
                </tr>
            </thead>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->massar}}</td>
                <td>{{$student->name}}</td>
                <td><input type="text" id="row-1-age" name="Mark[]">
                    <input type="hidden" name="student[]" value="{{$student->id}}"></td>
            </tr>
            @endforeach
        </table>
        <input type="submit" name="submit" value="submit">
    </form>

</div>
@endsection