@extends('citizen.layout.app')
@section('content')
{{-- @dump($hoso) --}}
<script>

    
    var pusher = new Pusher('aa4d6d77e1498fc55765', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel-manager');
    channel.bind('my-event-manager', function(data) {
      //alert(JSON.stringify(data));
      //console.log(data.hs[0].id);
      //console.log(data.hs[0].status);
      

      console.log(data.contentOfMessage);
      // console.log(sessionStorage.getItem('numberOfMessage'));
      
      var id = String(data.hs[0].id);
      var trangthai = 'trangthai'+id;
      var length = data.contentOfMessage.length;


      document.getElementById(trangthai).innerHTML = data.hs[0].status;
      document.getElementById('thongbao'+id).innerHTML = data.hs[0].note;

      document.getElementById('messageThongbao').innerHTML = data.numberOfMessage;

      // if(data.numberOfMessage != 0){

      //   document.getElementById('HIDE_TEXT').innerHTML = "";
      //   document.getElementById('THEM_MESSAGE').innerHTML = data.contentOfMessage[length-1];
      // }else{
      //   document.getElementById('THEM_MESSAGE').innerHTML = "";
      // }

      //document.getElementById('THEM_MESSAGE').innerHTML = data.contentOfMessage[length-1] ;
      // document.getElementById('CONTENT_MESSAGE').appendChild('<p>hhhhhhh</p>')

      // if(document.getElementById('CONTENT_MESSAGE').lastChild.innerHTML != data.contentOfMessage[length-1]){

        // if(length > 0){

        // document.getElementById('HIDE_TEXT').innerHTML = "";


        
        // var node = document.createElement("p");
        // var textnode = document.createTextNode(data.contentOfMessage[length-1]);
        // node.appendChild(textnode);  
        // node.setAttribute("style", "color: red;font-weight:bold");
        // node.setAttribute("class","dropdown-item");
        // document.getElementById("CONTENT_MESSAGE").appendChild(node);

        // var node2 = document.createElement("div");
        // node2.setAttribute("class","dropdown-divider");
        // document.getElementById("CONTENT_MESSAGE").appendChild(node2);
        // }
      // }

      // if(document.getElementById('CONTENT_MESSAGE')){
        document.getElementById('CONTENT_MESSAGE').innerHTML = "";
        // if(length == 0){
        //   document.getElementById('HIDE_TEXT').innerHTML = 'Không Có Thông báo mới';
        // }
      // }
        // var root = document.createElement('div');
        // root.setAttribute('id','CONTENT_MESSAGE');
      


      for(var i = 0 ; i < length; ++i){

        var node = document.createElement("p");
        var textnode = document.createTextNode(data.contentOfMessage[i]);
        node.appendChild(textnode);  
        node.setAttribute("style", "color: red;font-weight:bold");
        node.setAttribute("class","dropdown-item");
        document.getElementById("CONTENT_MESSAGE").appendChild(node);

        var node2 = document.createElement("div");
        node2.setAttribute("class","dropdown-divider");
        document.getElementById("CONTENT_MESSAGE").appendChild(node2);

      }


    

      

  


    });

    //Xử lý Thông báo

    
      
</script>


<h2>Danh sách hồ sơ của bạn</h2>


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Họ Tên Người Nộp</th>
      <th scope="col">File Hồ Sơ</th>
      <th scope="col">Trạng Thái Xử Lý</th>
      <th scope="col">Tên Cán Bộ Xử Lý</th>
      <th scope="col">Thông Báo Từ Cán bộ</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($hoso as $hoso)
        <tr>
        <th scope="row">{{$hoso->id}}</th>
        <td>{{$hoso->namecitizen}}</td>
        <td>{{$hoso->file}}</td>
        <td id="{{'trangthai'.$hoso->id_hoso}}">{{$hoso->status}}</td>
        <td>{{$hoso->name}}</td>
        <td id="{{'thongbao'.$hoso->id_hoso}}">
          @if($hoso->note == null)
            Không có thông báo gì
          @else 
            {{$hoso->note}}
          @endif
        </td>
        <td>
          <button class="btn btn-warning">
            <a href="{{route('edit-file-hoso',$hoso->id_hoso)}}" style="color: white">
              Sửa File Hồ Sơ
            </a>
          </button>
        </td>
        </tr>
      @endforeach
    
  </tbody>
</table>
@endsection