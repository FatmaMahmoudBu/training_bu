@extends(layoutExtend('website'))

@section('title')
     {{ trans('attendance.attendance') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.attendance') }}</h1></div>
     <div><a href="{{ url('attendance/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.attendance') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="trainee_id" class="form-control " placeholder="{{ trans("attendance.trainee_id") }}" value="{{ request()->has("trainee_id") ? request()->get("trainee_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="supervisor_id" class="form-control " placeholder="{{ trans("attendance.supervisor_id") }}" value="{{ request()->has("supervisor_id") ? request()->get("supervisor_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="date" class="form-control datepicker2" placeholder="{{ trans("attendance.date") }}" value="{{ request()->has("date") ? request()->get("date") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="status" class="form-control " placeholder="{{ trans("attendance.status") }}" value="{{ request()->has("status") ? request()->get("status") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="notes" class="form-control " placeholder="{{ trans("attendance.notes") }}" value="{{ request()->has("notes") ? request()->get("notes") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("attendance") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("attendance.trainee_id") }}</th> 
				<th>{{ trans("attendance.edit") }}</th> 
				<th>{{ trans("attendance.show") }}</th> 
				<th>{{
            trans("attendance.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->trainee_id , 20) }}</td> 
				<td> @include("website.attendance.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.attendance.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.attendance.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
