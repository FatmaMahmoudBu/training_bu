@extends(layoutExtend())

@section('title')
    {{ trans('evaluation.evaluation') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('evaluation.evaluation') , 'model' => 'evaluation' , 'action' => trans('home.view')  ])
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

        @include('admin.evaluation.buttons.delete' , ['id' => $item->id])
        @include('admin.evaluation.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
