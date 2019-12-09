@extends(Auth::check() ? 'layouts.worker':'layouts.app')
@section('title','新規登録')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-box card">
                <div class="card-header">{{ __('messages.Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- 名前 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- メールアドレス -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="employee" type="text" class="form-control @error('employee') is-invalid @enderror" name="employee" value="{{ old('employee') }}" required autocomplete="employee"
                                title='社員番号は数字4桁です'>

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
                                <input id="team" type="text" class="form-control @error('team') is-invalid @enderror" 
                                name="team" value="{{ old('team') }}" required autocomplete="team" list="teamlist"
                                title='プルダウンに所属がない場合、テキスト入力で作成できます'>
                                @if(!empty($teamlist))
                                <datalist id="teamlist">
                                    @foreach($teamlist as $teamlist)
                                    <option value="{{$teamlist->team}}"></option>
                                    @endforeach
                                </datalist>
                                @endif
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
                                <input id="join" type="date" class="form-control @error('join') is-invalid @enderror" name="join" value="{{ old('join','2018-04-01') }}" required autocomplete="join">

                                @error('join')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <!-- パスワード -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Password') }}</label>

                            <div class="col-md-6">
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messages.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- 管理者 hidden-->
                        <div class="form-group row">
                            <div class="col-md-6">
                                @guest
                                <input id="role" type="hidden" class="form-control @error('role') is-invalid @enderror" name="role" 
                                value="admin" required autocomplete="role">
                                @else
                                <input id="role" type="hidden" class="form-control @error('role') is-invalid @enderror" name="role" 
                                value="worker" required autocomplete="role">
                                @endguest

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
