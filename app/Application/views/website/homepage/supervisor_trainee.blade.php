<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('supervisor_trainee') }}</h2>
<hr>
@php $sidebarSupervisor_trainee = \App\Application\Model\Supervisor_trainee::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSupervisor_trainee) > 0)
			@foreach ($sidebarSupervisor_trainee as $d)
				 <div>
					<h2 > {{ str_limit($d->supervisor_id , 50) }}</h2 > 
					<p> {{ str_limit($d->trainee_id , 300) }}</p > 
					 <p><a href="{{ url("supervisor_trainee/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			