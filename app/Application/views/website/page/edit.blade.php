@extends(layoutExtend('website'))
@section('title')
    {{ trans('page.page') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('content')
    <div class="col-lg-12">
        @include(layoutMessage('website'))
        <a href="{{ url('page') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}
        </a>
        <form action="{{ concatenateLangToUrl('page/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group {{  $errors->has("title.en")  &&  $errors->has("title.ar")  ? "has-error" : "" }}">
                <label for="title">{{ trans("page.title")}}</label>
                {!! extractFiled(isset($item) ? $item : null,  "title" , isset($item->title) ? $item->title : old("title") , "text" , "page") !!}
            @if ($errors->has("title.en"))
                    <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first("title.en") }}</strong>
                             </span>
                    </div>
                @endif
                @if ($errors->has("title.ar"))
                    <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first("title.ar") }}</strong>
                            </span>
                    </div>
                @endif
            </div>
            <div class="form-group {{  $errors->has("body.en")  &&  $errors->has("body.ar")  ? "has-error" : "" }}">
                <label for="body">{{ trans("page.body")}}</label>
                {!! extractFiled(isset($item) ? $item : null , "body" , isset($item->body) ? $item->body : old("body") , "textarea" , "page" , 'tinymce' ) !!}
                @if ($errors->has("body.en"))
                    <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first("body.en") }}</strong>
                             </span>
                    </div>
                @endif
                @if ($errors->has("body.ar"))
                    <div class="alert alert-danger">
                            <span class='help-block'>
                                <strong>{{ $errors->first("body.ar") }}</strong>
                            </span>
                    </div>
                @endif
            </div>
            <div class="form-group {{  $errors->has("active")   ? "has-error" : "" }}">
                <label for="active">{{ trans("page.active")}}</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="active"
                               {{ isset($item->active) && $item->active  == 0 ? "checked" : "" }} type="radio"
                               value="0">
                        {{ trans("page.No")}}
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" name="active"
                               {{ isset($item->active) && $item->active == 1 ? "checked" : "" }} type="radio" value="1">
                        {{ trans("page.Yes")}}
                    </label>
                </div>
                @if ($errors->has("active"))
                    <div class="alert alert-danger">
                        <span class='help-block'>
                            <strong>{{ $errors->first("active") }}</strong>
                        </span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default">
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.page') }}
                </button>
            </div>
        </form>
        @include("website.page.comment.edit")
    </div>
@endsection
