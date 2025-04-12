<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('image') }}</h2>
<hr>
@php $sidebarImage = \App\Application\Model\Image::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarImage) > 0)
			@foreach ($sidebarImage as $d)
				 <div>
					<a href="{{ url("image/".$d->id."/view") }}" ><p>{{ str_limit($d->title_lang , 20) }}</a></p > 
					<p><a href="{{ url("image/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			