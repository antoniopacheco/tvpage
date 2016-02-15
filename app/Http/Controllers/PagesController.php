<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Domain;
use App\Page;
use Auth;
use App\Search;
use App\Searches_has_domain;
class PagesController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}
    public function store(Request $request){
    	$datos = $request->only('domain','page');
    	$checkUrl = true;  // by default will look for the url if exist
    	//check if the domain exist
    	$dominio = Domain::where('domain',$datos['domain'])->first();
    	if(!$dominio){
    		$dominio = new Domain;
    		$dominio->domain = $datos['domain'];
    		$dominio->save();
    		$checkUrl = false; //if the domain doesnt exist, then neither the page so i will skip the search
    	}
    	if($checkUrl){
    		$page = Page::where('url',$datos['page'])->first();
    		if($page){
    			return response()->json(Page::where('domain_id',$dominio->id)->get());
    		}
    		
    	}
    		$user = $request->user();
    		$newpage = new Page;
    		$newpage->domain_id = $dominio->id;
    		$newpage->url = $datos['page'];
    		$newpage->created_by = $user->id;
    		$newpage->save();
    			return response()->json(Page::where('domain_id',$dominio->id)->get());
    }

    public function findDomain(Request $request){
        $user = $request->user();
    	$inputs = $request->only('q');
    	$domains = Domain::where('domain', 'LIKE', '%'.$inputs['q'].'%')->get();
        $search = new Search;
        $search->query = $inputs['q'];
        $search->user_id = $user->id;
        $search->save();
        foreach ($domains as $domain) {
            $result = new Searches_has_domain;
            $result->searches_id = $search->id;
            $result->domains_id = $domain->id;
            $result->save();
        }
    	return response()->json($domains);
    }

    public function findByDomain(Request $request){
    	$inputs = $request->only('domain');
    	$pages = Page::where('domain_id',$inputs['domain'])->get();
    	return response()->json($pages);
    }
}
