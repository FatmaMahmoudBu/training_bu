@extends(layoutExtend())
 @section('title')
    {{ trans('school.school') }} {{ trans('home.view') }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('school.school') , 'model' => 'school' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("school.name") }}</th>
     <td>{{ nl2br($item->name_lang) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("school.address") }}</th>
     <td>{{ nl2br($item->address_lang) }}</td>
    </tr>
    <tr>
				<th width="200">{{ trans("school.image") }}</th>
					<td>
					<img src="{{ small($item->image) }}" width="100" />
					</td>
				</tr>
    <tr>
    <th width="200">{{ trans("school.administration_id") }}</th>
     <td>{{ nl2br($item->administration_id) }}</td>
    </tr>
  </table>
         @include('admin.school.buttons.delete' , ['id' => $item->id])
        @include('admin.school.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
