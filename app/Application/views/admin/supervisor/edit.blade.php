@extends(layoutExtend())
 @section('title')
    {{ trans('supervisor.supervisor') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('supervisor.supervisor') , 'model' => 'supervisor' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/supervisor/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.supervisor.relation.school.edit")
     <div class="form-group  {{  $errors->has("name.ar")  &&  $errors->has("name.en")  ? "has-error" : "" }}" >
   <label for="name">{{ trans("supervisor.name")}}</label>
    {!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "supervisor") !!}
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
   <label for="email">{{ trans("supervisor.email")}}</label>
    <input type="text" name="email" class="form-control" id="email" value="{{ isset($item->email) ? $item->email : old("email") }}"  placeholder="{{ trans("supervisor.email")}}">
  </div>
   @if ($errors->has("email"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("email") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("phone") ? "has-error" : "" }}" > 
   <label for="phone">{{ trans("supervisor.phone")}}</label>
    <input type="text" name="phone" class="form-control" id="phone" value="{{ isset($item->phone) ? $item->phone : old("phone") }}"  placeholder="{{ trans("supervisor.phone")}}">
  </div>
   @if ($errors->has("phone"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("phone") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("image") ? "has-error" : "" }}" >
       			<label for="image">{{ trans("supervisor.image")}}</label>
       				@if(isset($item) && $item->image != "")
       				<br>
       				<img src="{{ small($item->image) }}" class="thumbnail" alt="" width="200">
       				<br>
       				@endif
       				<input type="file" name="image" >
       		</div>
       			@if ($errors->has("image"))
       				<div class="alert alert-danger">
       					<span class='help-block'>
       						<strong>{{ $errors->first("image") }}</strong>
       					</span>
       				</div>
       			@endif
   <div class="form-group {{ $errors->has("school_id") ? "has-error" : "" }}" > 
   <label for="school_id">{{ trans("supervisor.school_id")}}</label>
    <input type="text" name="school_id" class="form-control" id="school_id" value="{{ isset($item->school_id) ? $item->school_id : old("school_id") }}"  placeholder="{{ trans("supervisor.school_id")}}">
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
                    {{ trans('home.save') }}  {{ trans('supervisor.supervisor') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
