<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('workshop') }}</h2>
<hr>
@php $sidebarWorkshop = \App\Application\Model\Workshop::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarWorkshop) > 0)
			@foreach ($sidebarWorkshop as $d)
				 <div>
					<h2 > {{ str_limit($d->title_lang , 50) }}</h2 > 
					<p> {{ str_limit($d->description_lang , 300) }}</p > 
					 <p><a href="{{ url("workshop/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			