@extends('citizen.layout.app')
@section('content')
{{-- @dump($hoso) --}}
<script type="text/javascript">

    
    var pusher = new Pusher('aa4d6d77e1498fc55765', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel-manager');
    channel.bind('my-event-manager', function(data) {

      var username_citizen = document.getElementById('username_citizen').innerHTML;
      //alert(JSON.stringify(data));
      //console.log(data.hs[0].id);
      //console.log(data.hs[0].status);

      //localStorage.setItem('numberOfMessage',data.numberOfMessage);
      console.log(data);

      if(username_citizen == data.hs[0].namecitizen){

        var id = String(data.hs[0].id_hoso);
        var trangthai = 'trangthai'+id;
        //var length = data.contentOfMessage.length;


        var oldStatus = document.getElementById(trangthai).innerHTML;
        var oldNote = document.getElementById('thongbao'+id).innerHTML;
        var newStatus = data.hs[0].status;
        var newNote = data.hs[0].note;

        if(localStorage.getItem('numberOfMessage'+username_citizen) == null){
          localStorage.setItem('numberOfMessage'+username_citizen,0);
        }

        // if(oldStatus != newStatus || oldNote != newNote){
        //   // var newNumberOfMessage = localStorage.getItem('numberOfMessage') + '1';
        //   // localStorage.setItem('numberOfMessage',newNumberOfMessage);
        //   localStorage.setItem('numberOfMessage',data.numberOfMessage);
        //   console.log(localStorage.getItem('numberOfMessage'));
        // }

        if(oldStatus != newStatus){
          var count = parseInt(localStorage.getItem('numberOfMessage'+username_citizen));
          count = count + 1;
          localStorage.setItem('numberOfMessage'+username_citizen,count);

          document.getElementById('CONTENT_MESSAGE').innerHTML = "";
          var node = document.createElement("p");
          var textnode = document.createTextNode(data.hs[0].status);
          node.appendChild(textnode);  
          node.setAttribute("style", "color: red;font-weight:bold");
          node.setAttribute("class","dropdown-item");
          document.getElementById("CONTENT_MESSAGE").appendChild(node);
        }

        

        if(oldNote != newNote && newNote != null){

          //console.log(oldNote +'and'+newNote);
          var count = parseInt(localStorage.getItem('numberOfMessage'+username_citizen));
          count = count + 1;
          localStorage.setItem('numberOfMessage'+username_citizen,count);

          document.getElementById('CONTENT_MESSAGE').innerHTML = "";
          var node = document.createElement("p");
          var textnode = document.createTextNode(data.hs[0].note);
          node.appendChild(textnode);  
          node.setAttribute("style", "color: red;font-weight:bold");
          node.setAttribute("class","dropdown-item");
          document.getElementById("CONTENT_MESSAGE").appendChild(node);
        }

        // if(oldNote != newNote){
        //   console.log(oldNote+newNote);
        // }



        document.getElementById(trangthai).innerHTML = data.hs[0].status;
        document.getElementById('thongbao'+id).innerHTML = data.hs[0].note;

        document.getElementById('messageThongbao').innerHTML = localStorage.getItem('numberOfMessage'+username_citizen);

          

        // document.getElementById('CONTENT_MESSAGE').innerHTML = "";
          

        // for(var i = 0 ; i < length; ++i){

        //   var node = document.createElement("p");
        //   var textnode = document.createTextNode(data.contentOfMessage[i]);
        //   node.appendChild(textnode);  
        //   node.setAttribute("style", "color: red;font-weight:bold");
        //   node.setAttribute("class","dropdown-item");
        //   document.getElementById("CONTENT_MESSAGE").appendChild(node);

        //   var node2 = document.createElement("div");
        //   node2.setAttribute("class","dropdown-divider");
        //   document.getElementById("CONTENT_MESSAGE").appendChild(node2);

        // }



      }

      
      


    


    });

    //Xử lý Thông báo
    

</script>

<div style="text-align: right">
<div class="dropdown">
  <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">
    Thông Báo
    <span class="badge badge-danger" id='messageThongbao'>
        0
    </span>
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    
    <div id='CONTENT_MESSAGE'>
      {{-- @if(Session::has('contentOfMessage'.Session::get('USERNAME_CITIZEN')) && Session::get('contentOfMessage'.Session::get('USERNAME_CITIZEN')) != null)
          @foreach(Session::get('contentOfMessage'.Session::get('USERNAME_CITIZEN')) as $key=>$item)
            <p class="dropdown-item" style="color: red;font-weight:bold" id="{{'ITEM_MESSAGE'.$key}}">{{$item}}</p>
            <div class="dropdown-divider"></div>
          @endforeach
      @else 
      <p class="dropdown-item" style="color: red;font-weight:bold" id="HIDE_TEXT">
        Không Có Thông Báo Mới
      </p>
      @endif --}}
    </div>

    <p class="dropdown-item" style="color: red;font-weight:bold" id="THEM_MESSAGE"></p>
  
    <div class="dropdown-divider"></div>
    <button class="dropdown-item btn btn-primary" id="deleteAllMessage">
      {{-- <a href="{{route('delete-all-message')}}"> --}}
        Xóa Toàn Bộ
      {{-- </a> --}}
    </button>
  </div>
</div>
</div>


<h2>Danh sách hồ sơ của bạn : <span id="username_citizen">{{Session::get('USERNAME_CITIZEN')}}</span></h2>


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


        {{-- <td id="{{'thongbao'.$hoso->id_hoso}}">
          @if($hoso->note == null)
            Không có thông báo gì
          @else 
            {{$hoso->note}}
          @endif
        </td> --}}

        @if($hoso->note == null)
        <td id="{{'thongbao'.$hoso->id_hoso}}">Không có thông báo gì</td>
        @else 
        <td id="{{'thongbao'.$hoso->id_hoso}}">{{$hoso->note}}</td>
        @endif


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



<script>
    var username_citizen = document.getElementById('username_citizen').innerHTML;

    if(localStorage.getItem('numberOfMessage'+username_citizen)){
      document.getElementById('messageThongbao').innerHTML = localStorage.getItem('numberOfMessage'+username_citizen);
    }else{
      document.getElementById('messageThongbao').innerHTML = 0;
    }


    $(document).ready(function() {
      $('#deleteAllMessage').click(function() {
        var username_citizen = document.getElementById('username_citizen').innerHTML;
        localStorage.removeItem('numberOfMessage'+username_citizen);
        $('#messageThongbao').html(0);
      });
    });
</script>
@endsection