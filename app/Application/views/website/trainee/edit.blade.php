@extends(layoutExtend('website'))
 @section('title')
    {{ trans('trainee.trainee') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('trainee') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('trainee/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include("website.trainee.relation.school.edit")
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
   <div class="form-group {{ $errors->has("image") ? "has-error" : "" }}" > 
			<label for="image">{{ trans("trainee.image")}}</label>
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
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.trainee') }}
                </button>
            </div>
        </form>
</div>
@endsection
