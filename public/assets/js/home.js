function sendUrl(){
	url = $('#sendUrlInput').val();
	domain = extractDomain(url);
	//sending the url and the domain
	var host = 'http://'+window.location.hostname+'/';
	var data = {
		domain: domain,
		page: encodeURI(add_prefiix(url)),
		_token: $('#_token').val(),
	};
	$.post( 
		host+"pages", 
		data,
		function(data){
			create_page_list(data);
		}
	);
}

function create_page_list(data){
	var string = '<ul>';
	$.each( data, function( key,element ) {
  		string += '<li><a  target="_parent"  href="'+element['url']+'">'+element.url+'</a></li>'
	});
	string += '</ul>';
	$('#result').html(string);
}

function searchDomain(){
    search_number ++;
    var searchString = $('#sendDomain').val();
	var host = 'http://'+window.location.hostname+'/';
	var data = {
		q: searchString,
		_token: $('#_token').val(),
	};
	var li = '<li><a href="#tab_'+search_number+'" data-toggle="tab" aria-expanded="true">'+searchString+'</a></li>';
    $('#search-tabs').append(li);
     var results = '<div class="tab-pane" id="tab_'+search_number+'"> Searching.. </div>';
    $( "#search-results" ).append(results);

	$.get( 
		host+"domains/find", 
		data,
		function(data){
			string = "<ul>";
			$.each( data, function( key,element ) {
				console.log(element.domain);
  				string += '<li>'+element.domain+'</li>'
			});
			string += '</ul>'
			$('#tab_'+search_number).html(string);
		}
	);
    
   

}
