@extends('layouts.worker')
@section('title','日報確認')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>日報確認({{$username->name}})</h2>
                {{-- フラッシュメッセージ --}}
                @if(session('message'))
                <message></message>
                <div class="alert alert-info text-center flash-message">{{ session('message') }}</div>
                @endif
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
                                <th>
                                    @if($daily->day>date('Y-m-d'))
                                    <font size="+1">{{$daily->day}}
                                    <br><font color="orangered">(予定)</font></font>
                                    @elseif($daily->day==date('Y-m-d'))
                                    <font size="+1">{{$daily->day}}
                                    <br><font color="green">(今日)</font></font>
                                    @elseif(!is_null($latest)&& ($latest->day==$daily->day))
                                    <font size="+1">{{$daily->day}}
                                    <br><font color="blue">(先日)</font></font>
                                    @else
                                    {{$daily->day}}
                                    @endif
                                </th>
                                <td><textarea readonly class="form-control" 
                                rows="{{substr_count($daily->timetable,"\n")>=substr_count($daily->impress,"\n")?
                                substr_count($daily->timetable,"\n")+1:substr_count($daily->impress,"\n")+1}}"
                                >{{$daily->timetable}}</textarea></td>
                                <td><textarea readonly class="form-control" 
                                rows="{{substr_count($daily->timetable,"\n")>=substr_count($daily->impress,"\n")?
                                substr_count($daily->timetable,"\n")+1:substr_count($daily->impress,"\n")+1}}"
                                >{{$daily->impress}}</textarea></td>
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