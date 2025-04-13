@extends(layoutExtend())

@section('title')
    {{ trans('supervisor_trainee.supervisor_trainee') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('supervisor_trainee.supervisor_trainee') , 'model' => 'supervisor_trainee' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("supervisor_trainee.supervisor_id") }}</th>
					<td>{{ nl2br($item->supervisor_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("supervisor_trainee.trainee_id") }}</th>
					<td>{{ nl2br($item->trainee_id) }}</td>
				</tr>
		</table>

        @include('admin.supervisor_trainee.buttons.delete' , ['id' => $item->id])
        @include('admin.supervisor_trainee.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
