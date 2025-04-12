@extends(layoutExtend('website'))

@section('title')
    {{ trans('faculty.faculty') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="col-lg-12">
        <a href="{{ url('faculty') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("faculty.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
		</table>

        @include('website.faculty.buttons.delete' , ['id' => $item->id])
        @include('website.faculty.buttons.edit' , ['id' => $item->id])
</div>
@endsection
