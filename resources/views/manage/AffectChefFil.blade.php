@extends('home_Chef_dep')
@section('content1')
<div class="container">
	<form method="POST" action="{{ route('AffectChefFil') }}">
		{{csrf_field()}}
		@foreach($filieres as $filiere)
		<div class="form-groupe">
			<label>- {{$filiere->name}}</label>
			<input type="hidden" name="filiere[]" value="{{$filiere->id}}">
			<select class="selectpicker" data-live-search="true" name="chef[]">
				<option selected>select a chef</option>
				@foreach($profs as $prof)
				<option value="{{$prof->id}}">{{$prof->name}}</option>
				@endforeach
			</select>
		</div>
		@endforeach
		<div class="row justify-content-center">
			<input type="submit" name="submit" value="submit" class="btn btn_primary">
		</div>
	</form>
</div>
@endsection