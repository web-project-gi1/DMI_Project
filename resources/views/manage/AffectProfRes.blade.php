@extends('home_Chef_fil')
@section('content1')
<div class="container">
	<form method="POST" action="{{ route('AffectProfRes') }}">
		{{ csrf_field()}}
		@foreach($modules as $module)
		<div class="form-groupe">
			<label>- {{$module->name}}</label>
			<input type="hidden" name="module[]" value="{{$module->id}}">
			<select class="selectpicker" data-live-search="true" name="resp[]">
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