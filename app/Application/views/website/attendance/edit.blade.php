@extends(layoutExtend('website'))

@section('title')
    {{ trans('attendance.attendance') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('attendance') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('attendance/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("trainee_id") ? "has-error" : "" }}" > 
			<label for="trainee_id">{{ trans("attendance.trainee_id")}}</label>
				<input type="text" name="trainee_id" class="form-control" id="trainee_id" value="{{ isset($item->trainee_id) ? $item->trainee_id : old("trainee_id") }}"  placeholder="{{ trans("attendance.trainee_id")}}">
		</div>
			@if ($errors->has("trainee_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("trainee_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("supervisor_id") ? "has-error" : "" }}" > 
			<label for="supervisor_id">{{ trans("attendance.supervisor_id")}}</label>
				<input type="text" name="supervisor_id" class="form-control" id="supervisor_id" value="{{ isset($item->supervisor_id) ? $item->supervisor_id : old("supervisor_id") }}"  placeholder="{{ trans("attendance.supervisor_id")}}">
		</div>
			@if ($errors->has("supervisor_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("supervisor_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("date") ? "has-error" : "" }}" > 
			<label for="date">{{ trans("attendance.date")}}</label>
				 <input type="text" name="date" class="form-control datepicker2" id="date" value="{{ isset($item->date) ? $item->date : old("date") }}"  placeholder="{{ trans("attendance.date")}}" > 
		</div>
			@if ($errors->has("date"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("date") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("status") ? "has-error" : "" }}" > 
			<label for="status">{{ trans("attendance.status")}}</label>
				<input type="text" name="status" class="form-control" id="status" value="{{ isset($item->status) ? $item->status : old("status") }}"  placeholder="{{ trans("attendance.status")}}">
		</div>
			@if ($errors->has("status"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("status") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("notes.ar")  &&  $errors->has("notes.en")  ? "has-error" : "" }}" >
			<label for="notes">{{ trans("attendance.notes")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "notes", isset($item->notes) ? $item->notes : old("notes") , "textarea" , "attendance" ) !!}
		</div>
			@if ($errors->has("notes.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("notes.ar") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("notes.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("notes.en") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.attendance') }}
                </button>
            </div>
        </form>
</div>
@endsection
