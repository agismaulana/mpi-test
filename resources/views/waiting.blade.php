@extends('layout')

@section('content')

<div class="max-w-sm rounded overflow-hidden mx-auto shadow-lg my-5">
    <div>
        <p class="text-2xl text-center my-8" id="virtual Account">1231234213124124</p>
    </div>
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2 text-center">Menunggu Pembayaran</div>
    </div>
    <div class="px-6 pt-4 pb-2">
        <hr />
        <ul class="-my-6 divide-y divide-gray-200 py-6">
            <li class="flex py-6">
                <div class="ml-4 flex flex-1 flex-col">
                    <div>
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <h3>
                                <a href="#">Type Bank</a>
                            </h3>
                            <p class="text-gray-500" id="bank_type">BCA</p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="flex py-6">
                <div class="ml-4 flex flex-1 flex-col">
                    <div>
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <h3>
                                <a href="#">Total Price</a>
                            </h3>
                            <p class="text-gray-500" id="total_price">0</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <hr />
        <div class="px-6 mt-8 pb-6">
            <div class="flow-root">
                <ul role="list" id="checkout" class="-my-6 divide-y divide-gray-200">
                </ul>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    const code = `{{ Request::segment(2) }}`
    $(function () {
        loadData()
    })

    function loadData() {
        $.ajax({
            url: `{{ env('APP_URL') }}/api/checkout/${code}/waiting`,
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
                let payment = response.data.latest_payment[0];

                $('#virtual_account').html(payment.virtual_number)
                $('#bank_type').html(payment.bank_type)
                $('#total_price').html(`Rp. ${payment.total_price}`)
                $('#checkout').html(html)
            }
        })
    }
</script>
@endpush

@endsection
