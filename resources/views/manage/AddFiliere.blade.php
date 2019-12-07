@extends('home_Admin')

@section('content')
<section class="col-lg-10">
    <div class="container">
        <form action="/AddFiliere" method="POST">
        {{csrf_field()}}

            <div class="form-group">
                <label for="usr">Filiere name:</label>
                <input type="text" name="filiere_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="usr">Filiere code:</label>
                <input type="text" name="filiere_code" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="usr">Number of semestres:</label>
                <input type="text" name="nb_semestre" class="form-control" required>
            </div>
            <br>
            <input type="submit" value="Create Filiere" class="btn btn-primary">
        </form>
    </div>
</section>
@endsection