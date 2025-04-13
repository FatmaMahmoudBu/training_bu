<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('trainee') }}</h2>
<hr>
@php $sidebarTrainee = \App\Application\Model\Trainee::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarTrainee) > 0)
			@foreach ($sidebarTrainee as $d)
				 <div>
					<a href="{{ url("trainee/".$d->id."/view") }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
					<p><a href="{{ url("trainee/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			