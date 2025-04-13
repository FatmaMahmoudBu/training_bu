@extends(layoutExtend())

@section('title')
    {{ trans('administration.administration') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('administration.administration') , 'model' => 'administration' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("administration.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("administration.address") }}</th>
					<td>{{ nl2br($item->address_lang) }}</td>
				</tr>
		</table>

        @include('admin.administration.buttons.delete' , ['id' => $item->id])
        @include('admin.administration.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
