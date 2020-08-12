@extends('citizen.layout.app')
@section('content')
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Tên Thủ Tục</th>
      <th scope="col">{{$thutuc[0]->namethutuc}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Lĩnh Vực</th>
      <td>{{$thutuc[0]->namelinhvuc}}</td>
    </tr> 
    <tr>
      <th scope="row">Hướng dẫn nộp</th>
      <td>Ấn vào nút Nộp hồ sơ online</td>
    </tr> 
  </tbody>
  <tfoot>
      <tr>
          <th>
            <button class="btn btn-danger">
              <a href="{{route('nop_ho_so',$thutuc[0]->id)}}" style="color:white">
              Nộp Hồ Sơ Online
              </a>
            </button>
          </th>
      </tr>
  </tfoot>
</table>
@endsection