@extends('layouts.worker')
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
                                <th width="15%">所属</th>
                                <th width="15%">入社年</th>
                                <th width="35%">主な仕事</th>
                                <th width="10%">詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $user)
                            <tr>
                                <th>{{ \Str::limit($user->name, 20) }}</th>
                                <td>{{ \Str::limit('設備チーム', 25) }}</td>
                                <td>{{ \Str::limit('2015/11(4年目)',20)}}</td>
                                <td>{{ \Str::limit('洗い物',30)}}</td>
                                <td>詳細</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection