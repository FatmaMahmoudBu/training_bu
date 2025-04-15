<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('assignment') }}</h2>
<hr>
@php $sidebarAssignment = \App\Application\Model\Assignment::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarAssignment) > 0)
			@foreach ($sidebarAssignment as $d)
				 <div>
					<h2 > {{ str_limit($d->trainee_id , 50) }}</h2 > 
					<p> {{ str_limit($d->supervisor_id , 300) }}</p > 
					<p> {{ str_limit($d->report_path , 300) }}</p > 
					 <p><a href="{{ url("assignment/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			