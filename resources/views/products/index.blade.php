@extends('layout.app')

@section('content')
    <div class="flex justify-center mt-10">
        <div class="container">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add New product</a>

            @if (session('success'))
                <div class="alert alert-success mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif


            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="hover:bg-slate-100 hover:cursor-pointer" onclick="window.location='{{ route('products.show', ['product' => $product->id]) }}';">
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ $product->name }}</td>
                                <td>Rp.{{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->stock }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
