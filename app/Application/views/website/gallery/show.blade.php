@extends(layoutExtend('website'))

@section('title')
    {{ trans('gallery.gallery') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('gallery') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("gallery.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
		</table>

        @include('website.gallery.buttons.delete' , ['id' => $item->id])
        @include('website.gallery.buttons.edit' , ['id' => $item->id])
</div>
@endsection
