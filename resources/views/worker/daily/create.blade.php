@extends('layouts.worker')
@section('title','日報作成')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>日報作成</h2>
                <form action="{{ action('Worker\DailyController@create')}}"
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
                            <input type="date" class="form-control" name="day" value="<?php echo date('Y-m-d');?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">勤務時間</label>
                        <div class="col-md-2">
                            <input type="time" class="form-control" name="jobstart"
                            value="{{ !is_null($latest) ? $latest->jobstart : '09:00'}}" required>
                        </div>
                        <div class="col-md-1">
                            <a>～</a>
                        </div>
                        <div class="col-md-2">
                            <input type="time" class="form-control" name="jobend"
                            value="{{ !is_null($latest) ? $latest->jobend : '18:00'}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">休憩時間</label>
                        <div class="col-md-2">
                            <input type="time" class="form-control" name="breakstart"
                            value="{{ !is_null($latest) ? $latest->breakstart : '12:00'}}">
                        </div>
                        <div class="col-md-1">
                            <a>～</a>
                        </div>
                        <div class="col-md-2">    
                            <input type="time" class="form-control" name="breakend"
                            value="{{ !is_null($latest) ? $latest->breakend : '13:00'}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        @if(!is_null($latest))
                        <label class="col-md-2">仕事内容</label>
                            <div class="col-md-4">
                            <textarea class="form-control" name="timetable" rows="9" required>{{$latest->timetable}}</textarea>
                            </div>
                        <label class="col-md-2">先日の仕事<br>{{ $latest->day}}
                        <br>{{date($latest->day)==date('Y-m-d',strtotime("-1 day")) ? '(昨日)':''}}</label>
                            <div class="col-md-4">
                            <textarea readonly class="form-control" rows="9">{{$latest->timetable}}</textarea>
                            </div>
                        @else
                        <label class="col-md-2">仕事内容</label>
                            <div class="col-md-4">
                            <textarea class="form-control" name="timetable" rows="9">{{$template}}</textarea>
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
                            <textarea class="form-control" name="impress" rows="3">{{ !is_null($latest) ? $latest->impress : ''}}</textarea>
                        </div>
                    </div>
                    <!--次回の予定 DBはusers.table-->
                    <div class="form-group row">
                        <label class="col-md-2">次の勤務日</label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="nextday" value="<?php echo date('Y-m-d',strtotime('tomorrow'));?>"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">次の仕事予定</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="next" rows="3">{{Auth::user()->nextday>date('Y-m-d') ? Auth::user()->next : ''}}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">     
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="作成">
                </form>
            </div>
        </div>
    </div>
@endsection