<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('team') }}</h2>
<hr>
@php $sidebarTeam = \App\Application\Model\Team::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarTeam) > 0)
			@foreach ($sidebarTeam as $d)
				 <div>
					<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
					<p> {{ str_limit($d->position_lang , 300) }}</p > 
					<p> {{ str_limit($d->type_lang , 300) }}</p > 
					 <p><a href="{{ url("team/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			