@extends(layoutExtend())
 @section('title')
    {{  isset($item) ? trans('home.edit')  : trans('home.add')  }} {{ trans('department.department') }} 
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('department.department') , 'model' => 'department' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/department/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.department.relation.faculty.edit")
     <div class="form-group  {{  $errors->has("name.en")  &&  $errors->has("name.ar")  ? "has-error" : "" }}" >
   <label for="name">{{ trans("department.name")}}</label>
    {!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "department") !!}
  </div>
   @if ($errors->has("name.en"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("name.en") }}</strong>
     </span>
    </div>
   @endif
   @if ($errors->has("name.ar"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("name.ar") }}</strong>
     </span>
    </div>
   @endif
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('department.department') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
