@extends(layoutExtend('website'))

@section('title')
     {{ trans('department.department') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="col-lg-12">
    <div><h1>{{ trans('website.department') }}</h1></div>
     <div><a href="{{ url('department/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.department') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="name" class="form-control " placeholder="{{ trans("department.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("department") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("department.name") }}</th> 
				<th>{{ trans("department.edit") }}</th> 
				<th>{{ trans("department.show") }}</th> 
				<th>{{
            trans("department.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{str_limit($d->name_lang , 20) }}</td> 
				<td> @include("website.department.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.department.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.department.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
