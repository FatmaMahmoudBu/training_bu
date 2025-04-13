@extends(layoutExtend())
 @section('title')
    {{ trans('supervisor_trainee.supervisor_trainee') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('supervisor_trainee.supervisor_trainee') , 'model' => 'supervisor_trainee' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/supervisor_trainee/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.supervisor_trainee.relation.supervisor.edit")
            @include("admin.supervisor_trainee.relation.trainee.edit")
     <div class="form-group {{ $errors->has("supervisor_id") ? "has-error" : "" }}" > 
   <label for="supervisor_id">{{ trans("supervisor_trainee.supervisor_id")}}</label>
    <input type="text" name="supervisor_id" class="form-control" id="supervisor_id" value="{{ isset($item->supervisor_id) ? $item->supervisor_id : old("supervisor_id") }}"  placeholder="{{ trans("supervisor_trainee.supervisor_id")}}">
  </div>
   @if ($errors->has("supervisor_id"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("supervisor_id") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("trainee_id") ? "has-error" : "" }}" > 
   <label for="trainee_id">{{ trans("supervisor_trainee.trainee_id")}}</label>
    <input type="text" name="trainee_id" class="form-control" id="trainee_id" value="{{ isset($item->trainee_id) ? $item->trainee_id : old("trainee_id") }}"  placeholder="{{ trans("supervisor_trainee.trainee_id")}}">
  </div>
   @if ($errors->has("trainee_id"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("trainee_id") }}</strong>
     </span>
    </div>
   @endif
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('supervisor_trainee.supervisor_trainee') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
