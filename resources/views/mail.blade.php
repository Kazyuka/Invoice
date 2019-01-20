

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<style>
    td {
        border-bottom: 1px solid #ddd;
        margin: 5px;
    }
</style>
<body>
<div>
    <div style="float: left;">
        <p>Electronic Art<br/>
            Kharkow, Gagarina 60<br/>
            Contact: rkazyuk7@gmail.com
        </p>
    </div>
</div>
<div>
    <div style="text-align: center; padding-top: 130px;">
        <h1>Invoice</h1>
    </div>
</div>
<div>
    <div style="float: right">
        <p>Receipt for<br/>
            Ruslan Kazyuka<br/>
            hello@pinecode.io<br/>
        </p>
    </div>
    <div style="text-align: right">
        <p><br/>
            3rd May 2018<br/>
            Account ID: 12345
        </p>
    </div>
</div>
<div>
    <table cellspacing="0">
        <thead style="background-color: #eeeeee; border: none;">
        <tr>
            <th width="120px" height="35px" style="margin: 5px">Date</th>
            <th width="220px">Description</th>
            <th width="260px">Payment method</th>
            <th width="118px">Amount</th>
            <th width="118px">Price</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($description as $key => $value)
        <tr>
                <td height="45px">{{date('Y-m-d H:i:s')}}</td>
                <td>{{$key}}</td>
                <td>Mastercard **** **** **** 1234</td>
                <td>Mastercard **** **** **** 1234</td>
                <td >${{$value}} </td>

        </tr>
        @endforeach
        </tbody>
    </table>
    <div>Total Price ${{$price}} </div>
    <a href='{!! url('/invoice/pay/'.$price); !!}'>Click to Pay</a>
</div>
</body>
</html>



