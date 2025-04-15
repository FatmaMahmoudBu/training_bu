<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('attendance') }}</h2>
<hr>
@php $sidebarAttendance = \App\Application\Model\Attendance::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarAttendance) > 0)
			@foreach ($sidebarAttendance as $d)
				 <div>
					<h2 > {{ str_limit($d->trainee_id , 50) }}</h2 > 
					<p> {{ str_limit($d->supervisor_id , 300) }}</p > 
					<p> {{ str_limit($d->date , 300) }}</p > 
					 <p><a href="{{ url("attendance/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			