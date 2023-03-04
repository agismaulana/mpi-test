@extends('layout')

@section('content')

<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">List Transaction</h2>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Transaction Code
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Amount
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Buyer
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@push('js')
    <script>
        $(function() {
            loadData()
        })

        function loadData() {
            $.ajax({
                url: `{{ route('api.transaction') }}`,
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer {{ auth("web")->user()->getToken() }}',
                },
                dataType: 'JSON',
                success: function(response) {
                    let html = '';
                    let status = {
                        'checkout': 'blue',
                        'waiting': 'yellow',
                        'success': 'green'
                    }
                    $.each(response.data, function(key, value) {
                        html += `
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                ${value.code_transaction}
                                            </p>
                                            <p class="text-gray-600 whitespace-no-wrap">${value.created_at}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">RP. ${value.total_price}</p>
                                    <p class="text-gray-600 whitespace-no-wrap">IDR</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">${value.user.name}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-${status[value.status]}-200 opacity-50 rounded-full"></span>
                                        <span class="relative">${value.status}</span>
                                    </span>
                                </td>
                            </tr>
                        `
                    })
                    $('#tbody').html(html)
                }
            })
        }
    </script>
@endpush

@endsection
