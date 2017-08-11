// Inline popups
var effect = style_effect.dataeffect;
var display = style_effect.datadisplay;
if(display == "onload"){
	//console.log("display value is 1");
	jQuery(window).load(function(){
	jQuery.magnificPopup.open({
	  items: {src: '#test-popup'},type: 'inline',
	  removalDelay: 500, //delay removal by X to allow out-animation
	   callbacks: {
		beforeOpen: function() {
		  this.st.mainClass = effect;
		}
	  },
	  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
	  
	  }, 0);
	  
	});
}
else{
	//var x = "wait(5)";

var separators = [' ', '\\\+', '-', '\\\(', '\\\)', '\\*', '/', ':', '\\\?'];
//console.log(separators.join('|'));
var tokens = display.split(new RegExp(separators.join('|'), 'g'));

	var wait_time = tokens[1] * 1000;
	//console.log(wait_time);
setTimeout(
  function miniwait() 
  {
		//console.log(effect);
		//console.log(display);
		
		jQuery.magnificPopup.open({
		  items: {src: '#test-popup'},type: 'inline',
		  removalDelay: 500, //delay removal by X to allow out-animation
		   callbacks: {
			beforeOpen: function() {
			  this.st.mainClass = effect;
			}
		  },
		  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		  
		  }, 0);
		  
	
  
  }, wait_time);
}