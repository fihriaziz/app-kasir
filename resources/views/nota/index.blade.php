@extends('layouts.admin')
@section('title', 'Nota Detail')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Product</th>
                        <th>Subtotal</th>
                        <th>*</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notas as $nota)
                    <tr>
                        <td>{{ $nota->invoice }}</td>
                        <td>
                            @foreach ( $nota->details as $detail)
                                <span class="badge bg-primary">{{$detail->product->name}}</span>
                            @endforeach
                        </td>
                        <td>{{ $nota->subtotal }}</td>
                        <td>
                            <button type="button" data-id="{{$nota->id}}" class="btn btn-primary showModal" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Show
                              </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-6">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="4"><h6 class="modal-title" id="exampleModalLabel">Invoice : <span id="invoice"></span></h6></th>
                                    </tr>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyModal"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="print" class="btn btn-primary">Print</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script>
    $(document).ready(function() {
        $('.showModal').on('click', function(){
            $('#print').attr('data-print', $(this).data('id'));
            $.get('/api/getNota/' + $(this).data('id'), function(data){
                $('#invoice').text(data.invoice);
                var html = '';
                $.each(data.details, function(index, value){
                    html += '<tr>';
                    html += '<td>' + value.product.name + '</td>';
                    html += '<td>' + value.qty + '</td>';
                    html += '<td>' + value.product.price + '</td>';
                    html += '<td>' + value.qty * value.product.price + '</td>';
                    html += '</tr>';
                });
                html += '<tr>';
                html += '<td colspan="3" class="text-center">Total</td>';
                html += '<td>' + data.subtotal + '</td>';
                html += '</tr>';
                $('#tbodyModal').html(html);
            });
        })

        $('#print').on('click', function(){
            window.open("{{url('print')}}/"+$(this).data('print'),"_blank");
        })
    });
</script>
@endpush
