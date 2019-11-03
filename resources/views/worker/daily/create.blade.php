@extends('layouts.worker')
@section('title','日報作成')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>日報作成</h2>
                <form action="{{action('Worker\RoutineController@create')}}"
                method="post" enctype="multipart/form-data">
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">日付</label>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="day"
                            value="<?php echo date('Y-m-d');?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">勤務時間</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="jobstart"
                            value="9:00">
                        </div>
                        <div class="col-md-1">
                            <a>～</a>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="jobend"
                            value="18:00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">休憩時間</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="breakstart"
                            value="12:00">
                        </div>
                        <div class="col-md-1">
                            <a>～</a>
                        </div>
                        <div class="col-md-2">    
                            <input type="text" class="form-control" name="breakend"
                            value="13:00">
                        </div>
                    </div>
                    <div class="list col-md-12 mx-auto">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">時刻</th>
                                        <th width="20%">仕事内容</th>
                                        <th width="50%">本文</th>
                                        <th width="10%">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <th>9:00~10:00</th>
                                        <th>
                                            <select name="routine">
                                                
                                                <option value="test">掃除</option>
                                                
                                            </select>
                                        </th>
                                        <th></th>
                                        <th>操作</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        
                    <div class="form-group row">
                        <label class="col-md-2">詳細</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="2">{{ old('body')}}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection