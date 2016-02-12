<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Domain;
use App\Page;
use Auth;
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

    public function findByDomain(Request $request){
    	$inputs = $request->only('q');
    	$domains = Domain::where('domain', 'LIKE', '%'.$inputs['q'].'%')->get();
    	return response()->json($domains);
    }
}
