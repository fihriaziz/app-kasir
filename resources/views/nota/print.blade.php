 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Print - {{ $notas->invoice }}</title>
     <style>
            table, td , th {
                border : 2px solid #333;
                text-align: center;
            }

            table {
                border-collapse: collapse;
            }

            th, td {
                padding: 5px;
            }
     </style>

 </head>
 <body>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th colspan="4"><h3>Invoice : {{ $notas->invoice }} </h3></th>
            </tr>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>SubTotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas->details as $nota)
            <tr>
                <td>{{ $nota->product->name }}</td>
                <td>{{ $nota->qty }}</td>
                <td>{{ number_format($nota->product->price) }}</td>
                <td>{{ number_format($nota->product->price * $nota->qty) }}</td>
            </tr>
            @endforeach
            <td colspan="3" class="text-center">Total</td>
                <td>{{ number_format($notas->subtotal) }}</td>
        </tbody>
    </table>
 </body>
 </html>
<script>
    window.print();
</script>
