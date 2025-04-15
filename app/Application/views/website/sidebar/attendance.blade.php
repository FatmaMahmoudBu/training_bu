<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('attendance') }}</h2>
<hr>
@php $sidebarAttendance = \App\Application\Model\Attendance::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarAttendance) > 0)
			@foreach ($sidebarAttendance as $d)
				 <div>
					<p><a href="{{ url("attendance/".$d->id."/view") }}">{{ str_limit($d->trainee_id , 20) }}</a></p > 
					<p><a href="{{ url("attendance/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			