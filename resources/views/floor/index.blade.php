@extends('visual::basic.navigation')

@section('title')
{{ $display_name }}
@endsection

@section('content')
<div id="editor"><img src="/img/floors/{{ $name}}.png"></div>

<div id="quickviewDefault" class="quickview">
  <header class="quickview-header">
    <p class="title">{{ __("Edit map") }}</p>
    <span class="delete" data-dismiss="quickview"></span>
  </header>

  <div class="quickview-body">
    <div class="quickview-block">
      <button onclick="addLight()"><img src="/img/icons/bulb_on.png" width="75" height="75"></button>
      <button onclick="addTemp()"><img src="/img/icons/temp.png" width="75" height="75"></button>
      <button><img src="/img/icons/rollershutter.png" width="75" height="75"></button>
    </div>

    <div class="quickview-block">
	 <div class="infoblock"><div class="has-text-weight-bold">Element-ID: </div><div id="ID">ID</div></div>
    </div>

  </div>

  <footer class="quickview-footer">

  </footer>
</div>

<button class="button is-primary" data-show="quickview" data-target="quickviewDefault">Edit</button>
@endsection