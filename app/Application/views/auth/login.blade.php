@extends(layoutExtend('website'))

@section('content')
<section class="pt-5">


<div class="container pt-5 mt-5">
    <div class="row">
        <div class="col-md-12 pt-5 d-flex justify-content-center">
            <div class="col-md-6 panel panel-default">
                <div class="panel-heading">
                  <h3 class="text-center">{{ trans("website.login")}}</h3></div>
                <div class="panel-body">
                    <form id='form_login' class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ trans("user.email")}}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{ trans("user.password")}}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans("user.remember")}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                              <button class="g-recaptcha btn btn-primary"
                      data-sitekey="{{env('CAPTCHA_KEY')}}"
                      data-callback='onSubmit'
                      data-action='submit'>
                                  {{ trans("website.login")}}
                              </button>



                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('script')
<script src="https://www.google.com/recaptcha/api.js?hl=ar"></script>
<script>
  function onSubmit(token) {
    document.getElementById("form_login").submit();
  }
</script>
@endsection
