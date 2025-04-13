@extends(layoutExtend('website'))

@section('title')
    {{ trans('administration.administration') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('administration') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("administration.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("administration.address") }}</th>
					<td>{{ nl2br($item->address_lang) }}</td>
				</tr>
		</table>

        @include('website.administration.buttons.delete' , ['id' => $item->id])
        @include('website.administration.buttons.edit' , ['id' => $item->id])
</div>
@endsection
