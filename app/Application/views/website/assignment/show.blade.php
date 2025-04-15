@extends(layoutExtend('website'))

@section('title')
    {{ trans('assignment.assignment') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('assignment') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("assignment.trainee_id") }}</th>
					<td>{{ nl2br($item->trainee_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("assignment.supervisor_id") }}</th>
					<td>{{ nl2br($item->supervisor_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("assignment.report_path") }}</th>
					<td>{{ nl2br($item->report_path) }}</td>
				</tr>
		</table>

        @include('website.assignment.buttons.delete' , ['id' => $item->id])
        @include('website.assignment.buttons.edit' , ['id' => $item->id])
</div>
@endsection
