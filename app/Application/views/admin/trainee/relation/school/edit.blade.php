		<div class="form-group {{ $errors->has("school") ? "has-error" : "" }}">
			<label for="school">{{ trans( "school.school") }}</label>
			@php $schools = App\Application\Model\School::pluck("name" ,"id")->all()  @endphp
			@php  $school_id = isset($item) ? $item->school_id : null @endphp
			<select name="school_id"  class="form-control" >
			@foreach( $schools as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $school_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("school"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("school") }}</strong>
					</span>
				</div>
			@endif
			</div>
