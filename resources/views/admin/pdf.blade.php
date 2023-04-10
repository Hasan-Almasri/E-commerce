<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
</head>
<body>
    <h1> Order Details</h1>
    name: <h2>{{$data->name}}</h2>
    email: <h2>{{$data->email}}</h2>
    phone:  <h2>{{$data->phone}}</h2>
    address: <h2>{{$data->address}}</h2>
    product_title: <h2>{{$data->product_title}}</h2>
    quantity: <h2>{{$data->quantity}}</h2>
    product_price:  <h2>{{$data->product_price}}</h2>
    user_id: <h2>{{$data->user_id}}</h2>
    image 
    <br>

    <img height="250" width="450" src="product/{{$data->image}}" alt="">
    
</body>
</html>