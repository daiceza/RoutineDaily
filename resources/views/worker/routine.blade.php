@extends('layouts.worker')
@section('title','仕事リスト')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>仕事リスト</h2>
            </div>
            <div class="col-md-4">
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
                                <th width="60%">詳細</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $routine)
                            <tr>
                                <th>{{ \Str::limit($routine->jobname, 100) }}</th>
                                <td>{{ \Str::limit($routine->body, 200) }}</td>
                                <td>
                                    <div>
                                        <a>編集</a>
                                    </div>
                                    <div>
                                        <a>削除</a>
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