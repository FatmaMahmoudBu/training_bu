@extends(layoutExtend())

@section('title')
    {{ trans('assignment.assignment') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('assignment.assignment') , 'model' => 'assignment' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/assignment/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group {{ $errors->has("trainee_id") ? "has-error" : "" }}" > 
			<label for="trainee_id">{{ trans("assignment.trainee_id")}}</label>
				<input type="text" name="trainee_id" class="form-control" id="trainee_id" value="{{ isset($item->trainee_id) ? $item->trainee_id : old("trainee_id") }}"  placeholder="{{ trans("assignment.trainee_id")}}">
		</div>
			@if ($errors->has("trainee_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("trainee_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("supervisor_id") ? "has-error" : "" }}" > 
			<label for="supervisor_id">{{ trans("assignment.supervisor_id")}}</label>
				<input type="text" name="supervisor_id" class="form-control" id="supervisor_id" value="{{ isset($item->supervisor_id) ? $item->supervisor_id : old("supervisor_id") }}"  placeholder="{{ trans("assignment.supervisor_id")}}">
		</div>
			@if ($errors->has("supervisor_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("supervisor_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("report_path") ? "has-error" : "" }}" > 
			<label for="report_path">{{ trans("assignment.report_path")}}</label>
				<input type="text" name="report_path" class="form-control" id="report_path" value="{{ isset($item->report_path) ? $item->report_path : old("report_path") }}"  placeholder="{{ trans("assignment.report_path")}}">
		</div>
			@if ($errors->has("report_path"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("report_path") }}</strong>
					</span>
				</div>
			@endif


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('assignment.assignment') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
