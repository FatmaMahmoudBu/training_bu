<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('school') }}</h2>
<hr>
@php $sidebarSchool = \App\Application\Model\School::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarSchool) > 0)
			@foreach ($sidebarSchool as $d)
				 <div>
					<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
					<p> {{ str_limit($d->address_lang , 300) }}</p > 
					<p> {{ str_limit($d->administration_id , 300) }}</p > 
					 <p><a href="{{ url("school/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			