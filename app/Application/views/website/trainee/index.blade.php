@extends(layoutExtend('website'))

@section('title')
     {{ trans('trainee.trainee') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.trainee') }}</h1></div>
     <div><a href="{{ url('trainee/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.trainee') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="name" class="form-control " placeholder="{{ trans("trainee.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="email" class="form-control " placeholder="{{ trans("trainee.email") }}" value="{{ request()->has("email") ? request()->get("email") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="phone" class="form-control " placeholder="{{ trans("trainee.phone") }}" value="{{ request()->has("phone") ? request()->get("phone") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="national_id" class="form-control " placeholder="{{ trans("trainee.national_id") }}" value="{{ request()->has("national_id") ? request()->get("national_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="school_id" class="form-control " placeholder="{{ trans("trainee.school_id") }}" value="{{ request()->has("school_id") ? request()->get("school_id") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("trainee") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("trainee.name") }}</th> 
				<th>{{ trans("trainee.edit") }}</th> 
				<th>{{ trans("trainee.show") }}</th> 
				<th>{{
            trans("trainee.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{str_limit($d->name_lang , 20) }}</td> 
				<td> @include("website.trainee.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.trainee.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.trainee.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
