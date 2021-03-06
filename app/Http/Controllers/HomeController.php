<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $categoty = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $show_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->get();
        return view('pages.home')->with('category',$categoty)->with('brands',$brand)->with('products',$show_product);
    }


    public function seach_product(Request $request){
        $categoty = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $keyword = $request->seach_product;
        $seach_product = DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->get();
        return view('pages.seach_product')->with('category',$categoty)->with('brands',$brand)->with('seach_product',$seach_product);

    }
}
