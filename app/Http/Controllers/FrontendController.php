<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Post;
use App\Model\Banner;
use App\Model\Video;
use App\Model\Category;
use App\Model\Contact;
use DB;

class FrontendController extends Controller
{
//Đổ dữ liệu ra trang chủ
  public function index()
  {
    $listCate = Category::where([['parent',0],['status',1]])->get()->all();
    $descProduct=Product::where('status','=','1')->orderBy('sale_price','asc')->inRandomOrder()->take(4)->get();
    $ascProduct=Product::where([['status','=','1'],['sale_price','>','1']])->orderBy('id','Desc')->take(4)->get();
    $hotdealProduct=Product::where('status','=','2')->orderBy('id','Desc')->take(4)->get();

    $saleProduct= Product::where('sale_price','>=','80000')->take(1)->get(); 
    $sale = DB::table('product')->where([
      ['status', '=', '1'],
      ['price', '>', '50000'],
      ['name', 'like', '%k%'],
    ])->take(1)->get();// Đổ dữ liệu sản phẩm
    $randomProduct = DB::table('product')->where([
      ['status', '=', '1'],])->inRandomOrder()->first();
    $randomSale = DB::table('product')->where([
      ['sale_price', '>', '1'],['status', '=', '1'],])->inRandomOrder()->first();// Đổ dữ liệu sản phẩm
    $proOther = DB::table('product')->where([
      ['sale_price', '>', '1'],['status', '=', '2'],])->inRandomOrder()->first();// Đổ dữ liệu sản phẩm
    


    $listPost= Post::where('id','>',3)->take(3)->get(); // Đổ dữ liệu tin tức
    $banner= Banner::orderBy('id','Desc')->take(3)->get();// Đổ dữ liệu banner

    return view('frontend.pages.index',compact('listPost','banner','saleProduct','sale','randomProduct','descProduct','ascProduct','hotdealProduct','proOther','randomSale','listCate'));
  }

  public function getProductDetail($id)
  {
   $model=Product::where('id',$id)->first();
   $listCate = Category::where('status','=','1')->get()->all();
   $detailProduct= Product::where('id',$id)->first();
   $randomPro = DB::table('product')->where([
      ['status', '=', '1'],['sale_price', '>', '1'],])->inRandomOrder()->take(3)->get();// Đổ dữ liệu sản phẩm

   return view('frontend.pages.productdetail',compact('detailProduct','randomPro','listCate','model'));
 }


//Đổ dữ liệu ra trang tin tức
 public function getBlog()
 {
  $listCate = Category::where('status','=','1')->get()->all();

  $listPost= Post::orderBy('id','Desc')->paginate(4);
  return view('frontend.pages.post',compact('listPost','listCate'));
}
//ĐỔ dữ liệu ra trang chi tiết tin tức
public function getBlogDetails($id)
{
  $detailPost= Post::where('id',$id)->first();

  $listPost= Post::where('id','>',3)->take(3)->get();


  return view('frontend.pages.viewpost',compact('detailPost','listPost'));
}

//đổ dữ liệu ra trang sản phẩm
public function getProduct()
{
  $listCate = Category::where('status','=','1')->get()->all();
  $listProduct = Product::orderBy('id','DESC')->paginate(12);
  return view('frontend.pages.product',compact('listProduct','listCate'));
}

//đổ dữ liệu ra trang sản phẩm giảm giá
public function getProductSale()
{
  $listCate = Category::where('status','=','1')->get()->all();

    $sale = Product::where([['status','=','1'],['sale_price','>','1']])->count();//đếm số sản phẩm giảm giá để in ra màn hình
    $saleProduct = Product::where([['status','=','1'],['sale_price','>','1']])->paginate(12);//lọc sản phẩm giảm giá để đổ dữ liệu ra trang sản phẩm giảm giá
    return view('frontend.pages.productsale',compact('sale','saleProduct','listCate'));
  }

//đổ dữ liệu ra trang Album sản phẩm
  public function getAlbum()
  {
    $listCate = Category::where('status','=','1')->get()->all();

    $listAlbum = Product::where('status',1)->orderBy('id','DESC')->paginate(12);
    return view('frontend.pages.listAlbum',compact('listCate','listAlbum'));
  }
//đổ dữ liệu ra trang video sản phẩm
  public function getVideo()
  {

    $listVideo =Video::orderBy('id','Desc')->paginate(6);
    $listCate = Category::where('status','=','1')->get()->all();

    return view('frontend.pages.listVideo',compact('listVideo','listCate'));
  }
//đổ dữ liệu ra trang giới thiệu
  public function getAbout()
  {

   return view('frontend.pages.about');
 }


 public function cateProduct($id)
 { 

  $nameCate = Category::where('id',$id)->first();
  $countPro=Product::where('category_id',$id)->count();
  $listCate = Category::where('status','=','1')->get()->all();
  $newProduct = Product::orderBy('created_at', 'desc')->take(1)->get();
  $listProducts = Product::where('category_id', $id)->paginate(12);
  return view('frontend.pages.danhmuc', compact('newProduct', 'listProducts','listCate','nameCate','countPro'));
}

// Tìm kiếm sản phẩm
public function searchProduct(Request $req)
{
  $listCate = Category::where('status','=','1')->get()->all();

  $listSearch = Product::where('name','like', '%'.$req->q.'%')->orderBy('id', 'desc')->paginate(12);
  $keyword = $req->q;
  $count = Product::where('name','like', '%'.$req->q.'%')->count();
  return view('frontend.pages.search',compact('listSearch','keyword','listCate','count'));
}

//TRang liên hệ

public function getContact()
{

  
  return view('frontend.pages.contact');
}




}
