@extends(layoutExtend())

@section('title')
    {{ trans('workshop.workshop') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('workshop.workshop') , 'model' => 'workshop' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("workshop.title") }}</th>
					<td>{{ nl2br($item->title_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("workshop.description") }}</th>
					<td>{{ nl2br($item->description_lang) }}</td>
				</tr>
		</table>

        @include('admin.workshop.buttons.delete' , ['id' => $item->id])
        @include('admin.workshop.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
