@extends('layouts.admin')
@section('title','Input Data')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="text-center">Input Data</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="hidden" name="subTotal" value="" id="subTotalTmp">
                                    <label for="name">Name : </label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Input Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="qty">QTY : </label>
                                    <input type="number" name="qty" id="qty" class="form-control" placeholder="Input QTY">
                                </div>
                            </div>
                            <button class="btn btn-info" id="addNota">Add</button>
                        </div>
                        <div class="mt-3">
                            <h5 class="ms-2"><span id="inv"></span></h5>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr>
                                        <td class="text-center" colspan="2">Sub Total</td>
                                        <td id="subTotal"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn align-items-center mt-2 btn-info" id="save">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('after-script')
<script>
    $(function() {
        $('#save').hide();

        $.get("{{ url('/api/getProductByName') }}", function(response){
            $("#name").autocomplete({
                source: response
            });
        })

        $("#addNota").on('click', function(){
            $('#save').show();
            $.get("{{ url('/api/getProducts') }}", function(response) {
            let subTotal = 0;
            let temp = "";
            response.map(r => {
                    if(r.name == $("#name").val()) {
                        if (r.stock < Number($("#qty").val())) {
                            alert("Stock tidak mencukupi");
                            $('#save').hide();
                        } else if( r.status == "0") {
                            alert("Produk tidak tersedia");
                            $('#save').hide();
                        } else {
                            $('#inv').html(`INV - ${new Date().toLocaleDateString()} - ${Math.floor(Math.random() * 99999999) }`);
                            $("#tbody").prepend(`
                                <tr class="menu-list" data-id="${r.id}" data-invoice="INV-${new Date().toLocaleDateString()}-${Math.floor(Math.random() * 99999999) }"
                                data-qty="${$('#qty').val()}">
                                    <td>${r.name}</td>
                                    <td>${Number($("#qty").val())}</td>
                                    <td>${Number($("#qty").val() * r.price)}</td>
                                </tr>
                            `)
                            $('#tbody tr').each(function(){
                                $(this).find("td:nth-child(3)").each(function(){
                                    subTotal += parseInt($(this).text());
                                })
                                $("#subTotal").html(`
                                    <tr>
                                        <td>${Number(subTotal)}</td>
                                    </tr>`
                                )
                                $("#subTotalTmp").val(subTotal);
                            })
                        }
                    }
                })
            })
        })

        $('#save').on('click', function(){
            let data = [];
            let invoice = "";
            let subTotal = $("#subTotalTmp").val();

            $('.menu-list').each(function(){
                let newData = new Object();
                newData["product_id"] = $(this).attr('data-id');
                newData["qty"]  = $(this).attr('data-qty');
                data.push(newData);

                invoice = $(this).attr('data-invoice')
            })

            $.post("{{ url('/api/createNota') }}", {
                data: data,
                invoice: invoice,
                subTotal: subTotal
            },
            function(response){
                alert("Data has been saved");
                window.location.href = "{{ url('/nota') }}";
            })
        })

    });
</script>
@endpush
