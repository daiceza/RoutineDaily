@extends('layouts.worker')
@section('title','日報確認')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>日報確認(従業員名)</h2>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10%">日付</th>
                                <th width="50%">仕事内容</th>
                                <th width="20%">所感</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $daily)
                            <tr>
                                <th>{{ \Str::limit($daily->day, 10) }}</th>
                                <td><textarea readonly class="form-control" rows="3">{{$daily->timetable }}</textarea></td>
                                <td>{{ \Str::limit($daily->impress, 150) }}</td>
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