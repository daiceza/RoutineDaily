@extends('layouts.worker')
@section('title','従業員リスト')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>従業員リスト</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%">名前</th>
                                <th width="60%">所属</th>
                                <th width="20%">入社年</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--@foreach --}}
                            <tr>
                                <th>{{ \Str::limit('佐藤優', 100) }}</th>
                                <td>{{ \Str::limit('設備チーム', 25) }}</td>
                                <td>{{ \Str::limit('2015/11(4年目)',20)}}</td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection