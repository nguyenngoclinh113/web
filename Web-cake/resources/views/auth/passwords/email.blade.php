@extends('master')

@section('content')
<br><br>

<!-- <div class="container">
    <div class="panel panel-default">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"> 
                <div class="panel-heading">{{ __('Reset Password') }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row ">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div> -->
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
  <div class="panel-group">
    <div class="panel panel-info">
      <div class="panel-heading">Vui lòng nhập email đã đăng ký tài khoản</div><br>

    <form class="form-horizontal" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="control-label col-sm-3" for="email">Email:</label>
                <div class="col-sm-6">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" id="email" required="">
                
                </div>
         </div>
    
        <div class="form-group">        
            <div class="col-sm-offset-3 col-sm-10" >
                <button type="submit" class="btn btn-primary">&nbsp; Xác nhận email để tạo mật khẩu mới &nbsp; </button>
            </div>
        </div>
    </form>
    </div>

    
  </div>
</div>
<br><br>
@endsection
