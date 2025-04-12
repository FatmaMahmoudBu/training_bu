<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('department') }}</h2>
<hr>
@php $sidebarDepartment = \App\Application\Model\Department::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarDepartment) > 0)
			@foreach ($sidebarDepartment as $d)
				 <div>
					<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
					 <p><a href="{{ url("department/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			