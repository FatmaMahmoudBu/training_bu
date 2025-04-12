@extends(layoutExtend())

@section('title')
    {{ trans('gallery.gallery') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('gallery.gallery') , 'model' => 'gallery' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("gallery.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
		</table>

        @include('admin.gallery.buttons.delete' , ['id' => $item->id])
        @include('admin.gallery.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
