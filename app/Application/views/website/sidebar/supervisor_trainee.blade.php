<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('supervisor_trainee') }}</h2>
<hr>
@php $sidebarSupervisor_trainee = \App\Application\Model\Supervisor_trainee::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarSupervisor_trainee) > 0)
			@foreach ($sidebarSupervisor_trainee as $d)
				 <div>
					<p><a href="{{ url("supervisor_trainee/".$d->id."/view") }}">{{ str_limit($d->supervisor_id , 20) }}</a></p > 
					<p><a href="{{ url("supervisor_trainee/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			