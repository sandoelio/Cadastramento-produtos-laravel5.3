<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
	/*public function __construct(){
		$this->middleware('auth')->only('categoria');
	}*/

    public function index(){
        $title = 'Titulo teste';
    	return view('site.home.index',compact('title'));
    }

    public function categoria($id){
    	return 'lista das postagens:'.$id;
    }

     public function categoriaOp($id = null){
    	return 'lista das postagens:'.$id;
    }

    public function contato(){
        return view('site.contact.index');
    }
}
