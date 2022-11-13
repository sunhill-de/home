@extends('visual::basic.navigation')

@section('title')
Camera Hauptseite
@endsection

@section('content')
@parent
<div class="columns is-multiline is-vcentered">
 @foreach ($cameras as $camera)
 <div class="column">
   <article class="tile is-child box">
    <p class="title">{{ $camera->name }}</p>
    <img src="{{ $camera->link_small }}" width="384" height="216">	
   </article>
 </div>
 @endforeach
 
</div>
@endsection
