@extends('layouts.admin')
@section('title','設定')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>設定</h2>
                <form action="{{ action('Admin\ConfigController@update') }}" method="post" enctype="multipart/form-data">
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">役職</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="team" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">仕事の単位</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="set" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">重要度</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="important" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">タイムテーブルテンプレート</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="timetable" rows="9"></textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection