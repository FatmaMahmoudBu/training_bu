		<div class="form-group {{ $errors->has("faculty") ? "has-error" : "" }}">
			<label for="faculty">{{ trans( "faculty.faculty") }}</label>
			@php $faculties = App\Application\Model\Faculty::pluck("name" ,"id")->all()  @endphp
			@php  $faculty_id = isset($item) ? $item->faculty_id : null @endphp
			<select name="faculty_id"  class="form-control" >
			@foreach( $faculties as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $faculty_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("faculty"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("faculty") }}</strong>
					</span>
				</div>
			@endif
			</div>
