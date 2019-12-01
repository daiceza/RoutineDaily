@extends('layouts.worker')
@section('title','従業員リスト')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h2>従業員リスト</h2>
            </div>
            <div class="col-md-8">
                <form action="{{action('Worker\EmployeeController@employee')}}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">所属</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="my_team" value="{{Auth::user()->team}}"
                            title="所属を検索します、空欄で全員を表示します"/>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="所属検索"/>
                        </div>
                    </div>
                    
                </form>
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
                                <th>{{$user->name}}<br>{{$user->employee}}</th>
                                <td>{{$user->team}}</td>
                                <td>{{$user->join}}</td>
                                <td>
                                    @foreach($routineposts as $routine)
                                    @if($user->id ==$routine->users_id)
                                    {{$routine->jobname}}
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