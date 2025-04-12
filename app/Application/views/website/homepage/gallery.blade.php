<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('gallery') }}</h2>
<hr>
@php $sidebarGallery = \App\Application\Model\Gallery::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarGallery) > 0)
			@foreach ($sidebarGallery as $d)
				 <div>
					<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
					 <p><a href="{{ url("gallery/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			