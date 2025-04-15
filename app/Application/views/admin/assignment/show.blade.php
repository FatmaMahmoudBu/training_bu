@extends(layoutExtend())

@section('title')
    {{ trans('assignment.assignment') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('assignment.assignment') , 'model' => 'assignment' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("assignment.trainee_id") }}</th>
					<td>{{ nl2br($item->trainee_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("assignment.supervisor_id") }}</th>
					<td>{{ nl2br($item->supervisor_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("assignment.report_path") }}</th>
					<td>{{ nl2br($item->report_path) }}</td>
				</tr>
		</table>

        @include('admin.assignment.buttons.delete' , ['id' => $item->id])
        @include('admin.assignment.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
