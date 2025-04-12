@extends(layoutExtend())

@section('title')
    home Control
@endsection


@section('content2')

    <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card card-block">
                    <div class="icon">
                        <i class="material-icons">find_in_page</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ trans('home.pages') }}</div>
                        <div class="number count-to" data-from="0" data-to="{{$data['pages']}}" data-speed="1000" data-fresh-interval="20">{{ $data['pages'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card card-block">
                    <div class="icon">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ trans('home.news') }}</div>
                        <div class="number count-to" data-from="0" data-to="{{$data['news']}}" data-speed="1000" data-fresh-interval="20">{{ $data['news'] }}</div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card card-block">
                    <div class="icon">
                        <i class="material-icons">info</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ trans('home.logs') }}</div>
                        <div class="number count-to" data-from="0" data-to="{{$data['logs']}}" data-speed="1000" data-fresh-interval="20">{{ $data['logs'] }}</div>
                    </div>
                </div>
            </div>
    </div>



    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="card card-block">
                <div class="header">
                    <h5>{{ trans('home.last_register_user') }}</h5>
                </div>
                <div class="body">
                    <div class="">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                            <tr>
                               <th>{{ trans('home.username') }}</th>
                                <th>{{ trans('home.created_at') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data['lastRegisterUser'] as $last)
                                <tr>
                                    <td>{{ $last->name }}</td>
                                    <td>{{ $last->created_at}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="card card-block">
                <div class="">
                    <div class="m-b--35 font-bold"><h5>{{ trans('home.admin_panel_log') }}</h5></div>
                    <ul class="list-unstyled m-x-n m-b-0">
                        @foreach($data['log'] as $Log)
                            <li class="b-t p-a-1">
                                <a href="{{ url('admin/log/'.$Log->id.'/view') }}" class="col-white">
                                    @if($Log->user)
                                        #{{ $Log->user->name }}
                                    @else
                                        {{ trans('admin.Visitor') }}
                                    @endif
                                    <span class="pull-right align-left">
                                         <b>{{ $Log->model }}</b> : {{ $Log->action }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection



