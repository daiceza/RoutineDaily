@extends('layouts.worker')
@section('title','日報編集')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>日報編集</h2>
                <form action="{{ action('Worker\DailyController@update')}}"
                method="post" enctype="multipart/form-data">
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">日付</label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="day" value="{{ $daily_form->day}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">勤務時間</label>
                        <div class="col-md-2">
                            <input type="time" class="form-control" name="jobstart"
                            value="{{ $daily_form->jobstart}}" required>
                        </div>
                        <div class="col-md-1">
                            <a>～</a>
                        </div>
                        <div class="col-md-2">
                            <input type="time" class="form-control" name="jobend"
                            value="{{ $daily_form->jobend}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">休憩時間</label>
                        <div class="col-md-2">
                            <input type="time" class="form-control" name="breakstart"
                            value="{{ $daily_form->breakstart}}">
                        </div>
                        <div class="col-md-1">
                            <a>～</a>
                        </div>
                        <div class="col-md-2">    
                            <input type="time" class="form-control" name="breakend"
                            value="{{ $daily_form->breakend}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">仕事内容</label>
                            <div class="col-md-4">
                            <textarea class="form-control" name="timetable" rows="9"  required>{{$daily_form->timetable}}</textarea>
                            </div>
                        @if(!is_null($latest))
                        <label class="col-md-2">先日の仕事<br>{{ $latest->day}}</label>
                            <div class="col-md-4">
                            <textarea readonly class="form-control" rows="9">{{ $latest->timetable}}</textarea>
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">仕事リスト</label>
                        <div class="col-md-10">
                            <a> @if(count($routineposts)>0)
                                    @foreach($routineposts as $routine)
                                    {{$routine->jobname}}
                                    @endforeach
                                @else
                                仕事リストから仕事を登録しましょう。
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">所感</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="impress" rows="3">{{ $daily_form->impress}}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $daily_form->id }}">
                    <input type="hidden" name="users_id" value="{{ $daily_form->users_id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection