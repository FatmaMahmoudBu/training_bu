@extends(layoutExtend('website'))
 @section('title')
    {{ trans('supervisor_trainee.supervisor_trainee') }} {{ trans('home.view') }}
@endsection
 @section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('supervisor_trainee') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
   <table class="table table-bordered  table-striped" > 
    <tr>
    <th width="200">{{ trans("supervisor_trainee.supervisor_id") }}</th>
     <td>{{ nl2br($item->supervisor_id) }}</td>
    </tr>
    <tr>
    <th width="200">{{ trans("supervisor_trainee.trainee_id") }}</th>
     <td>{{ nl2br($item->trainee_id) }}</td>
    </tr>
  </table>
         @include('website.supervisor_trainee.buttons.delete' , ['id' => $item->id])
        @include('website.supervisor_trainee.buttons.edit' , ['id' => $item->id])
</div>
@endsection
