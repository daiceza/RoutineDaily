@extends('layouts.admin')
@section('title','従業員リスト')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>従業員リスト</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="15%">名前</th>
                                <th width="10%">従業員番号</th>
                                <th width="20">メールアドレス</th>
                                <th width="20%">所属</th>
                                <th width="15%">入社年</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $user)
                            <tr>
                                <th>{{$user->name}}</th>
                                <td>{{$user->employee}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->team}}</td>
                                <td>{{$user->join}}</td>
                                <td>
                                    <div>
                                        <a href="{{action('Admin\EmployeeController@edit',['id' => $user->id])}}">編集</a>
                                    </div>
                                    <div>
                                        @if($user->id != Auth::user()->id)
                                        <a href="{{action('Admin\EmployeeController@delete',['id' => $user->id])}}">削除</a>
                                        @endif
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