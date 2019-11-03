@extends('layouts.worker')
@section('title','従業員リスト')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>従業員リスト</h2>
            </div>
            <div class="col-md-4">
                <a href="{{action('Admin\ProfileController@add')}}" role="button" class="btn btn-primary">新規作成</a>
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
                            {{--@foreach --}}
                            <tr>
                                <th>{{ \Str::limit('佐藤優', 20) }}</th>
                                <td>{{ \Str::limit('設備チーム', 25) }}</td>
                                <td>{{ \Str::limit('2015/11(4年目)',20)}}</td>
                                <td>
                                    <div>
                                        <a href="{{ action('Admin\ProfileController@edit')}}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ action('Admin\ProfileController@delete')}}">削除</a>
                                    </div>
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection