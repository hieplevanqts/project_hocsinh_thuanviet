{{-- <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleModalCart"> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
<style>
    #modalCart{
        top: 155px
    }
    
</style>
  <div class="modal fade bd-example-modal-lg" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModalCart">Modal title</h5>
                <button type="button" ng-click="closeModal()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="orderId" value="">
                <table class="mb-3 mt-3 table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody id="htmTr">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                {{-- <button ng-click="closeModal()" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Đóng</button> --}}
                <button ng-click="updateStatus()" type="button" class="btn btn-primary"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Xử lý</button>
                <button ng-click="printOrder()" type="button" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> In đơn hàng</button>
            </div>
        </div>
    </div>
</div>