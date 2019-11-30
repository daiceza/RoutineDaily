@extends('layouts.admin')
@section('title','従業員編集')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-box card">
                <div class="card-header">従業員編集</div>
                <div class="card-body">
                    <form action="{{ action('Admin\EmployeeController@update') }}" method="post" enctype="multipart/form-data">
                        <!-- 名前 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user_form->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <!-- メールアドレス -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user_form->email }}" required autocomplete="email">
                            </div>
                        </div>
                        <!-- 社員番号 -->
                        <div class="form-group row">
                            <label for="employee" class="col-md-4 col-form-label text-md-right">{{ __('messages.employee') }}</label>

                            <div class="col-md-6">
                                <input id="employee" type="text" class="form-control @error('employee') is-invalid @enderror" name="employee" value="{{ $user_form->employee }}" required autocomplete="employee">
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
                                <input id="team" type="text" class="form-control" name="team" value="{{ $user_form->team }}" required autocomplete="team">
                            </div>
                        </div>
                        <!-- 入社年--> 
                        <div class="form-group row">
                            <label for="join" class="col-md-4 col-form-label text-md-right">{{ __('messages.join') }}</label>
                            <div class="col-md-6">
                                <input id="join" type="date" class="form-control" name="join" value="{{ $user_form->join }}" required autocomplete="join">
                            </div>
                        </div>
                        <!-- 管理者 hidden-->
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">権限</label>
                            <div class="col-md-3 form-check radio-inline">
                            <input type="radio" class="form-check-input" name="role" id="admin"
                            value='admin'{{ $user_form->role == 'admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="admin">管理者</label>
                            </div>
                            <div class="col-md-3 form-check radio-inline">
                            <input type="radio" class="form-check-input" name="role" id="worker" 
                            value='worker'{{ $user_form->role == 'worker' ? 'checked' : '' }}
                            {{ $user_form->id == Auth::user()->id ? 'disabled' : '' }}>
                            <label class="form-check-label" for="worker">従業員</label>
                            </div>
                        </div>
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