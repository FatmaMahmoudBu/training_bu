<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('workshop') }}</h2>
<hr>
@php $sidebarWorkshop = \App\Application\Model\Workshop::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarWorkshop) > 0)
			@foreach ($sidebarWorkshop as $d)
				 <div>
					<a href="{{ url("workshop/".$d->id."/view") }}" ><p>{{ str_limit($d->title_lang , 20) }}</a></p > 
					<p><a href="{{ url("workshop/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			