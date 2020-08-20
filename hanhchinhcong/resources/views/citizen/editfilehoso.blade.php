@extends('citizen.layout.app')
@section('content')
<form method="POST" action="{{route('post-edit-file-hoso',$hoso->id)}}">
    <input type="file" value="{{$hoso->file}}" name="file" id="inputFile">
    <div id="note" style="color: red"></div>
    <button type="submit" id="OK">OK</button>
    {{csrf_field()}}
</form>

<script type="text/javascript">

$(document).ready(function(){
  $('#OK').click(function(event){
    var file  = $('#inputFile').val();
    
    if(file == ""){
      event.preventDefault();
      $('#note').html('Không được dể trống bất kỳ trường nào');
    }

    
  });
});

</script>
@endsection