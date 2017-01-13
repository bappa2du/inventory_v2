@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="sell">Sell</a></li>
        <li class="active">History</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Sells History
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Customer Mobile</th>
                    <th>Customer Name</th>
                    <th>Payment Opt</th>
                    <th>Invoice Date</th>
                    <th>Create Date</th>
                    <th>Invoice</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sells as $s)
                    <tr>
                        <td>{{$s->invoice_no}}</td>
                        <td>{{$s->customer->customer_phone}}</td>
                        <td>{{$s->customer->customer_name}}</td>
                        <td>{{$s->payment_option}}</td>
                        <td>{{app_date($s->invoice_date)}}</td>
                        <td>{{app_date($s->updated_at)}}</td>
                        <td>
                            <a href="sell/show/{{$s->invoice_no}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-file-text"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </fieldset>

    </div>

@endsection
