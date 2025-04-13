<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('administration') }}</h2>
<hr>
@php $sidebarAdministration = \App\Application\Model\Administration::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarAdministration) > 0)
			@foreach ($sidebarAdministration as $d)
				 <div>
					<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
					<p> {{ str_limit($d->address_lang , 300) }}</p > 
					 <p><a href="{{ url("administration/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			