<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('department') }}</h2>
<hr>
@php $sidebarDepartment = \App\Application\Model\Department::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarDepartment) > 0)
			@foreach ($sidebarDepartment as $d)
				 <div>
					<a href="{{ url("department/".$d->id."/view") }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
					<p><a href="{{ url("department/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			