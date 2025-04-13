		<div class="form-group {{ $errors->has("trainee") ? "has-error" : "" }}">
			<label for="trainee">{{ trans( "trainee.trainee") }}</label>
			@php $trainees = App\Application\Model\Trainee::pluck("name" ,"id")->all()  @endphp
			@php  $trainee_id = isset($item) ? $item->trainee_id : null @endphp
			<select name="trainee_id"  class="form-control" >
			@foreach( $trainees as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $trainee_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("trainee"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("trainee") }}</strong>
					</span>
				</div>
			@endif
			</div>
