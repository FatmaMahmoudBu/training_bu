@extends(layoutExtend('website'))

@section('title')
    {{ trans('supervisor.supervisor') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('supervisor') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("supervisor.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("supervisor.email") }}</th>
					<td>{{ nl2br($item->email) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("supervisor.phone") }}</th>
					<td>{{ nl2br($item->phone) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("supervisor.school_id") }}</th>
					<td>{{ nl2br($item->school_id) }}</td>
				</tr>
		</table>

        @include('website.supervisor.buttons.delete' , ['id' => $item->id])
        @include('website.supervisor.buttons.edit' , ['id' => $item->id])
</div>
@endsection
