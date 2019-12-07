@extends('home_Chef_fil')
@section('content1')
<div class="container">
	<form method="POST" action="{{ route('AffectProfEns') }}">
		{{csrf_field()}}
		@foreach($elements_ens as $element_ens)
		<div class="form-groupe">
			<label>- {{$element_ens->name}}</label>
			<input type="hidden" name="element[]" value="{{$element_ens->id}}">
			<select class="selectpicker" data-live-search="true" name="ens[]">
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