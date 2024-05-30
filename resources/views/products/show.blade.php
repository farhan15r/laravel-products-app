@extends('layout.app')

@section('content')
    <div class="flex justify-center mt-10">
        <div class="container">
            <a href="{{ route('products.index') }}" class="btn btn-outline btn-primary">Back</a>

            <div class="overflow-x-auto p-1">
                @if (session('success'))
                    <div class="alert alert-success mt-4 w-96">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <h2 class="py-2 text-2xl font-bold">Product</h2>

                <div class="card w-96 bg-slate-200 text-neutral-content shadow-md">
                    <div class="card-body text-black">
                        <h3 class="py-2 text-xl font-bold">Product Name</h3>
                        <h4 class="py-2 text-xl">{{ $product->name }}</h4>
                        <div class="divider"></div>

                        <h3 class="py-2 text-xl font-bold">Product Price</h3>
                        <h4 class="py-2 text-xl">Rp.{{ number_format($product->price, 0, ',', '.') }}</h4>
                        <div class="divider"></div>

                        <h3 class="py-2 text-xl font-bold">Product Stock</h3>
                        <h4 class="py-2 text-xl">{{ $product->stock }}</h4>

                        <div class="mt-4">
                            <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                class="btn btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
