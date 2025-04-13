<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('school') }}</h2>
<hr>
@php $sidebarSchool = \App\Application\Model\School::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarSchool) > 0)
			@foreach ($sidebarSchool as $d)
				 <div>
					<a href="{{ url("school/".$d->id."/view") }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
					<p><a href="{{ url("school/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			