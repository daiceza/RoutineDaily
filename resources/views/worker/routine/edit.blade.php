@extends('layouts.worker')
@section('title','仕事リスト編集')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>仕事リスト編集</h2>
                <form action="{{ action('Worker\RoutineController@update') }}"
                method="post" enctype="multipart/form-data">
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">仕事名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="jobname"
                            value="{{ $routine_form->jobname }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">単位</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="set" value="{{$routine_form->set}}">
                        </div>
                        <label class="col-md-2">目安時間</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="settime" value="{{$routine_form->settime}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="content" rows="7">{{ $routine_form->content}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">マニュアル</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="manual" rows="7">{{ $routine_form->manual}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">重要度</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="important" value="{{$routine_form->important}}">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $routine_form->id}}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection