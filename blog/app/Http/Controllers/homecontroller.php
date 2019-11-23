<?php
class MyController extends Controller
{
    public function getxinchao($ten,$namsinh)
    {
        return 'Chào bạn: ' . $ten.'<br>Có năm sinh là: '.$namsinh;
    }
 
    public function gettambiet($ten,$namsinh)
    {
        return 'Tạm biệt bạn : ' . $ten.'<br>Có năm sinh là: '.$namsinh;
    }
 
}
?>