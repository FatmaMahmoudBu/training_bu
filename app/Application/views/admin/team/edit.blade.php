@extends(layoutExtend())
 @section('title')
    {{ trans('team.team') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
    @component(layoutForm() , ['title' => trans('team.team') , 'model' => 'team' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/team/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("admin.team.relation.faculty.edit")
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


   {{-- <div class="form-group  {{  $errors->has("type.en")  &&  $errors->has("type.ar")  ? "has-error" : "" }}" >
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
   @endif --}}


   <div class="form-group {{ $errors->has("type") ? "has-error" : "" }}" >
    <label for="type">{{ trans("team.type")}}</label>
    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input m-x-xs" name="type"
                   {{ isset($item->type) && $item->type  == 0 ? "checked" : "" }} type="radio" value="0">
            {{ trans("team.type_team")}}
        </label>
        <label class="form-check-label">
            <input class="form-check-input m-x-xs" name="type" {{ isset($item->type) && $item->type  == 1 ? "checked" : "" }} type="radio" value="1">
            {{ trans("team.type_coordinator")}}
        </label>
    </div>
    </div>
    @if ($errors->has("type"))
     <div class="alert alert-danger">
      <span class='help-block'>
       <strong>{{ $errors->first("type") }}</strong>
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

              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('team.team') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
