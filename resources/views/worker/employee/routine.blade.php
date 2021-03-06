@extends('layouts.worker')
@section('title','仕事リスト')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>仕事リスト({{$username->name}})</h2>
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
                                <th>{{$routine->jobname}}</th>
                                <td>{{$routine->set.$routine->settime }}</td>
                                <td>{{ \Str::limit($routine->content, 80) }}</td>
                                @if($routine->important == "毎日" || $routine->important == "週2~3回")
                                <th><font color="blue">{{$routine->important}}</font></th>
                                @else
                                <td>{{$routine->important}}</td>
                                @endif
                                <td>
                                    <div>
                                        <a href="{{action('Worker\EmployeeController@details',['id'=> $routine->id])}}">詳細</a>
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