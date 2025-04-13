@extends(layoutExtend('website'))

@section('title')
    {{ trans('evaluation.evaluation') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('evaluation') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("evaluation.trainee_id") }}</th>
					<td>{{ nl2br($item->trainee_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("evaluation.supervisor_id") }}</th>
					<td>{{ nl2br($item->supervisor_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("evaluation.comments") }}</th>
					<td>{{ nl2br($item->comments_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("evaluation.score") }}</th>
					<td>{{ nl2br($item->score) }}</td>
				</tr>
		</table>

        @include('website.evaluation.buttons.delete' , ['id' => $item->id])
        @include('website.evaluation.buttons.edit' , ['id' => $item->id])
</div>
@endsection
