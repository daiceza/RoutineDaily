@extends('layouts.worker')
@section('title','仕事リスト作成')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>仕事リスト作成</h2>
                <form action="{{ action('Worker\RoutineController@create') }}"
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
                            value="{{(empty($routine_form)) ? old('jobname') : $routine_form->jobname }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">単位</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="set" 
                            value="{{(empty($routine_form)) ? old('set','1セット') : $routine_form->set }}">
                        </div>
                        <label class="col-md-2">目安時間</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="settime" 
                            value="{{(empty($routine_form)) ? old('settime') : $routine_form->settime }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="content" rows="7" required>{{(empty($routine_form)) ? old('content') : $routine_form->content}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">マニュアル</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="manual" rows="7">{{(empty($routine_form)) ? old('manual') : $routine_form->manual}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">重要度</label>
                        <div class="col-md-3">
                            <select name="important">
                                <option value="毎日" {{ (empty($routine_form)) ? 'selected' : $routine_form->important == '毎日' ? 'selected' : ''}}>毎日</option>
                                <option value="週2~3回" {{ (empty($routine_form)) ? '' :$routine_form->important == '週2~3回' ? 'selected' : '' }}>週2~3回</option>
                                <option value="週1回" {{ (empty($routine_form)) ? '' :$routine_form->important == '週1回' ? 'selected' : '' }}>週1回</option>
                                <option value="月1回" {{ (empty($routine_form)) ? '' :$routine_form->important == '月1回' ? 'selected' : '' }}>月1回</option>
                                <option value="ほぼやらない" {{ (empty($routine_form)) ? '' :$routine_form->important == 'ほぼやらない' ? 'selected' : '' }}>ほぼやらない</option>
                            </select>
                            <!--<input type="text" class="form-control" name="important" value="{{old('important')}}">-->
                        </div>
                    </div>
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="作成">
                </form>
            </div>
        </div>
    </div>
@endsection