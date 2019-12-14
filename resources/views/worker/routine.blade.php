@extends('layouts.worker')
@section('title','仕事リスト')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>仕事リスト</h2>
                @if(session('message'))
                <div class="float-right">{{ session('message') }}</div>
                @endif
                <a href="{{action('Worker\RoutineController@add')}}" role="button" class="btn btn-primary">新規作成</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%">仕事名</th>
                                <th width="15%">目安時間</th>
                                <th width="25%">内容</th>
                                <th width="20%">重要度</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($myposts as $myroutine)
                            <tr>
                                <th>{{$myroutine->jobname }}</th>
                                <td>{{$myroutine->set.$myroutine->settime }}</td>
                                <td>{{ \Str::limit($myroutine->content, 80) }}</td>
                                @if($myroutine->important == "毎日" || $myroutine->important == "週2~3回")
                                <th><font color="blue">{{$myroutine->important}}</font></th>
                                @else
                                <td>{{$myroutine->important}}</td>
                                @endif
                                <td>
                                    <div>
                                        <a href="{{action('Worker\RoutineController@edit',['id' => $myroutine->id])}}"
                                        >編集</a>
                                    </div>
                                    <div><!--onClick="return confirm('削除しますか?')"で確認する、JavaScriptを読み込みたい-->
                                        <a href="{{action('Worker\RoutineController@delete',['id' => $myroutine->id])}}"
                                         onclick="return confirmDelete();">削除</a>
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
            <div class="col-md-12 mx-auto">
               <h2>他の従業員の仕事</h2>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%">仕事名</th>
                                <th width="15%">目安時間</th>
                                <th width="25%">内容</th>
                                <th width="10%">重要度</th>
                                <th width="10%">従業員名</th>
                                <th width="10%">コピー</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($otherposts as $otherroutine)
                            <tr>
                                <th>{{$otherroutine->jobname}}</th>
                                <td>{{$otherroutine->set.$otherroutine->settime}}</td>
                                <td>{{ \Str::limit($otherroutine->content, 50) }}</td>
                                @if($otherroutine->important == "毎日" || $otherroutine->important == "週2~3回")
                                <th><font color="blue">{{$otherroutine->important}}</font></th>
                                @else
                                <td>{{$otherroutine->important}}</td>
                                @endif
                                <td>{{$otherroutine->user->name}}</td>
                                <td>
                                    <a href="{{action('Worker\RoutineController@add',['id' => $otherroutine->id])}}">コピー</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection