<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\khachhang;
use App\sanpham;
use App\admin;
use App\donhang;
use App\ctdonhang;
use Session;
class MyController extends Controller
{
public function Gethome(Request $request){
if(@$request->get('danhmuc')){
    $pros = sanpham::where('danhmuc',$request->get('danhmuc'))->paginate(9);
}
elseif(@$request->get('ten')){
    $pros = sanpham::where('ten','like','%'.$request->get('ten').'%')->paginate(9);
}
else $pros=sanpham::paginate(9);

 return view('index',compact('pros'));
    }
public function Postlogin(Request $request)
    {
       $user = $request->user;
       $pass = $request->pass;
       $cus=admin::where('password',$pass)->where('username',$user)->get();
       foreach($cus as $cus){
           $user =$cus->username;
       }
       if($user=='admin'){
        session()->put('role','admin');
        session()->put('name','Admin');
        $pros=sanpham::paginate(7);
        return  redirect('admin');
       }
       else{
        $cus=khachhang::where('password',$pass)->where('username',$user)->get();
        foreach($cus as $cus){
            $name=$cus->name;
            $id=$cus->id;
        }
        session()->put('role','cus');
     session()->put('id',$id);
     session()->put('name',$name);
     if(@$request->get('login')){
     $pros=sanpham::paginate(9);
     return redirect()->back();
     }
     else return view('order');
       }
    }
public function Getlogout(){
    $name=session('name');
        session()->forget("name");
        session()->forget("role");
    if($name=='Admin') return redirect('index');    
    else{
        session()->forget("id");
        return redirect()->back();
    } 
    }    
public function Postaddacc(Request $request){
    $user = $request->user;
    $pass = $request->pass;
    $cus = new khachhang;
    $cus->name = $request->input('name');
    $cus->username = $request->input('user');
    $cus->password = $request->input('pass');
    $cus->phone = $request->input('phone');
    $cus->address = $request->input('add');
    $cus->email = $request->input('email');
    $cus->gender = $request->input('gender');
    $cus->save();
    $cus=khachhang::where('password',$pass)->where('username',$user)->get();
       foreach($cus as $cus){
           $name=$cus->name;
           $id=$cus->id;
       }
    session()->put('id',$id);
    session()->put('name',$name);
    $pros=sanpham::paginate(9);
       return view('index', compact('id','pros'));
}
public function Getchitiet(Request $request){
    $id=$request->get('id');
    $pro = sanpham::where('id',$id)->get();
    return view('chitiet',compact('pro'));
    }
public function Getadmin(){
    $pros=sanpham::paginate(7);
    return view('admin',compact('pros'));
}
public function Getaddpro(Request $request){
    $pro=new sanpham;
    $pro->ten=$request->input('namepro');
    $pro->danhmuc=$request->input('danhmuc');
    $pro->nhacungcap=$request->input('provide');
    $pro->gia=$request->input('price');
    $pro->soluong=$request->input('total');
    $pro->mota=$request->input('content');
    $pro->anh=$request->input('img');
    $pro->save();
    
    return redirect('admin');
}
public function Getdelete(Request $request){
    $id=$request->get('id');
    $dele=sanpham::where('id',$id)->delete();
    $pro=sanpham::all();
    return view('admin',compact('pro'));
}
public function Getupdate(Request $request){
    $pro=sanpham::find($request->input('id'));
    $pro->ten=$request->input('namepro');
    $pro->danhmuc=$request->input('danhmuc');
    $pro->nhacungcap=$request->input('provide');
    $pro->gia=$request->input('price');
    $pro->soluong=$request->input('total');
    $pro->mota=$request->input('content');
    $pro->anh=$request->input('img');
    $pro->save();
    $pro=sanpham::all();
    return view('admin',compact('pro'));
}
public function Getedit(Request $request){
    $id=$request->get('id');
    $pro = sanpham::where('id',$id)->get();
    return view('edit',compact('pro'));
}
public function Getkhachhang(Request $request){
    if(@$request->get('name')){
        $cus=khachhang::where('name','like','%'.$request->get('name').'%')->get();
    }
    else $cus=khachhang::all();
    foreach($cus as $cus){
    $id=$cus->id;
    $total[$id]=donhang::groupBy('idcus')->having('idcus',$id)->count();
    }
    $cus=khachhang::where('name','like','%'.$request->get('name').'%')->get();
    return view('khachhang',compact('cus','total'));
}
public function Getqldonhang(Request $request){
    if($request->get('date')){
        $date=$request->get('date');
        $don=donhang::where('date',$date)->get();
    }
    else $don = donhang::all();
    return view('qldonhang',compact('don'));
}
public function Getcapnhat(Request $request){
    $don=donhang::find($request->get('id'));
    $don->status=$request->get('status');
    $don->save();
    $don = donhang::all();
    return view('qldonhang',compact('don'));
}
public function Getctdonhang(Request $request){
    $id=$request->get('id');
    $cus=donhang::where('id',$id)->get();
    foreach($cus as $cus){
        $idcus=$cus->idcus;
    }
    $cart=donhang::where('id',$id)->get();
    foreach($cart as $cart){
        $idcart=$cart->idcart;
    }    
    $cus=khachhang::where('id',$idcus)->get();
    $ct=ctdonhang::where('id',$idcart)->get();
    return view('ctdonhang', compact('cus','ct'));
}
public function Getdoanhthu(Request $request){
    $revenue=donhang::where('status','Đã giao hàng')->groupby('date')->get();
    foreach($revenue as $rev){
    $total[$rev->date]=donhang::where('date',$rev->date)->where('status','Đã giao hàng')->sum('tongtien');
    }
    $revenue=donhang::where('status','Đã giao hàng')->groupby('date')->get();
    return view('doanhthu', compact('revenue','total'));
}
public function Getaddcart(Request $request){
    if (@$request->get('id')) {
        # code...
        $id=$request->get('id');
        if(!Session::has('cart')){
            $cart[$id]=1;
        }
        else{
            $cart=session('cart');
            if(@$cart[$id]){
                $cart[$id]++;
            }
            else $cart[$id]=1;
        }
        session()->put('cart',$cart);
    }
    $pro=sanpham::all();
    if(@$request->get('local')) return redirect('cart');
    else return redirect()->back();
}
public function Getcart(){
    if (@session('cart')) {
        # code...
    $cart=session('cart');
    foreach($cart as $id => $total){
        $t[]=$id;
    }  
   
    $pro=sanpham::whereIn('id',$t)->get();
    return view('cart', compact('pro','cart'));
    }
    else{
         return view('cart');
    }
}
public function Getorder(){
    $id=session('id');
    $cus=khachhang::where('id',$id)->get();
    $cart=session('cart');
    foreach($cart as $id => $total){
        $t[]=$id;
    }  
    $pro=sanpham::whereIn('id',$t)->get();
    return view('order',compact('cus','pro'));
}
public function Getthanhtoan(Request $request){
    $typepay=$request->get('typepay');
    $idcart=donhang::max('idcart');
    $idcart+=1;
    $cart=session('cart');
    $d=0;
    foreach($cart as $id => $number){
        $pro=sanpham::where('id',$id)->get();
        foreach($pro as $pro){
            $t=new ctdonhang;
            $t->id=$idcart;
            $t->idsp=$pro->id;
            $t->tensp=$pro->ten;
            $t->soluong=$number;
            $t->gia=$pro->gia;
            $t->save();
            $c=$number*$pro->gia;
            $d=$d+$c;
        }
    }
    $don=new donhang;
    $don->idcus=session('id');
    $don->idcart=$idcart;
    $don->date=date('Y-m-d');
    $don->tongtien=$d;
    $don->typepay=$typepay;
    $don->status='Đang xử lý';
    $don->save();
    session()->forget('cart');
    
    return redirect('index');
}
public function Getaccount(){
    if(@session('id')){
    $acc=khachhang::where('id',session('id'))->get();
    return view('account', compact('acc'));
    }
    else return redirect('index');
}
public function Geteditcart(Request $request){
    $id=$request->get('id');
    $total=$request->get('total');
    $cart = session('cart');
    if ($total>0) {
        # code...
        $cart[$id]=$total;
    }
    else unset($cart[$id]);
    session()->put('cart',$cart);
    return redirect()->back();
}
}
?>