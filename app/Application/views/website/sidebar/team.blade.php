<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('team') }}</h2>
<hr>
@php $sidebarTeam = \App\Application\Model\Team::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarTeam) > 0)
			@foreach ($sidebarTeam as $d)
				 <div>
					<a href="{{ url("team/".$d->id."/view") }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
					<p><a href="{{ url("team/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			