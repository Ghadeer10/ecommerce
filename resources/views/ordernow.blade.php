@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <table class="table table-striped">
            {{-- <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
            </thead> --}}
            <tbody>
            <tr>
                <td>Amount</td>
                <td>$ {{$total}}</td>
        
            </tr>
            <tr>
                <td>Tax</td>
                <td>$0</td>

            </tr>
            <tr>
                <td>Delivery</td>
                <td>$10</td>

            </tr>
                <tr>
                    <td>TotalAmount</td>
                    <td>${{$total+10}}</td>

                </tr>
            </tbody>
        </table>
         <form  action="/orderplace" method="POST">
            @csrf
        <div class="form-group">
            <textarea placeholder="enter your address" name="address" class="form-control" id="address"></textarea>
        </div>
        <div class="form-group">
            <label for="pwd">Payment methode:</label><br><br>
            <input type="radio" value="cash"  name="pay"><span>online payment</span><br><br>
            <input type="radio" value="cash" name="pay"><span>EMI payment</span><br><br>
            <input type="radio" value="cash" name="pay"><span>Payment on Deluvery</span><br><br>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    </div>
    
</div>
@endsection
        