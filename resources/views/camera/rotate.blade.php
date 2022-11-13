@extends('visual::basic.navigation')

@section('title')
Camera Hauptseite
@endsection

@section('content')
@parent
 <script>
  $(function(){
	$('#diashow').cycle();
 });

 </script>
 <div id="diashow">
   @foreach ($cameras as $camera) 
   <img class="diashow_image" src="{{ $camera->link_large }}" width="1280" height="800">
   @endforeach
 </div>
@endsection
