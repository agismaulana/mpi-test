@extends('layout')

@section('content')
<div class="flex gap-12" aria-labelledby="slide-over-title">
    <div class="md:col-6">
        <div class="bg-white">
            <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

                <div id="product" class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                </div>
            </div>
        </div>
    </div>
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
            </div>
            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
            <div class="mt-6">
                <button onclick="checkout()" href="#"
                    class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</button>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(function() {
            loadData();
            getCheckout();
        })

        function loadData() {
            $.ajax({
                url: `{{ env('APP_URL') }}/api/product`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    let html = ''
                    $.each(response.data, function(key, value) {
                        html += `
                        <div class="group relative">
                            <div
                                class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                                <img src="${value.thumbnail}"
                                    alt="Front of men&#039;s Basic Tee in black."
                                    class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="#" onclick="sendToCart(${value.id}, ${value.price})">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            ${value.title}
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">${value.category}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">${value.price}</p>
                                    <p>${value.stock}</p>
                                </div>
                            </div>
                        </div>

                        `
                    })
                    $('#product').html(html)
                }
            })
        }

        function sendToCart(id, price) {
            let quantity = 1;
            $.ajax({
                url: `{{ env('APP_URL') }}/api/add-to-cart`,
                data: {
                    'product_id': id,
                    'quantity': quantity,
                    'price': price,
                    'total_price': price*quantity
                },
                headers: {
                    'Authorization': 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9tcGktdGVzdC50ZXN0XC9hcGlcL2xvZ2luIiwiaWF0IjoxNjc3ODI4NjI4LCJleHAiOjE2Nzc4MzIyMjgsIm5iZiI6MTY3NzgyODYyOCwianRpIjoibmlFVnBLTlRaamFUT2JKTSIsInN1YiI6MiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.PQNuLaPho3FUP7TZh7jUgqvK5alkYjGwPzQy6xvGlCs'
                },
                method: "POST",
                dataType: 'JSON',
                success: function(response) {
                    getCheckout()
                }
            })
        }

        function getCheckout() {
            $.ajax({
                url: `{{ env('APP_URL') }}/api/product-cart`,
                headers: {
                    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9tcGktdGVzdC50ZXN0XC9hcGlcL2xvZ2luIiwiaWF0IjoxNjc3ODI4NjI4LCJleHAiOjE2Nzc4MzIyMjgsIm5iZiI6MTY3NzgyODYyOCwianRpIjoibmlFVnBLTlRaamFUT2JKTSIsInN1YiI6MiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.PQNuLaPho3FUP7TZh7jUgqvK5alkYjGwPzQy6xvGlCs'
                },
                method: 'GET',
                dataType: 'JSON',
                success: function(response) {
                    let html = '';
                    let total = 0;
                    $.each(response.data, function(key, value) {
                        total += value.total_price;
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
                                                <input type="hidden" name="product[].product_id" value="${value.product.id}">
                                            </h3>
                                            <p class="ml-4">Rp. ${value.product.price}</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">${value.product.category}</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                        <p class="text-gray-500">Qty ${value.quantity}</p>
                                        <input type="hidden" name="product[].quantity" value="${value.quantity}">
                                        <div class="flex">
                                            <button type="button"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        `
                    })
                    $('#total').html(total)
                    $('#checkout').html(html)
                }
            })
        }

        function checkout() {
            let total_price = $('#checkout-total_price').val();
            let checkout_product = $('#checkout-product').val();
            console.log(total_price, checkout_product)
            $.ajax({
                url: `{{ env('APP_URL')}}/api/checkout`,
                data: {
                    'total_price': 800000,
                    'product': [
                        {
                            'product_id': 1,
                            'price': 80000,
                            'quantity': 2,
                            'total_price': 160000
                        },
                        {
                            'product_id': 2,
                            'price': 80000,
                            'quantity': 2,
                            'total_price': 160000
                        },
                    ]
                },
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9tcGktdGVzdC50ZXN0XC9hcGlcL2xvZ2luIiwiaWF0IjoxNjc3ODI4NjI4LCJleHAiOjE2Nzc4MzIyMjgsIm5iZiI6MTY3NzgyODYyOCwianRpIjoibmlFVnBLTlRaamFUT2JKTSIsInN1YiI6MiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.PQNuLaPho3FUP7TZh7jUgqvK5alkYjGwPzQy6xvGlCs'
                },
                dataType: 'JSON',
                success: function(response) {
                    document.href.location = `{{ env('APP_URL') }}/checkout`
                }
            })
        }
    </script>
@endpush
@endsection

