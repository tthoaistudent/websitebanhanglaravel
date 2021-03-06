@extends('admin_layout')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <input type="checkbox" name="post[]"><i>
              </th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Hình</th>
              <th>Danh mục</th>
              <th>Thương hiệu</th>
              <th>Trang thái</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($show_product as $key => $product)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->product_price }}</td>
              <td>
                    <img src="{{asset('uploads/product/'.$product->product_image)}}" style="width:100px;height:100px">
              </td>
              <td>{{ $product->category_name }}</td>
              <td>{{ $product->brand_name }}</td>
              <td><a class="status" href="{{URL::to('/update-product-status/'. $product->product_id)}}">
                <?php 
                    if($product->product_status==0){
                      echo "Ẩn";
                    }
                    else {
                      echo "Hiện";
                    }
                  ?>
                  </a>
              </td>
              <td class="action_brand" style="width:100px;">
                <a  href="{{URL::to('/update-product/'.$product->product_id)}}" 
                    ui-toggle-class="" class="styling-action-product">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                </a>
                <a  onclick="return confirm('Bạn có thực sự muốn xóa sản phẩm ?')" 
                    href="{{URL::to('/delete-product/'.$product->product_id)}}" 
                    ui-toggle-class="" class="styling-action-product">
                    <i class="fa fa-times text-danger text"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection