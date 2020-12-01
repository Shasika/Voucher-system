<!DOCTYPE html>
<html>
<head>
    <title>Assignment</title>
</head>
<body>
{{--    <h1>{{ $details['title'] }}</h1>--}}
{{--    <p>{{ $details['body'] }}</p>--}}
{{--    <p>{{ $details['body1'] }}</p>--}}
{{--    <p>{{ $details['body2'] }}</p>--}}
{{--    <p>Thank you</p>--}}

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Gift Voucher</h5>
            <p class="card-text">This gift from e-marketingeye.</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">ID: {{ $details['body3'] }}</li>
            <li class="list-group-item">Price : {{ $details['body'] }}</li>
            <li class="list-group-item">Validity Period : {{ $details['body1'] }}</li>
            <li class="list-group-item">Valid Till : {{ $details['body2'] }}</li>
        </ul>
        <div class="card-body">
            <p>Thank You</p>
        </div>
    </div>


</body>
</html>
