@extends(layoutExtend())
 @section('title')
    {{ trans('trainee.trainee') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('trainee.trainee') , 'model' => 'trainee' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/trainee/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.trainee.relation.school.edit")
     <div class="form-group  {{  $errors->has("name.ar")  &&  $errors->has("name.en")  ? "has-error" : "" }}" >
   <label for="name">{{ trans("trainee.name")}}</label>
    {!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "trainee") !!}
  </div>
   @if ($errors->has("name.ar"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("name.ar") }}</strong>
     </span>
    </div>
   @endif
   @if ($errors->has("name.en"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("name.en") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("email") ? "has-error" : "" }}" > 
   <label for="email">{{ trans("trainee.email")}}</label>
    <input type="text" name="email" class="form-control" id="email" value="{{ isset($item->email) ? $item->email : old("email") }}"  placeholder="{{ trans("trainee.email")}}">
  </div>
   @if ($errors->has("email"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("email") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("phone") ? "has-error" : "" }}" > 
   <label for="phone">{{ trans("trainee.phone")}}</label>
    <input type="text" name="phone" class="form-control" id="phone" value="{{ isset($item->phone) ? $item->phone : old("phone") }}"  placeholder="{{ trans("trainee.phone")}}">
  </div>
   @if ($errors->has("phone"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("phone") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("national_id") ? "has-error" : "" }}" > 
   <label for="national_id">{{ trans("trainee.national_id")}}</label>
    <input type="text" name="national_id" class="form-control" id="national_id" value="{{ isset($item->national_id) ? $item->national_id : old("national_id") }}"  placeholder="{{ trans("trainee.national_id")}}">
  </div>
   @if ($errors->has("national_id"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("national_id") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("school_id") ? "has-error" : "" }}" > 
   <label for="school_id">{{ trans("trainee.school_id")}}</label>
    <input type="text" name="school_id" class="form-control" id="school_id" value="{{ isset($item->school_id) ? $item->school_id : old("school_id") }}"  placeholder="{{ trans("trainee.school_id")}}">
  </div>
   @if ($errors->has("school_id"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("school_id") }}</strong>
     </span>
    </div>
   @endif
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('trainee.trainee') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
