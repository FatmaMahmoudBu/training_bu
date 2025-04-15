@extends(layoutExtend())

@section('title')
    {{ trans('attendance.attendance') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('attendance.attendance') , 'model' => 'attendance' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("attendance.trainee_id") }}</th>
					<td>{{ nl2br($item->trainee_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("attendance.supervisor_id") }}</th>
					<td>{{ nl2br($item->supervisor_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("attendance.date") }}</th>
					<td>{{ nl2br($item->date) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("attendance.status") }}</th>
					<td>{{ nl2br($item->status) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("attendance.notes") }}</th>
					<td>{{ nl2br($item->notes_lang) }}</td>
				</tr>
		</table>

        @include('admin.attendance.buttons.delete' , ['id' => $item->id])
        @include('admin.attendance.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
