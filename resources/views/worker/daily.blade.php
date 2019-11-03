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
                                <td width="70%">詳細</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ \Str::limit('2019/11/03', 10) }}</td>
                                <td>{{ \Str::limit('午前中: 午後:', 150) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection