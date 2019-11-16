@extends('layouts.worker')
@section('title','日報確認')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>日報確認({{$username->name}})</h2>
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
                                <th width="30%">仕事内容</th>
                                <th width="30%">所感</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $daily)
                            <tr>
                                <th>{{$daily->day}}</th>
                                <td><textarea readonly class="form-control" rows="9">{{$daily->timetable }}</textarea></td>
                                <td><textarea readonly class="form-control" rows="9">{{$daily->impress}}</textarea></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-5">
                <tr>{!! $posts->appends(['id'=>$username->id])->render() !!}</tr>
            </div>
        </div>
    </div>
@endsection