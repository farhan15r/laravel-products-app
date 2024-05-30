@extends('layout.app')

@section('content')
    <div class="flex justify-center mt-10">
        <div class="container">
            <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-outline btn-primary">Back</a>

            <div class="overflow-x-auto p-1">
                <h2 class="py-2 text-2xl font-bold">Edit Product</h2>

                <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-control w-full max-w-sm">
                        <label class="label">
                            <span class="label-text text-lg">Product Name</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}"
                            class="input input-primary   @error('name') {{ 'input-error' }} @enderror input-bordered w-full max-w-sm" />
                        @error('name')
                            <label class="label">
                                <span class="label-text-alt text-base text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control w-full max-w-sm">
                        <label class="label">
                            <span class="label-text text-lg">Product Price (Rp.)</span>
                        </label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0"
                            class="input input-primary @error('price') {{ 'input-error' }} @enderror input-bordered w-full max-w-sm" />
                        @error('price')
                            <label class="label">
                                <span class="label-text-alt text-base text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control w-full max-w-sm">
                        <label class="label">
                            <span class="label-text text-lg">Product Stock</span>
                        </label>
                        <input type="number" name="stock" value="{{ old('product', $product->stock) }}"
                            class="input input-primary @error('stock') {{ 'input-error' }} @enderror input-bordered w-full max-w-sm" />
                        @error('stock')
                            <label class="label">
                                <span class="label-text-alt text-base text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection
