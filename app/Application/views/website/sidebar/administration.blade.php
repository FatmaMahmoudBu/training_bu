<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('administration') }}</h2>
<hr>
@php $sidebarAdministration = \App\Application\Model\Administration::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarAdministration) > 0)
			@foreach ($sidebarAdministration as $d)
				 <div>
					<a href="{{ url("administration/".$d->id."/view") }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
					<p><a href="{{ url("administration/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			