@extends(layoutExtend('website'))

@section('title')
     {{ trans('school.school') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.school') }}</h1></div>
     <div><a href="{{ url('school/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.school') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="name" class="form-control " placeholder="{{ trans("school.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="address" class="form-control " placeholder="{{ trans("school.address") }}" value="{{ request()->has("address") ? request()->get("address") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="administration_id" class="form-control " placeholder="{{ trans("school.administration_id") }}" value="{{ request()->has("administration_id") ? request()->get("administration_id") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("school") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("school.name") }}</th> 
				<th>{{ trans("school.edit") }}</th> 
				<th>{{ trans("school.show") }}</th> 
				<th>{{
            trans("school.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{str_limit($d->name_lang , 20) }}</td> 
				<td> @include("website.school.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.school.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.school.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
