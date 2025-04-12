<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('slider') }}</h2>
<hr>
@php $sidebarSlider = \App\Application\Model\Slider::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSlider) > 0)
			@foreach ($sidebarSlider as $d)
				 <div>
					 <img src="{{ small($d->image)}}"  width = "80" />
					<p> {{ str_limit($d->title_lang , 300) }}</p > 
					<p> {{ str_limit($d->text_lang , 300) }}</p > 
					 <p><a href="{{ url("slider/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			