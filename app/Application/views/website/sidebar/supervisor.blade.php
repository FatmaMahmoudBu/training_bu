<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('supervisor') }}</h2>
<hr>
@php $sidebarSupervisor = \App\Application\Model\Supervisor::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarSupervisor) > 0)
			@foreach ($sidebarSupervisor as $d)
				 <div>
					<a href="{{ url("supervisor/".$d->id."/view") }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
					<p><a href="{{ url("supervisor/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			