@extends('citizen.layout.app')
@section('content')
<form method="POST" action="{{route('post-edit-file-hoso',$hoso->id)}}">
    <input type="file" value="{{$hoso->file}}" name="file">
    <button type="submit">OK</button>
    {{csrf_field()}}
</form>
@endsection