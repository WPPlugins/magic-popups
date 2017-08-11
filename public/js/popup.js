var display = fullpopup.datadisplay;

if(display == "onload"){
window.onload = function(){
	var monolog = new Monolog({
				loader  : false,
				content: "",
				close: true,
				onOpening: function() {
					//console.log('OPENING ...');
				},
				onOpened: function() {
					//console.log('... OPENED !');
					this.setContent(document.getElementById("postcontent").innerHTML);
				},
				onClosing: function() {
					//console.log('CLOSING ...');
				},
				onClosed : function () {
					//console.log('... CLOSED !');
				}
			});
			monolog.show();
}

}
else{
	var separators = [' ', '\\\+', '-', '\\\(', '\\\)', '\\*', '/', ':', '\\\?'];
//console.log(separators.join('|'));
var poptime = display.split(new RegExp(separators.join('|'), 'g'));

	var load_time = poptime[1] * 1000;
	//console.log(wait_time);
setTimeout(
  function displaywait() 
  {
    var monolog = new Monolog({
				loader  : false,
				content: "",
				close: true,
				onOpening: function() {
					//console.log('OPENING ...');
				},
				onOpened: function() {
					//console.log('... OPENED !');
					this.setContent(document.getElementById("postcontent").innerHTML);
				},
				onClosing: function() {
					//console.log('CLOSING ...');
				},
				onClosed : function () {
					//console.log('... CLOSED !');
				}
			});
			monolog.show();
  }, load_time);
}