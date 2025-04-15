@extends(layoutExtend('website'))

@section('title')
    {{ trans('attendance.attendance') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('attendance') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("attendance.trainee_id") }}</th>
					<td>{{ nl2br($item->trainee_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("attendance.supervisor_id") }}</th>
					<td>{{ nl2br($item->supervisor_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("attendance.date") }}</th>
					<td>{{ nl2br($item->date) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("attendance.status") }}</th>
					<td>{{ nl2br($item->status) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("attendance.notes") }}</th>
					<td>{{ nl2br($item->notes_lang) }}</td>
				</tr>
		</table>

        @include('website.attendance.buttons.delete' , ['id' => $item->id])
        @include('website.attendance.buttons.edit' , ['id' => $item->id])
</div>
@endsection
