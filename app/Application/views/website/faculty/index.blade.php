@extends(layoutExtend('website'))

@section('title')
     {{ trans('faculty.faculty') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="col-lg-12">
    <div><h1>{{ trans('website.faculty') }}</h1></div>
     <div><a href="{{ url('faculty/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.faculty') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="name" class="form-control " placeholder="{{ trans("faculty.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("faculty") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("faculty.name") }}</th> 
				<th>{{ trans("faculty.edit") }}</th> 
				<th>{{ trans("faculty.show") }}</th> 
				<th>{{
            trans("faculty.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{str_limit($d->name_lang , 20) }}</td> 
				<td> @include("website.faculty.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.faculty.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.faculty.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
