<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đăng nhập</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="text-align: center;">
		<form method="POST" action="{{route('dangnhap')}}" class="form-login">
     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type="text" name="user" placeholder="Tên đăng nhập" required="">
		<input type="password" name="pass" placeholder="Mật khẩu" required="">
		<br><br>
		<input type="submit" name="login" value="Đăng nhập" style="background: #088A08; color: white">
		<br>
		<br><br>
		<b><a href="dangky" style="color: red;">Đăng ký</a> nếu bạn chưa có tài khoản!</b>
		</form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="myModalcart">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đăng nhập</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="text-align: center;">
    <form method="POST" action="login" class="form-login">
    @csrf
    <input type="text" name="user" placeholder="Tên đăng nhập" required="">
    <input type="password" name="pass" placeholder="Mật khẩu" required="">
    <br><br>
    <input type="submit" name="thanhtoan" value="Đăng nhập" style="background: #088A08; color: white">
    <br>
    <br><br>
    <b><a href="dangky" style="color: red;">Đăng ký</a> nếu bạn chưa có tài khoản!</b>
    </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>