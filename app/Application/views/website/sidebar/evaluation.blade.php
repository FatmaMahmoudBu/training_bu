<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('evaluation') }}</h2>
<hr>
@php $sidebarEvaluation = \App\Application\Model\Evaluation::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarEvaluation) > 0)
			@foreach ($sidebarEvaluation as $d)
				 <div>
					<p><a href="{{ url("evaluation/".$d->id."/view") }}">{{ str_limit($d->trainee_id , 20) }}</a></p > 
					<p><a href="{{ url("evaluation/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			