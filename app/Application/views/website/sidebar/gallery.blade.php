<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('gallery') }}</h2>
<hr>
@php $sidebarGallery = \App\Application\Model\Gallery::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarGallery) > 0)
			@foreach ($sidebarGallery as $d)
				 <div>
					<a href="{{ url("gallery/".$d->id."/view") }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
					<p><a href="{{ url("gallery/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			