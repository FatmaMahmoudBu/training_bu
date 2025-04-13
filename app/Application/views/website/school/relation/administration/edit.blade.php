		<div class="form-group {{ $errors->has("administration") ? "has-error" : "" }}">
			<label for="administration">{{ trans( "administration.administration") }}</label>
			@php $administrations = App\Application\Model\Administration::pluck("name" ,"id")->all()  @endphp
			@php  $administration_id = isset($item) ? $item->administration_id : null @endphp
			<select name="administration_id"  class="form-control" >
			@foreach( $administrations as $key => $relatedItem)
			<option value="{{ $key }}"  {{ $key == $administration_id  ? "selected" : "" }}> {{ is_json($relatedItem) ? getDefaultValueKey($relatedItem) :  $relatedItem}}</option>
			@endforeach
			</select>
			@if ($errors->has("administration"))
				<div class="alert alert-danger">
					<span class="help-block">
						<strong>{{ $errors->first("administration") }}</strong>
					</span>
				</div>
			@endif
			</div>
