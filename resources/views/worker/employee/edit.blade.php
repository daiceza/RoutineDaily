@extends('layouts.admin')
@section('title','従業員編集')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>従業員編集</h2>
                <form action="{{ action('Admin\EmployeeController@update') }}" method="post" enctype="multipart/form-data">
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3">名前</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" value="{{ $user_form->name }}" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">メールアドレス</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="email" value="{{$user_form->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">従業員番号</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="employee" value="{{ $user_form->employee }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">所属</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="team" value="{{ $user_form->team }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">入社年月</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" name="join" value="{{ $user_form->join}}" readonly>
                        </div>
                    </div>
                    <!-- 旧パスワード -->
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
                    </div>
                    <!-- 新パスワード -->
                    <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label">新しいパスワード</label>
                        <div class="col-md-9">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- パスワード 再入力-->
                    <div class="form-group row">
                    <label for="password-confirm" class="col-md-3 col-form-label">{{ __('messages.Confirm Password') }}</label>
                        <div class="col-md-9">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $user_form->id}}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection