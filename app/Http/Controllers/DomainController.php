<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Domain;
use DB;
class DomainController extends Controller
{
    public function index(){
    	return view('topdomains');
    }

    public function gtopDomains(){
   		$domains = Domain::select(
   			DB::raw('domains.domain AS label, count(*) AS `value`'))
		    ->join('pages', 'domains.id', '=', 'pages.domain_id')
		    ->groupBy('domain_id')
		    ->orderBy('value', 'desc')
		    ->limit(5)
		    ->get();
    	return response()->json($domains);
    }
}
