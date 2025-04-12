@extends(layoutExtend())

@section('title')
     {{ trans('home.view') }} {{ trans('faculty.faculty') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('faculty.faculty') , 'model' => 'faculty' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" >
				<tr>
				<th width="200">{{ trans("faculty.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
		</table>

        @include('admin.faculty.buttons.delete' , ['id' => $item->id])
        @include('admin.faculty.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
