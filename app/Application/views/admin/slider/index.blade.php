@extends(layoutExtend())

@section('title')
     {{ trans('slider.slider') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/slider/pluck') }}" ><i class="fa fa-trash"></i></button>
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
			<input type="text" name="title" class="form-control " placeholder="{{ trans("slider.title") }}" value="{{ request()->has("title") ? request()->get("title") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="text" class="form-control " placeholder="{{ trans("slider.text") }}" value="{{ request()->has("text") ? request()->get("text") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="date" class="form-control datepicker2" placeholder="{{ trans("slider.date") }}" value="{{ request()->has("date") ? request()->get("date") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="gallery" class="form-control " placeholder="{{ trans("slider.gallery") }}" value="{{ request()->has("gallery") ? request()->get("gallery") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="video" class="form-control " placeholder="{{ trans("slider.video") }}" value="{{ request()->has("video") ? request()->get("video") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="status" class="form-control " placeholder="{{ trans("slider.status") }}" value="{{ request()->has("status") ? request()->get("status") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="presentation" class="form-control " placeholder="{{ trans("slider.presentation") }}" value="{{ request()->has("presentation") ? request()->get("presentation") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('admin/slider') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('slider.slider') , 'model' => 'slider' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection