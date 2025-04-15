@extends(layoutExtend('website'))

@section('title')
     {{ trans('assignment.assignment') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.assignment') }}</h1></div>
     <div><a href="{{ url('assignment/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.assignment') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="trainee_id" class="form-control " placeholder="{{ trans("assignment.trainee_id") }}" value="{{ request()->has("trainee_id") ? request()->get("trainee_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="supervisor_id" class="form-control " placeholder="{{ trans("assignment.supervisor_id") }}" value="{{ request()->has("supervisor_id") ? request()->get("supervisor_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="report_path" class="form-control " placeholder="{{ trans("assignment.report_path") }}" value="{{ request()->has("report_path") ? request()->get("report_path") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("assignment") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("assignment.trainee_id") }}</th> 
				<th>{{ trans("assignment.edit") }}</th> 
				<th>{{ trans("assignment.show") }}</th> 
				<th>{{
            trans("assignment.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->trainee_id , 20) }}</td> 
				<td> @include("website.assignment.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.assignment.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.assignment.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
