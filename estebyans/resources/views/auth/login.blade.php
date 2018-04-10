@extends('layouts.app')

@section('content')

<body >
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;">تسجيل الدخول</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                           <h4> <label for="email" class="col-md-0 control-label" style="float:right;margin:15px;" >البريد الخاص بك</label></h4>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  required  style=" padding: 22px 91px;text-align:center;"
	oninvalid="this.setCustomValidity('من فضلك ادخل البريد الخاص بك ')"
 oninput="setCustomValidity('')"
								>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           <h4> <label for="password" class="col-md-0 control-label" style="float:right;margin:15px;">كلمه السر </label> </h4>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control" name="password" style=" padding: 22px 91px;text-align:center;" required 
								
			oninvalid="this.setCustomValidity('من فضلك ادخل كلمه السر ')"
 oninput="setCustomValidity('')"
								>

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
                                        <input type="checkbox" name="remember"> تذكرنى
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> سجل الدخول
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">نسيت كلمه السر؟</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<body>
@endsection
