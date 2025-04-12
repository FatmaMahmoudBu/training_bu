@extends(layoutExtend('website'))
 @section('title')
    {{ trans('team.team') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('team') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('team/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("website.team.relation.faculty.edit")
                <div class="form-group  {{  $errors->has("name.en")  &&  $errors->has("name.ar")  ? "has-error" : "" }}" >
   <label for="name">{{ trans("team.name")}}</label>
    {!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "team") !!}
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
   <div class="form-group  {{  $errors->has("position.en")  &&  $errors->has("position.ar")  ? "has-error" : "" }}" >
   <label for="position">{{ trans("team.position")}}</label>
    {!! extractFiled(isset($item) ? $item : null , "position", isset($item->position) ? $item->position : old("position") , "text" , "team") !!}
  </div>
   @if ($errors->has("position.en"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("position.en") }}</strong>
     </span>
    </div>
   @endif
   @if ($errors->has("position.ar"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("position.ar") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group  {{  $errors->has("type.en")  &&  $errors->has("type.ar")  ? "has-error" : "" }}" >
   <label for="type">{{ trans("team.type")}}</label>
    <input type="text" name="type" class="form-control" id="type" value="{{ isset($item->type) ? $item->type : old("type") }}"  placeholder="{{ trans("team.type")}}">
  </div>
   @if ($errors->has("type.en"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("type.en") }}</strong>
     </span>
    </div>
   @endif
   @if ($errors->has("type.ar"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("type.ar") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("image") ? "has-error" : "" }}" > 
   <label for="image">{{ trans("team.image")}}</label>
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
   <div class="form-group {{ $errors->has("faculty_id") ? "has-error" : "" }}" > 
   <label for="faculty_id">{{ trans("team.faculty_id")}}</label>
    <input type="text" name="faculty_id" class="form-control" id="faculty_id" value="{{ isset($item->faculty_id) ? $item->faculty_id : old("faculty_id") }}"  placeholder="{{ trans("team.faculty_id")}}">
  </div>
   @if ($errors->has("faculty_id"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("faculty_id") }}</strong>
     </span>
    </div>
   @endif
             <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.team') }}
                </button>
            </div>
        </form>
</div>
@endsection
