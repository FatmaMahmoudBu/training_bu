@extends(layoutExtend())

@section('title')
     {{ trans('image.image') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/image/pluck') }}" ><i class="fa fa-trash"></i></button>
    <button class="btn btn-success" onclick="checkAll(this)"  ><i class="fa fa-check-circle-o"></i> </button>
    <button class="btn btn-warning" onclick="unCheckAll(this)"  ><i class="fa fa-check-circle"></i> </button>
@endpush

@push('search')
    <form method="get" class="form-inline">
        <div class="form-group">
            <input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans('admin.from') }}" value="{{ request()->has('from') ? request()->get('from') : '' }}">
        </div>
        <div class="form-group">
            <input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans('admin.to') }}" value="{{ request()->has('to') ? request()->get('to') : '' }}">
        </div>
		<div class="form-group">
			<input type="text" name="title" class="form-control " placeholder="{{ trans("image.title") }}" value="{{ request()->has("title") ? request()->get("title") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="description" class="form-control " placeholder="{{ trans("image.description") }}" value="{{ request()->has("description") ? request()->get("description") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="gallery_id" class="form-control " placeholder="{{ trans("image.gallery_id") }}" value="{{ request()->has("gallery_id") ? request()->get("gallery_id") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('admin/image') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('image.image') , 'model' => 'image' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection