@extends('layouts.admin')
@section('title','従業員編集')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>従業員編集</h2>
                <form action="{{ action('Admin\EmployeeController@update') }}"
                method="post" enctype="multipart/form-data">
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name"
                            value="{{ $user_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">所属</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="team"
                            value="{{ $user_form->team }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">入社年月</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="join"
                            value="{{ $user_form->join }}">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $user_form->id}}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection