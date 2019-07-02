<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
use App\Model\Customer;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\Category;
use App\Model\Contact;
use App\Model\User;
use Mail;

use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function viewCart()
    {
      $listCate = Category::where([['parent',0],['status',1]])->get()->all();
      $content = Cart::content();
      return view('frontend.pages.cart', compact('content','listCate'));
    }

    public function addToCart($id)
    {

      $listCate = Category::where([['parent',0],['status',1]])->get()->all();
      $product = Product::find($id);


      if(isset($product)){
       Cart::add(['id' => $id,'name' => $product->name,'qty' =>1, 'price' => $product->sale_price > 0 ? $product->sale_price:$product->price, 'options' => ['images' => $product->image]]);
     };

     $content = Cart::content();
     return view('frontend.pages.cart', compact('content','listCate','product'));

   }
    // cập nhật giỏ hàng bằng ajax 
     /**       
         * Display a listing of the resource.
         *
         * @param  Illuminate\Http\Request $request
         * @return Response
         */
     public function capnhat(Request $request)
     {

       Cart::update($request->rowId,$request->qty);


     }
     public function bill(){

     }
    //delete sản phẩm trong giỏ hàng
     public function removeCart($rowId)
     {

      Cart::remove($rowId);
      return redirect()->route('viewCart');
    }

    public function getcheckOut()
    {
      $content = Cart::content();
      return view('frontend.pages.checkout', compact('content'));
    }
    // detail product
    public function getDetail($id)
    {
      $detailPro= DB::table('products')->where('id',$id)->first();

      return view('frontend.pages.detail', compact('detailPro'));
    }
    public function postCheckout(Request $request)
    {

      $cart = Cart::content();
      $this->validate($request, [
        'name' => 'required',
        'note' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',


      ], [

        'name.required' => 'Vui lòng nhập tên!',
        'note.required' => 'Vui lòng nhập ghi chú!',
        'phone.required' => 'Vui lòng nhập số điện thoại!',
        'email.required' => 'Vui lòng điền email!',
        'email.email' => 'Email chưa đúng định dạng!',
        'address.required' => 'Vui lòng nhập địa chỉ!',

      ]);

      $customer = new Customer;
      $customer->name = $request->name;
      $customer->address = $request->address;
      $customer->email = $request->email;
      $customer->phone = $request->phone;
      $customer->note = $request->note;
      $customer->save();


      $order = new Order;
      $order->customer_id = $customer->id;
      $order->payment = $request->payment;
      $order->created_at = date('Y-m-d');
      $order->total = (str_replace(",", '', Cart::subTotal()));
      $order->amount = count(Cart::content());
      $order->status = 0;
      $order->payment = 0;
      $order->save();
       //dd($order);
      if (count(Cart::content())) {
        foreach ($cart as $od) {
          $orderDetail = new OrderDetail;
          $orderDetail->order_id = $order->id;
          $orderDetail->product_id = $od->id;
          $orderDetail->quantity = $od->qty;
          $orderDetail->price = $od->price;
          $orderDetail->save();
        }
      }

//Reset giỏ hàng
      Cart::destroy();

      return view('frontend.pages.bill');
    }
//TRang liên hệ,xin việc

    public function getTuyenDung()
    {

      $contact=Contact::all();


      return view('frontend.pages.checkout',compact('contact'));
    }

    //Cập nhật tài khoản
    public function getAccount(Request $id)
    { 
     

      $listUsers = User::where('id',Auth::id())->first();
   

      return view('frontend.pages.change_user',['listUsers'=>$listUsers]);

    }

    public function postAccount(Request $request,$id)
    {

      $this->validate($request,[
        
        're_password'=>'required|same:password',
        
      ],[
       
        're_password.same'=>'Mật khẩu nhập lại không trùng khớp!',
        

      ]); 

      $user=User::findOrFail('id',Auth::id())->update([
        'name'=> $request->get('name'),
        'phone'=> $request->get('phone'),
        'email'=> $request->get('email'),
        'gender'=> $request->get('gender'),
        'birthday'=> $request->get('birthday'),
        'password'=>bcrypt($request->password),
      ]);

      return redirect()-> view('frontend.pages.change_user',['user'=>$user])->with(['level'=>'success','message'=>'Cập nhật tài khoản thành công!']);


    }
//Cập nhật tài khoản


//Lịch sử đơn hàng

    public function historyCart()
    {





      return view('frontend.pages.history_cart');

    }


//Lấy dữ liệu thông tin xin việc 
    public function postTuyenDung(Request $request)
    {


      $this->validate($request, [
        'name' => 'required|unique:contact|max:255|min:1',
        'email' => 'required|email|unique:contact',
        'phone' => 'required',
        'address' => 'required|min:1|max:255',
        'requested' => 'required|min:1|max:255',

      ],[
        'name.required' => 'Bạn chưa nhập tiêu đề',
        'name.unique' => 'Tên đã tồn tại',
        'name.max' => 'Tên quá dài',
        'name.min' => 'Tên quá ngắn',
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Email không đúng định dạng',
        'email.unique' => 'Email đã tồn tại',
        'phone.required' => 'Vui lòng nhập số điện thoại',
        'address.required' => 'Vui lòng nhập địa chỉ',
        'address.min' => 'Thông tin nhập vào quá ngắn',
        'address.max' => 'Thông tin nhập vào quá dài',
        'requested.required' => 'Vui lòng nhập yêu cầu',
        'requested.min' => 'Nội dung yêu cầu của bạn quá ngắn!',
        'requested.max' => 'Nội dung yêu cầu của bạn quá dài!'

      ]);

      $contact= new Contact();
      $contact->name=$request->name;
      $contact->email=$request->email;
      $contact->phone=$request->phone;
      $contact->address = $request->address;
      $contact->requested=$request->requested;
      $contact->save();

      return redirect()->route('getContact')->with(['level'=>'success','message'=>'Bạn đã gửi yêu cầu thành công!']);
    }

  }
