@extends('citizen.layout.app')
@section('content')
<h2 class="mt-4">Bộ Thủ Tục</h2>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên Thủ Tục Hành Chính</th>
      <th scope="col">Mức Độ</th>
      <th scope="col">Lĩnh Vực</th>
    </tr>
  </thead>
  <tbody>
    @foreach($thutuc as $thutuc)
    <tr>
      <th scope="row">{{$thutuc->id}}</th>
      <td><a href={{route('detail_thutuc',$thutuc->id)}}>{{$thutuc->namethutuc}}</a></td>
      <td>{{$thutuc->mucdo}}</td>
      <td>{{$thutuc->namelinhvuc}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>

@endsection