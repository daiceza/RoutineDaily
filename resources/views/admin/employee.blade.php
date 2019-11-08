@extends('layouts.admin')
@section('title','従業員リスト')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>従業員リスト</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%">名前</th>
                                <th width="40%">所属</th>
                                <th width="20%">入社年</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $user)
                            <tr>
                                <th>{{ \Str::limit($user->name, 20) }}</th>
                                <td>{{ \Str::limit($user->team, 25) }}</td>
                                <td>{{ \Str::limit($user->join, 20)}}</td>
                                <td>
                                    <div>
                                        <a href="{{action('Admin\EmployeeController@edit',['id' => $user->id])}}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{action('Admin\EmployeeController@delete',['id' => $user->id])}}">削除</a>
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