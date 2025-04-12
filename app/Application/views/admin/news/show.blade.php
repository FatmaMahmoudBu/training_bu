@extends(layoutExtend())

@section('title')
     {{ trans('home.view') }} {{ trans('news.news') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('news.news') , 'model' => 'news' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" >
				<tr>
				<th width="200">{{ trans("news.title") }}</th>
					<td>{{ nl2br($item->title_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("news.textbody") }}</th>
					<td>{!! nl2br($item->textbody_lang) !!}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("news.link") }}</th>
					<td>{{ nl2br($item->date) }}</td>
				</tr>
        <tr>
        <th width="200">{{ trans("news.author") }}</th>
          <td>{{ nl2br($item->author_lang) }}</td>
        </tr>
				<tr>
				<th width="200">{{ trans("news.image") }}</th>
					<td>
					<img src="{{ small($item->image) }}" width="100" />
					</td>
				</tr>
		</table>

        @include('admin.news.buttons.delete' , ['id' => $item->id])
        @include('admin.news.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
