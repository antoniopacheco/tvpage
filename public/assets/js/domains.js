var search_number = 0;
function extractDomain(url) {
    var domain;
    //find & remove protocol (http, ftp, etc.) and get domain
    if (url.indexOf("://") > -1) {
        domain = url.split('/')[2];
    }
    else {
        domain = url.split('/')[0];
    }
    //find & remove port number
    domain = domain.split(':')[0];
    return domain;
}

function add_prefiix(url){
    var prefix = 'http://';
    var prefix2 = 'https://';
    if (url.substr(0, prefix.length) !== prefix && url.substr(0, prefix2.length) !== prefix2){
        url = prefix + url;
    }
    return url;
}

function searchDomain(){
    search_number ++;
    var searchString = $('#sendDomain').val();
    var li = '<li><a href="#tab_'+search_number+'" data-toggle="tab" aria-expanded="true">'+searchString+'</a></li>';
    $('#search-tabs').append(li);
    var results = '<div class="tab-pane" id="tab_'+search_number+'"> holaholahola </div>';
    $( "#search-results" ).append(results);

}
