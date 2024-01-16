@extends('visual::basic.navigation')

@section('title')
{{ $display_name }}
@endsection

@section('content')
<div id="map"><img src="/img/floors/{{ $map_name}}"></div>
<div class="items">
@foreach($items as $item)
<div class="item" id="{{ $item->id }}">A</div>
@endforeach
</div>
<script>
 $( function() {
 $(".map").css({position:'relative'});
 const item={!! $relocate !!} 
 item.forEach(function(entry) {
 	element = $("#"+entry.item.replace(".","\\."));
 	element.css({top: entry.y, left: entry.x, position:"absolute"});
 });
 
 const update_items={!! $update !!}
 function update()
 {
	 update_items.forEach(function(entry) {
		$.get("{{ asset("/ajax/") }}/infomarket?search="+entry.item+".value" , function(data) {
	 		element = $("#"+entry.item.replace(".","\\."));
			value = JSON.parse(data).value;
			switch (entry.type) {
				case "light":
				  if (value == 'ON') {
				  	element.html('<div class="item-lamp-on" id="'+entry.item+'">'+value+'</div>');				  
				  } else {
  				    element.html('<div class="item-lamp-off" id="'+entry.item+'">'+value+'</div>');				  
				  }
				  break;
				case "temperature":
				  element.html('<div class="item-temperature" id="'+entry.item+'">'+value+'</div>');
				  break;  
			}
    	}); 	
     });
 }
 update()
 })
</script>
@endsection