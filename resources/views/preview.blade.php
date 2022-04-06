@extends('layouts.header')
@section('content')
<h2>{{$data->title}}</h2>
<small>
    <b>Created at :</b> {{$data->created_at}}
</small>
<br>
<small>
    <b>Updated at :</b> {{$data->updated_at}}
</small>
<br><br>
<div class="cd-page-descroption">
    {!! $data->description !!}
</div>
<div class="row ms-2 cd-submit-button" style="width: 20%">
    <a class="btn" href="{{url('add-page/'.$data->page_uid)}}">Use</a>
    <a class="btn" href="{{url('add-page/0')}}">Back</a>
</div>

@endsection