@extends('layouts.worker')
@section('title','仕事リスト')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>仕事リスト(従業員名)</h2>
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
                                <th>{{ \Str::limit($routine->jobname, 100) }}</th>
                                <td>{{ \Str::limit($routine->settime, 200) }}</td>
                                <td>{{ \Str::limit($routine->content, 100}}</td>
                                <td>{{ \Str::limit($routine->important, 200) }}</td>
                                <td>
                                    <div>
                                        <a>詳細</a>
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