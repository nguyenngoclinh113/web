@extends('master')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<br><br>

<div class="container">
  <div class="panel-group">
    <div class="panel panel-info">
      <div class="panel-heading">Vui l??ng t???o m???t kh???u m???i</div><br>

    <form class="form-horizontal" action="{{ route('password.request') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label class="control-label col-sm-4" for="email">Email:</label>
                <div class="col-sm-6">
                <input type="email" class="form-control" id="email" placeholder="Nh???p email c???a b???n" name="email" value="{{ $email ?? old('email') }}"  required="">
                                @if ($errors->has('email'))
                                    <span class="text-danger" style="font-size: 12px;">
                                        * {{ $errors->first('email') }}
                                    </span>
                                @endif
                </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-4" for="email">M???t kh???u m???i:</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" id="password" placeholder="Nh???p m???t kh???u m???i" name="password" required="">
                </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-4" for="email">Nh???p l???i m???t kh???u m???i:</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" id="password-confirm" placeholder="Nh???p l???i m???t kh???u m???i" name="password_confirmation"  required="">
                </div>
         </div>
    
        <div class="form-group">        
            <div class="col-sm-offset-4 col-sm-10" >
                <button type="submit" class="btn btn-primary">&nbsp; C???p nh???t m???t kh???u m???i &nbsp; </button>
            </div>
        </div>
    </form>
    </div>

    
  </div>
</div>
<br><br>
@endsection
