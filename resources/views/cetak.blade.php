<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan PDF</title>
    <style>
           table, td , th {
               border : 2px solid #333;
               text-align: center;
           }

           table {
               border-collapse: collapse;
               width: 100%;
           }

           th, td {
               padding: 3px;
           }
    </style>

</head>
<body>
   <table class="table table-striped table-bordered">
       <thead>
           <tr>
               <th>Invoice</th>
               <th>Product</th>
               <th>Quantity</th>
               <th>Price</th>
               <th>SubTotal</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($notas as $nota)
           <tr>
               <td>{{ $nota->invoice }}</td>
               @foreach ($nota->details as $item)
                <td>{{ $item->product->name }}</td>
                <td>{{ number_format($item->qty) }}</td>
                <td>{{ number_format($item->product->price * $item->qty, 0, ",",".") }}</td>
                <td>{{ number_format($nota->subtotal, 0, ",",".") }}</td>
               @endforeach
           </tr>
           @endforeach
       </tbody>
   </table>
</body>
</html>
