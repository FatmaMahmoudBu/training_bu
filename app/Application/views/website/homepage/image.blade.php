<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('image') }}</h2>
<hr>
@php $sidebarImage = \App\Application\Model\Image::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarImage) > 0)
			@foreach ($sidebarImage as $d)
				 <div>
					<h2 > {{ str_limit($d->title_lang , 50) }}</h2 > 
					<p> {{ str_limit($d->description_lang , 300) }}</p > 
					 <img src="{{ small($d->image)}}"  width = "80" />
					 <p><a href="{{ url("image/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			