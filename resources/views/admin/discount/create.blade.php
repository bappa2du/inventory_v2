@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Category</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Discount
            </legend>
            <form action="discount/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Product</label>

                    <div class="col-lg-6">
                        <select name="product_code" class="form-control select">
                            <option value="">Select</option>
                            @foreach($products as $p)
                                <option value="{{$p->code}}">{{$p->title}} [{{$p->code}}]</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Type</label>

                    <div class="col-lg-6">
                        <div class="radio">
                            <input name="discount_type" id="radio1" value="1" checked="" type="radio">
                            <label for="radio1">
                                <mark></mark>
                                Parcentage
                            </label>
                        </div>
                        <div class="radio">
                            <input name="discount_type" id="radio2" value="2" type="radio">
                            <label for="radio2">
                                <mark></mark>
                                Amount
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Amount</label>

                    <div class="col-lg-6">
                        <input class="form-control num" placeholder="Amount" type="text" name="discount">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Status</label>

                    <div class="col-lg-6">
                        <div class="checkbox">
                            <input type="hidden" value="0" name="status">
                            <input name="status" id="status" value="1" checked="" type="checkbox">
                            <label for="status">
                                <mark></mark>
                                Status
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection
