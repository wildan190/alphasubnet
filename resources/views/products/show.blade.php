<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">{{ $product->name }}</h3>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Size:</strong> {{ $product->size }}</p>
                <p><strong>Duration:</strong> {{ $product->duration }} days</p>
                <p><strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                <div class="mt-6">
                    <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md">
                        Edit Product
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md">
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
