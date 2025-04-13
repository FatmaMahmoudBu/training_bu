@extends(layoutExtend())

@section('title')
     {{ trans('trainee.trainee') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/trainee/pluck') }}" ><i class="fa fa-trash"></i></button>
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
			<input type="text" name="name" class="form-control " placeholder="{{ trans("trainee.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="email" class="form-control " placeholder="{{ trans("trainee.email") }}" value="{{ request()->has("email") ? request()->get("email") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="phone" class="form-control " placeholder="{{ trans("trainee.phone") }}" value="{{ request()->has("phone") ? request()->get("phone") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="national_id" class="form-control " placeholder="{{ trans("trainee.national_id") }}" value="{{ request()->has("national_id") ? request()->get("national_id") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="school_id" class="form-control " placeholder="{{ trans("trainee.school_id") }}" value="{{ request()->has("school_id") ? request()->get("school_id") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('admin/trainee') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('trainee.trainee') , 'model' => 'trainee' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection