<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('faculty') }}</h2>
<hr>
@php $sidebarFaculty = \App\Application\Model\Faculty::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarFaculty) > 0)
			@foreach ($sidebarFaculty as $d)
				 <div>
					<a href="{{ url("faculty/".$d->id."/view") }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
					<p><a href="{{ url("faculty/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			