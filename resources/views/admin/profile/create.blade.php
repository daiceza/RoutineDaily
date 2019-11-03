@extends('layouts.worker')
@section('title','プロフィール作成')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール作成画面</h2>
                <form action="{{action('Admin\ProfileController@create')}}"
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
                            value="{{old('name')}}">
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">所属</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="belong"
                            value="{{old('belong')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">入社年</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="join" value="{{old('join')}}">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </form>
        </div>
    </div>
@endsection