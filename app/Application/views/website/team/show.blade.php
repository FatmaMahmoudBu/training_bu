@extends(layoutExtend('website'))
 @section('title')
    {{ trans('team.team') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('team') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("team.name") }}</th>
     <td>{{ nl2br($item->name_lang) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("team.position") }}</th>
     <td>{{ nl2br($item->position_lang) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("team.type") }}</th>
     <td>{{ nl2br($item->type_lang) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("team.image") }}</th>
     <td>
     <img src="{{ small($item->image) }}" width="100" />
     </td>
    </tr>
    <tr>
    <th width="200">{{ trans("team.faculty_id") }}</th>
     <td>{{ nl2br($item->faculty_id) }}</td>
    </tr>
  </table>
         @include('website.team.buttons.delete' , ['id' => $item->id])
        @include('website.team.buttons.edit' , ['id' => $item->id])
</div>
@endsection
