<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\khachhang;
use App\sanpham;
use App\admin;
use App\donhang;
use App\ctdonhang;
class MyController extends Controller
{
public function Gethome(Request $request){
if(@$request->get('danhmuc')){
    $pro = sanpham::where('danhmuc',$request->get('danhmuc'))->get();
}
elseif(@$request->get('ten')){
    $pro = sanpham::where('ten','like','%'.$request->get('ten').'%')->get();
}
else $pro=sanpham::all();

 return view('index',compact('pro'));
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
        $pro=sanpham::all();
        return view('admin',compact('pro'));
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
     $pro=sanpham::all();
     return view('index', compact('pro'));
       }
    }
public function Getlogout(){
        session()->forget("name");
        $pro=sanpham::all();
        return view('index',compact('pro'));
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
    $cus->save();
    $cus=khachhang::where('password',$pass)->where('username',$user)->get();
       foreach($cus as $cus){
           $name=$cus->name;
           $id=$cus->id;
       }
    session()->put('id',$id);
    $pro=sanpham::all();
       return view('index', compact('id','name','pro'));
}
public function Getchitiet(Request $request){
    $id=$request->get('id');
    $pro = sanpham::where('id',$id)->get();
    return view('chitiet',compact('pro'));
    }
public function Getadmin(){
    $pro=sanpham::all();
    return view('admin',compact('pro'));
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
    $pro=sanpham::all();
    return view('admin',compact('pro'));
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
}
?>