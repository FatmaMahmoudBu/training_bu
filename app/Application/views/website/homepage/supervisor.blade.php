<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('supervisor') }}</h2>
<hr>
@php $sidebarSupervisor = \App\Application\Model\Supervisor::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSupervisor) > 0)
			@foreach ($sidebarSupervisor as $d)
				 <div>
					<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
					<p> {{ str_limit($d->email , 300) }}</p > 
					<p> {{ str_limit($d->phone , 300) }}</p > 
					 <p><a href="{{ url("supervisor/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			