@extends(layoutExtend())

@section('title')
    {{ trans('image.image') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('image.image') , 'model' => 'image' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("image.title") }}</th>
					<td>{{ nl2br($item->title_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("image.description") }}</th>
					<td>{{ nl2br($item->description_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("image.image") }}</th>
					<td>
					<img src="{{ small($item->image) }}" width="100" />
					</td>
				</tr>
				<tr>
				<th width="200">{{ trans("image.gallery_id") }}</th>
					<td>{{ nl2br($item->gallery_id) }}</td>
				</tr>
		</table>

        @include('admin.image.buttons.delete' , ['id' => $item->id])
        @include('admin.image.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
