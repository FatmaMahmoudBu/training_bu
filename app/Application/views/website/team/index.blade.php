{{-- @extends(layoutExtend('website'))

@section('title')
     {{ trans('team.team') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.team') }}</h1></div>
     <div><a href="{{ url('team/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.team') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="name" class="form-control " placeholder="{{ trans("team.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="position" class="form-control " placeholder="{{ trans("team.position") }}" value="{{ request()->has("position") ? request()->get("position") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="type" class="form-control " placeholder="{{ trans("team.type") }}" value="{{ request()->has("type") ? request()->get("type") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="faculty_id" class="form-control " placeholder="{{ trans("team.faculty_id") }}" value="{{ request()->has("faculty_id") ? request()->get("faculty_id") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("team") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("team.name") }}</th> 
				<th>{{ trans("team.edit") }}</th> 
				<th>{{ trans("team.show") }}</th> 
				<th>{{
            trans("team.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{str_limit($d->name_lang , 20) }}</td> 
				<td> @include("website.team.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.team.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.team.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection --}}


@extends(layoutExtend('website'))

@section('title')
     {{ trans('team.team') }} {{ trans('home.control') }}
@endsection

@section('content')

<!-- Page Title -->
    <div class="breadcrumbs">
    <div class="container">
          <h2 class="my-4">{{trans('team.team')}}</h2>
        </div>
    </div>

<!-- Trainers Section -->
    <section id="trainers" class="section trainers">

      <div class="container">

        <div class="row gy-5">

        @php  $teams = App\Application\Model\Team::where('type','=','0')->orderBy('id', 'asc')->get();@endphp
        @foreach($teams as $team)
         

          <div class="col-lg-3 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="{{ large($team->image)}}" class="img-fluid" alt="">
              {{-- <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div> --}}
            </div>
            <div class="member-info text-center">
              <h4>{{ $team->name_lang }}</h4>
              <span class="">{{ $team->position_lang }}</span>
              {{-- <p>Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel dolorum distinctio dire flow</p> --}}
            </div>
          </div><!-- End Team Member -->

        @endforeach

        </div>

      </div>

    </section><!-- /Trainers Section -->
@endsection












