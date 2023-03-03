@extends('layout')

@section('content')

<div class="flex h-full align-items-end flex-col bg-white shadow-xl md:col-6">
    <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
        <div class="flex items-start justify-between">
            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
        </div>

        <div class="mt-8">
            <div class="flow-root">
                <ul role="list" id="checkout" class="-my-6 divide-y divide-gray-200">
                </ul>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
        <div class="flex justify-between text-base font-medium text-gray-900">
            <p>Subtotal</p>
            <p>Rp. <span id="total">0</span></p>
            <input type="hidden" value="0" name="total_price">
        </div>
        <div id="paymentGateway" class="w-100 mt-4">
            <div class="flex gap-4">
                <input type="radio" name="bank_type" label="BCA" value="bca"> BCA
                <input type="radio" name="bank_type" label="BNI" value="bni"> BNI
                <input type="radio" name="bank_type" label="BRI" value="bri"> BRI
            </div>
        </div>
        <div class="mt-6">
            <button onclick="createPayment()"
                class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Pay</button>
        </div>
    </div>
</div>

@push('js')
<script>
    const code = '{{ Request::segment(2) }}'
    $(function () {
        loadData()
    });

    function loadData() {
        $.ajax({
            url: `{{ env('APP_URL') }}/api/checkout/${code}`,
            method: 'GET',
            dataType: 'JSON',
            success: function (response) {
                let html = '';
                let total = 0;
                $.each(response.data.detail, function (key, value) {
                    html += `
                            <li class="flex py-6">
                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="${value.product.thumbnail}"
                                        alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                        class="h-full w-full object-cover object-center">
                                </div>

                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>
                                                <a href="#">${value.product.title}</a>
                                                <input type="hidden" name="products[${key}][product_id]" value="${value.product.id}">
                                            </h3>
                                            <p class="ml-4">Rp. ${value.product.price}</p>
                                            <input type="hidden" name="products[${key}][price]" value="${value.price}">
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">${value.product.category}</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                        <p class="text-gray-500">Qty ${value.quantity}</p>
                                        <input type="hidden" name="products[${key}][quantity]" value="${value.quantity}">
                                        <input type="hidden" name="products[${key}][total_price]" value="${value.total_price}">
                                        <div class="flex">
                                            <button type="button"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        `
                })
                $('#total').html(response.data.total_price)
                $('input[name="total_price"]').val(response.data.total_price)
                $('#checkout').html(html)
            }
        })
    }

    function createPayment() {
        $.ajax({
            url: `{{ env('APP_URL') }}/api/checkout/${code}/payment`,
            method: 'POST',
            data: {
                'price': $("input[name='total_price']").val(),
                'bank_type': $("input[name='bank_type']").val()
            },
            success: function(response) {
                document.location.href = `{{ env('APP_URL') }}/payment/${code}/waiting`
            }
        })
    }
</script>
@endpush

@endsection
