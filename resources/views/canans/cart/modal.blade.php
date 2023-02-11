

<!-- Modal -->
<div class="modal fade" id="orderCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nhập thông tin liên hệ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-body">
            <div class="form-group">
                <label for="">Họ tên</label>
                <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp" placeholder="Enter fullname">
              </div>
              <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter phone">
              </div>
              <div class="form-group">
                <label for="">Địa chỉ</label>
                <textarea name="" id="address" cols="30" rows="3" placeholder="Enter address" class="form-control"></textarea>
              </div>
        </div>
      </div>
      <div class="modal-footer">
        <button ng-click="postOrderCart()" type="button" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Gửi</button>
      </div>
    </div>
  </div>
</div>