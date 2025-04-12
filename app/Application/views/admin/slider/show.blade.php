@extends(layoutExtend())

@section('title')
    {{ trans('slider.slider') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('slider.slider') , 'model' => 'slider' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("slider.image") }}</th>
					<td>
					<img src="{{ small($item->image) }}" width="100" />
					</td>
				</tr>
				<tr>
				<th width="200">{{ trans("slider.title") }}</th>
					<td>{{ nl2br($item->title_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("slider.text") }}</th>
					<td>{{ nl2br($item->text_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("slider.date") }}</th>
					<td>{{ nl2br($item->date) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("slider.body") }}</th>
					<td>{{ nl2br($item->body_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("slider.gallery") }}</th>
					<td>{{ nl2br($item->gallery_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("slider.video") }}</th>
					<td>{{ nl2br($item->video) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("slider.status") }}</th>
					<td>{{ nl2br($item->status_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("slider.presentation") }}</th>
					<td>{{ nl2br($item->presentation_lang) }}</td>
				</tr>
		</table>

        @include('admin.slider.buttons.delete' , ['id' => $item->id])
        @include('admin.slider.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
