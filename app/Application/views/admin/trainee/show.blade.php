@extends(layoutExtend())
 @section('title')
    {{ trans('trainee.trainee') }} {{ trans('home.view') }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('trainee.trainee') , 'model' => 'trainee' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("trainee.name") }}</th>
     <td>{{ nl2br($item->name_lang) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("trainee.email") }}</th>
     <td>{{ nl2br($item->email) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("trainee.phone") }}</th>
     <td>{{ nl2br($item->phone) }}</td>
    </tr>
    <tr>
				<th width="200">{{ trans("trainee.image") }}</th>
					<td>
					<img src="{{ small($item->image) }}" width="100" />
					</td>
				</tr>
    <tr>
    <th width="200">{{ trans("trainee.national_id") }}</th>
     <td>{{ nl2br($item->national_id) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("trainee.school_id") }}</th>
     <td>{{ nl2br($item->school_id) }}</td>
    </tr>
  </table>
         @include('admin.trainee.buttons.delete' , ['id' => $item->id])
        @include('admin.trainee.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
