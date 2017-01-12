<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Shop</title>
    <base href="/" />
    <link rel="icon" type="image/png" href="shop.png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/bb.css">
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/css/ionicons.min.css">
</head>

<body>

    <div class="waiting"><i class="fa fa-spinner fa-pulse"></i></div>

    @include('admin.layout.header')

    @include('admin.layout.toast')
    
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="homcon">
  <div class="row">
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <div class="n">139</div>
      <a href="product"><img src="icons/packing.svg" alt=""><span>Product</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="discount"><img src="icons/percentage.svg" alt=""><span>Discount</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <div class="n">7</div>
      <a href="brand"><img src="icons/creative-market.svg" alt=""><span>Brand</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <div class="n">7</div>
      <a href="report"><i class="ion-ios-browsers"></i><span>Report</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="analysis"><img src="icons/analytics.svg" alt=""><span>Analysis</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="purchase"><i class="ion-briefcase"></i><span>Purchase</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="sell"><i class="ion-ios-cart-outline"></i><span>Sell</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="payment"><img src="icons/check.svg" alt=""><span>Payment</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="sells-history"><i class="ion-ios-paper-outline"></i><span>History</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <div class="n">23</div>
      <a href="stock"><i class="fa fa-cubes"></i><span>Stock</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="refund"><i class="ion-ios-redo"></i><span>Refund</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="customer"><i class="ion-android-people"></i><span>Customer</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="settings"><i class="fa fa-cogs"></i><span>Setting</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <div class="n">23</div>
      <a href="user"><i class="fa fa-users"></i><span>User</span></a>
    </div>
  </div>
</div>
  </div>
</div>
@section('script')
        <script src="admin/js/jquery.min.js"></script>
        <script src="admin/js/bootstrap.min.js"></script>
        <script src="admin/js/bb.js"></script>
    @show

</body>

</html>


