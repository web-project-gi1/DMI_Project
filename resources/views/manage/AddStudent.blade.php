@extends('home_Admin')

@section('content')
<div class="container">
    <form action="/AddStudent" method="POST">
        {{csrf_field()}}

        <div class="form-group">
            <label for="usr">name:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="usr">Massar:</label>
            <input type="text" name="massar" class="form-control">
        </div>
        <div class="form-group">
            <label for="usr">Level:</label>
            <select name="level" class="form-control">
                <option value="">--Please choose a level--</option>
                @foreach($filiere as $val)
                    @for($i=2;$i<=$val->nb_semestre;$i+=2)
                        <option value="{{$val->code}} {{$i/2}}">{{$val->code}}{{$i/2}}</option>
                    @endfor
                @endforeach
            </select>
        </div>
        <br>
        <input type="submit" value="Add Student" class="btn btn-primary">
    </form>
</div>
@endsection