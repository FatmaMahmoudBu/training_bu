@extends(layoutExtend('website'))
 @section('title')
    {{ trans('school.school') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('school') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('school/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("website.school.relation.administration.edit")
                <div class="form-group  {{  $errors->has("name.ar")  &&  $errors->has("name.en")  ? "has-error" : "" }}" >
   <label for="name">{{ trans("school.name")}}</label>
    {!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "school") !!}
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
   <div class="form-group  {{  $errors->has("address.ar")  &&  $errors->has("address.en")  ? "has-error" : "" }}" >
   <label for="address">{{ trans("school.address")}}</label>
    {!! extractFiled(isset($item) ? $item : null , "address", isset($item->address) ? $item->address : old("address") , "textarea" , "school" ) !!}
  </div>
   @if ($errors->has("address.ar"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("address.ar") }}</strong>
     </span>
    </div>
   @endif
   @if ($errors->has("address.en"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("address.en") }}</strong>
     </span>
    </div>
   @endif
   <div class="form-group {{ $errors->has("administration_id") ? "has-error" : "" }}" > 
   <label for="administration_id">{{ trans("school.administration_id")}}</label>
    <input type="text" name="administration_id" class="form-control" id="administration_id" value="{{ isset($item->administration_id) ? $item->administration_id : old("administration_id") }}"  placeholder="{{ trans("school.administration_id")}}">
  </div>
   @if ($errors->has("administration_id"))
    <div class="alert alert-danger">
     <span class='help-block'>
      <strong>{{ $errors->first("administration_id") }}</strong>
     </span>
    </div>
   @endif
             <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.school') }}
                </button>
            </div>
        </form>
</div>
@endsection
