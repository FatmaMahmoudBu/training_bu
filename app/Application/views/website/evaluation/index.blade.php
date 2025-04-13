@extends(layoutExtend('website'))

@section('title')
     {{ trans('evaluation.evaluation') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.evaluation') }}</h1></div>
     <div><a href="{{ url('evaluation/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.evaluation') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="trainee_id" class="form-control " placeholder="{{ trans("evaluation.trainee_id") }}" value="{{ request()->has("trainee_id") ? request()->get("trainee_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="supervisor_id" class="form-control " placeholder="{{ trans("evaluation.supervisor_id") }}" value="{{ request()->has("supervisor_id") ? request()->get("supervisor_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="comments" class="form-control " placeholder="{{ trans("evaluation.comments") }}" value="{{ request()->has("comments") ? request()->get("comments") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="score" class="form-control " placeholder="{{ trans("evaluation.score") }}" value="{{ request()->has("score") ? request()->get("score") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("evaluation") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("evaluation.trainee_id") }}</th> 
				<th>{{ trans("evaluation.edit") }}</th> 
				<th>{{ trans("evaluation.show") }}</th> 
				<th>{{
            trans("evaluation.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->trainee_id , 20) }}</td> 
				<td> @include("website.evaluation.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.evaluation.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.evaluation.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
