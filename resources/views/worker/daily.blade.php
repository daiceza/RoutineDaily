@extends('layouts.worker')
@section('title','日報確認')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>日報確認</h2>
                <a href="{{action('Worker\DailyController@add')}}" role="button" class="btn btn-primary">日報作成</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10%">日付</th>
                                <th width="30%">仕事内容</th>
                                <th width="30%">所感</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $daily)
                            <tr>
                                <th>{{$daily->day}}</th>
                                <td><textarea readonly class="form-control" rows="9">{{$daily->timetable}}</textarea></td>
                                <td><textarea readonly class="form-control" rows="9">{{$daily->impress}}</textarea></td>
                                <td>
                                    <div>
                                        <a href="{{action('Worker\DailyController@edit',['id' => $daily->id])}}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{action('Worker\DailyController@delete',['id' => $daily->id])}}">削除</a>
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