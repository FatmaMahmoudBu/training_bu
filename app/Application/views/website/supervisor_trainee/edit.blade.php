@extends(layoutExtend('website'))

@section('title')
    {{ trans('supervisor_trainee.supervisor_trainee') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('supervisor_trainee') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('supervisor_trainee/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("supervisor_id") ? "has-error" : "" }}" > 
			<label for="supervisor_id">{{ trans("supervisor_trainee.supervisor_id")}}</label>
				<input type="text" name="supervisor_id" class="form-control" id="supervisor_id" value="{{ isset($item->supervisor_id) ? $item->supervisor_id : old("supervisor_id") }}"  placeholder="{{ trans("supervisor_trainee.supervisor_id")}}">
		</div>
			@if ($errors->has("supervisor_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("supervisor_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("trainee_id") ? "has-error" : "" }}" > 
			<label for="trainee_id">{{ trans("supervisor_trainee.trainee_id")}}</label>
				<input type="text" name="trainee_id" class="form-control" id="trainee_id" value="{{ isset($item->trainee_id) ? $item->trainee_id : old("trainee_id") }}"  placeholder="{{ trans("supervisor_trainee.trainee_id")}}">
		</div>
			@if ($errors->has("trainee_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("trainee_id") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.supervisor_trainee') }}
                </button>
            </div>
        </form>
</div>
@endsection
