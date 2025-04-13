<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('trainee') }}</h2>
<hr>
@php $sidebarTrainee = \App\Application\Model\Trainee::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarTrainee) > 0)
			@foreach ($sidebarTrainee as $d)
				 <div>
					<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
					<p> {{ str_limit($d->email , 300) }}</p > 
					<p> {{ str_limit($d->phone , 300) }}</p > 
					 <p><a href="{{ url("trainee/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			