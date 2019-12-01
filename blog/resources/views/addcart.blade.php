<?php
public function getaddtocart(Request $request,$idsp)
{
	if($idsp)
	{
		$sp = spiphone::where('idsp',$idsp)->first();
		if(!Session::has('cart')){
		   $cart[] = [
			   'idsp'=>$sp->idsp,
			   'tensp'=>$sp->tensp,
			   'hinhanh'=>$sp->hinhanh,
			   'qty'=>'1',
			   'giasp'=>$sp->giasp];
		}
		else{
				$cart = $request->session()->get('cart');
				$check = true;
				foreach($cart as $key => $c){
					if($c['idsp']==$idsp){
						$cart[$key]['qty'] +=1;
						$check = false;
						break;
					}
				}
				if($check){
				$cart[]= [
					'idsp'=>$sp->idsp,
					'tensp'=>$sp->tensp,
					'hinhanh'=>$sp->hinhanh,
					'qty'=>'1',
					'giasp'=>$sp->giasp];
				}
		}
		$request->session()->put('cart',$cart);
		return redirect()->back();
	}
}
?>