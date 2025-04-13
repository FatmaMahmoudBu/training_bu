@extends(layoutExtend())

@section('title')
    {{ trans('supervisor.supervisor') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('supervisor.supervisor') , 'model' => 'supervisor' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("supervisor.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("supervisor.email") }}</th>
					<td>{{ nl2br($item->email) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("supervisor.phone") }}</th>
					<td>{{ nl2br($item->phone) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("supervisor.school_id") }}</th>
					<td>{{ nl2br($item->school_id) }}</td>
				</tr>
		</table>

        @include('admin.supervisor.buttons.delete' , ['id' => $item->id])
        @include('admin.supervisor.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
