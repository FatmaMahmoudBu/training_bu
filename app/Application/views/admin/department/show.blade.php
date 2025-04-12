@extends(layoutExtend())
  @section('title')
   {{ trans('home.view') }}   {{ trans('department.department') }}
@endsection
  @section('content')
    @component(layoutForm() , ['title' => trans('department.department') , 'model' => 'department' , 'action' => trans('home.view')  ])
   <table class="table table-bordered  table-striped" >
    <tr>
    <th width="200">{{ trans("department.name") }}</th>
     <td>{{ nl2br($item->name_lang) }}</td>
    </tr>
  </table>
          @include('admin.department.buttons.delete' , ['id' => $item->id])
        @include('admin.department.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
