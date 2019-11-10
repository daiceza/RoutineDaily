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
                                <th>{{ \Str::limit($user->name, 20) }}<br>{{$user->employee}}</th>
                                <td>{{ \Str::limit($user->team, 25) }}</td>
                                <td>{{ \Str::limit($user->join->format('Y年m月'),20)}}</td>
                                <td>
                                    @foreach($routineposts as $routine)
                                    @if($user->id ==$routine->users_id)
                                    {{ \Str::limit($routine->jobname,30)}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    <div>
                                        <a href="{{action('Worker\EmployeeController@daily',['id'=>$user->id])}}">日報</a>
                                    </div>
                                    <div>
                                        <a href="{{action('Worker\EmployeeController@routine',['id'=>$user->id])}}">仕事</a>
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