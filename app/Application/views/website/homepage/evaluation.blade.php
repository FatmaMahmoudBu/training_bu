<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('evaluation') }}</h2>
<hr>
@php $sidebarEvaluation = \App\Application\Model\Evaluation::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarEvaluation) > 0)
			@foreach ($sidebarEvaluation as $d)
				 <div>
					<h2 > {{ str_limit($d->trainee_id , 50) }}</h2 > 
					<p> {{ str_limit($d->supervisor_id , 300) }}</p > 
					<p> {{ str_limit($d->comments_lang , 300) }}</p > 
					 <p><a href="{{ url("evaluation/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			