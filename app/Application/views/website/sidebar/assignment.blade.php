<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('assignment') }}</h2>
<hr>
@php $sidebarAssignment = \App\Application\Model\Assignment::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarAssignment) > 0)
			@foreach ($sidebarAssignment as $d)
				 <div>
					<p><a href="{{ url("assignment/".$d->id."/view") }}">{{ str_limit($d->trainee_id , 20) }}</a></p > 
					<p><a href="{{ url("assignment/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			