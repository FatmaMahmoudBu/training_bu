		<div class="form-group {{ $errors->has("supervisor") ? "has-error" : "" }}">
			<label for="supervisor">{{ trans( "supervisor.supervisor") }}</label>
			@php $supervisors = App\Application\Model\Supervisor::pluck("name" ,"id")->all()  @endphp
			@php  $supervisor_id = isset($item) ? $item->supervisor_id : null @endphp
			<select name="supervisor_id"  class="form-control" >
			@foreach( $supervisors as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $supervisor_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("supervisor"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("supervisor") }}</strong>
					</span>
				</div>
			@endif
			</div>
