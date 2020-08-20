

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('homecitizen')}}">Trang Chủ <span class="sr-only">(current)</span></a>
            </li>
            @if(Session::has('USERNAME_CITIZEN'))


            <li class="nav-item dropdown">
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
            </li>

            {{-- <li class="nav-item dropdown">
              <p class="nav-link">
                Thông Báo
                <span class="badge badge-danger" id='messageThongbao'>
                  @if(isset($_COOKIE['numberOfMessage']))
                    {{$_COOKIE['numberOfMessage']}}
                  @else
                    0
                  @endif
                </span>
              </p>
            </li> --}}

            <li class="nav-item">
              <p class="nav-link" id="USERNAME_CITIZEN">{{Session::get('USERNAME_CITIZEN')}}</p>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('dangxuat')}}">Đăng Xuất</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{route('dangnhap')}}">Đăng Nhập</a>
            </li>
            <li class="nav-item dropdown">
             <a class="nav-link" href="{{route('dangky')}}">Đăng Ký</a>
            </li>
            @endif
            
          </ul>
        </div>
      </nav>


<script>
    var username_citizen = document.getElementById('USERNAME_CITIZEN').innerHTML;

    if(localStorage.getItem('numberOfMessage'+username_citizen)){
      document.getElementById('messageThongbao').innerHTML = localStorage.getItem('numberOfMessage'+username_citizen);
    }else{
      document.getElementById('messageThongbao').innerHTML = 0;
    }


    $(document).ready(function() {
      $('#deleteAllMessage').click(function() {
        var username_citizen = document.getElementById('USERNAME_CITIZEN').innerHTML;
        localStorage.removeItem('numberOfMessage'+username_citizen);
        $('#messageThongbao').html(0);
      });
    });
</script>