@extends('layouts.worker')
@section('title','日報確認')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>日報確認</h2>
                @if(session('message'))
                <div class="float-right">{{ session('message') }}</div>
                @endif
                <a href="{{action('Worker\DailyController@add')}}" role="button" class="btn btn-primary">日報作成</a>
            </div>
        </div>
        <br>
        <div class="row">
            <form action="{{ action('Worker\DailyController@next')}}"
            method="post" enctype="multipart/form-data"
            class="col-md-12 mx-auto">
                @if(count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{$e}}</li>
                    @endforeach
                </ul>
                @endif
            <div class="row">
                <div class="col-md-3 mx-auto">
                    @if(Auth::User()->nextday>date('Y-m-d'))
                    <h3>次回の予定</h3>
                    <input type="date" class="form-control" name="nextday" value="{{Auth::User()->nextday}}"
                    title="次回の勤務日の予定です">
                    @elseif(Auth::User()->nextday==date('Y-m-d'))
                    <h3>今日の予定</h3>
                    <input type="date" class="form-control" name="nextday" value="{{Auth::User()->nextday}}"
                    title="明日以降の日付にして保存すると次回の予定になります">
                    @else
                    <h3>予定作成</h3>
                    <input type="date" class="form-control" name="nextday" value="<?php echo date('Y-m-d',strtotime('tomorrow'));?>"
                    title="予定を入れる日付を記入してください">
                    @endif
                </div>
                <div class="col-md-7 mx-auto">
                    <textarea class="form-control" name="next" rows="3" title="予定を記入してください">{{ Auth::User()->nextday>=date('Y-m-d') ? Auth::User()->next : ''}}</textarea>
                </div>
                <div class="col-md-2 mx-auto">
                    <!-- -->
                    <input type="hidden" name="id" value="{{ Auth::id()}}">     
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="予定編集">
                    <!-- -->
                </div>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10%">日付</th>
                                <th width="30%">仕事内容</th>
                                <th width="30%">所感</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $daily)
                            <tr>
                                <th>
                                    @if($daily->day>date('Y-m-d'))
                                    <font size="+1">{{$daily->day}}
                                    <br><font color="orangered">(予定)</font></font>
                                    @elseif($daily->day==date('Y-m-d'))
                                    <font size="+1">{{$daily->day}}
                                    <br><font color="green">(今日)</font></font>
                                    @elseif(!is_null($latest)&& ($latest->day==$daily->day))
                                    <font size="+1">{{$daily->day}}
                                    <br><font color="blue">(先日)</font></font>
                                    @else
                                    {{$daily->day}}
                                    @endif
                                </th>
                                <td><textarea readonly class="form-control"
                                rows="{{substr_count($daily->timetable,"\n")>=substr_count($daily->impress,"\n")?
                                substr_count($daily->timetable,"\n")+1:substr_count($daily->impress,"\n")+1}}"
                                >{{$daily->timetable}}</textarea></td>
                                <td><textarea readonly class="form-control"
                                rows="{{substr_count($daily->timetable,"\n")>=substr_count($daily->impress,"\n")?
                                substr_count($daily->timetable,"\n")+1:substr_count($daily->impress,"\n")+1}}"
                                >{{$daily->impress}}</textarea></td>
                                <td>
                                    <div>
                                        <a href="{{action('Worker\DailyController@edit',['id' => $daily->id])}}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{action('Worker\DailyController@delete',['id' => $daily->id])}}"
                                        onclick="return confirm('削除しますか?')">削除</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-5">
                <tr>{!! $posts->render() !!}</tr>
            </div>
        </div>
    </div>
@endsection