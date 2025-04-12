@extends(layoutExtend('website'))

@section('title')
     {{ trans('image.image') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.image') }}</h1></div>
     <div><a href="{{ url('image/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.image') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="title" class="form-control " placeholder="{{ trans("image.title") }}" value="{{ request()->has("title") ? request()->get("title") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="description" class="form-control " placeholder="{{ trans("image.description") }}" value="{{ request()->has("description") ? request()->get("description") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="gallery_id" class="form-control " placeholder="{{ trans("image.gallery_id") }}" value="{{ request()->has("gallery_id") ? request()->get("gallery_id") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("image") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("image.title") }}</th> 
				<th>{{ trans("image.edit") }}</th> 
				<th>{{ trans("image.show") }}</th> 
				<th>{{
            trans("image.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{str_limit($d->title_lang , 20) }}</td> 
				<td> @include("website.image.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.image.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.image.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
