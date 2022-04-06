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
@endsection