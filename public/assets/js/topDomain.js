var topDomain_data = {
	labels : [],
	datasets:[
		{
			data: []
		}
	]
};


	function topDomain_chart() {
		var can = jQuery('#topDomain_chart');
		var ctx = can.get(0).getContext("2d");
		var container = can.parent().parent(); // get width from proper parent
		var $container = jQuery(container);
		can.attr('width', $container.width()); //max width
		can.attr('height', $container.height()); //max height                   
		var chart = new Chart(ctx).Bar(topDomain_data);
	}

var topDomain_data = function(){

 topDomain_data = {
	labels : [],
	datasets:[
		{
			data: []
		}
	]
};
		var host = 'http://'+window.location.hostname+'/';

	jQuery.get( host+'domains/top', { 
			action: 'callback_id', 
			security: 'nonce' 
			},
			function( data ) {
				$.each( data, function( key,element ) {
  					topDomain_data.labels.push(element.label);
  					console.log(topDomain_data.labels);
  					topDomain_data.datasets[0].data.push(element.value);
				});
				topDomain_chart();
			}
		);
}

jQuery(document).ready(function($) {
	jQuery(window).resize(topDomain_chart);
	topDomain_data();
});