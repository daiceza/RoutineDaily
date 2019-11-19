@extends('layouts.worker')
@section('title','仕事リスト')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>仕事リスト</h2>
                <a href="{{action('Worker\RoutineController@add')}}" role="button" class="btn btn-primary">新規作成</a>
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
                                <th width="20%">重要度</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $routine)
                            <tr>
                                <th>{{$routine->jobname }}</th>
                                <td>{{$routine->set.$routine->settime }}</td>
                                <td>{{$routine->content }}</td>
                                <td>{{$routine->important}}</td>
                                <td>
                                    <div>
                                        <a href="{{action('Worker\RoutineController@edit',['id' => $routine->id])}}"
                                        onclick="deleteconfirm()">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{action('Worker\RoutineController@delete',['id' => $routine->id])}}"
                                         onclick="deleteconfirm()">削除</a>
                                    </div>
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