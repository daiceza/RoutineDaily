@extends('layouts.worker')
@section('title','プロフィール確認')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-box card">
                <div class="card-header">プロフィール確認</div>

                <div class="card-body">
                    <form action="{{ action('Admin\EmployeeController@update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- 名前 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user_form->name }}" required autocomplete="name" readonly>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- メールアドレス→社員番号 -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user_form->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 社員番号 -->
                        <div class="form-group row">
                            <label for="employee" class="col-md-4 col-form-label text-md-right">{{ __('messages.employee') }}</label>

                            <div class="col-md-6">
                                <input id="employee" type="text" class="form-control @error('employee') is-invalid @enderror" name="employee" value="{{ $user_form->employee }}"
                                required autocomplete="employee" readonly>

                                @error('employee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- 所属--> 
                        <div class="form-group row">
                            <label for="team" class="col-md-4 col-form-label text-md-right">{{ __('messages.team') }}</label>

                            <div class="col-md-6">
                                <input id="team" type="text" class="form-control @error('team') is-invalid @enderror" name="team" value="{{ $user_form->team }}" required autocomplete="team" readonly>

                                @error('team')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- 入社年--> 
                        <div class="form-group row">
                            <label for="join" class="col-md-4 col-form-label text-md-right">{{ __('messages.join') }}</label>

                            <div class="col-md-6">
                                <input id="join" type="date" class="form-control @error('join') is-invalid @enderror" name="join" value="{{ $user_form->join }}" required autocomplete="join" readonly>

                                @error('join')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- 旧パスワード 
                        <div class="form-group row">
                        <label for="password" class="col-md-3 col-form-label">現在のパスワード</label>
                            <div class="col-md-9">
                                <input id="current" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>-->
                        <!-- パスワード
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード変更</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- パスワード 再入力
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messages.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="hidden" name="id" value="{{ $user_form->id}}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">更新</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection