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
            div {
                display: flex;
                justify-content: center
            }

            table {
                border-collapse: collapse;
                width: 60%
            }

            th, td {
                padding: 5px;
            }
     </style>

 </head>
 <body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>
                        <img src="https://desagirikarto.gunungkidulkab.go.id/assets/files/artikel/sedang_1601063087canting2.jpg" width="90" height="60px">
                    </th>
                    <th colspan="3">
                        <h3>Invoice : {{ $notas->invoice }} </h3>
                    </th>
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
                    <td>Rp. {{ number_format($nota->product->price) }}</td>
                    <td>Rp. {{ number_format($nota->product->price * $nota->qty) }}</td>
                </tr>
                @endforeach
                <td colspan="3" class="text-center">Total</td>
                    <td>Rp. {{ number_format($notas->subtotal) }}</td>
            </tbody>
        </table>
    </div>
 </body>
 </html>
<script>
    window.print();
</script>
