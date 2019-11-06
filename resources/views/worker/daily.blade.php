@extends('layouts.worker')
@section('title','日報確認')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>日報確認画面</h2>
            </div>
            <div class="col-md-4">
                <a href="{{action('Worker\DailyController@add')}}" role="button" class="btn btn-primary">日報作成</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <td width="10%">日付</td>
                                <td width="50%">仕事内容</td>
                                <td width="20%">所感</td>
                                <td width="10%">操作</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $daily)
                            <tr>
                                <td>{{ \Str::limit($daily->day, 10) }}</td>
                                <td>{{ \Str::limit($daily->timetable, 150) }}</td>
                                <td>{{ \Str::limit($daily->impress, 150) }}</td>
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