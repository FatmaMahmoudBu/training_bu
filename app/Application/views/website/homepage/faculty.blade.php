<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('faculty') }}</h2>
<hr>
@php $sidebarFaculty = \App\Application\Model\Faculty::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarFaculty) > 0)
			@foreach ($sidebarFaculty as $d)
				 <div>
					<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
					 <p><a href="{{ url("faculty/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			