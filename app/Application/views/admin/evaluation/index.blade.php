@extends(layoutExtend())

@section('title')
     {{ trans('evaluation.evaluation') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/evaluation/pluck') }}" ><i class="fa fa-trash"></i></button>
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
			<input type="text" name="trainee_id" class="form-control " placeholder="{{ trans("evaluation.trainee_id") }}" value="{{ request()->has("trainee_id") ? request()->get("trainee_id") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="supervisor_id" class="form-control " placeholder="{{ trans("evaluation.supervisor_id") }}" value="{{ request()->has("supervisor_id") ? request()->get("supervisor_id") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="comments" class="form-control " placeholder="{{ trans("evaluation.comments") }}" value="{{ request()->has("comments") ? request()->get("comments") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="score" class="form-control " placeholder="{{ trans("evaluation.score") }}" value="{{ request()->has("score") ? request()->get("score") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('admin/evaluation') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('evaluation.evaluation') , 'model' => 'evaluation' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection