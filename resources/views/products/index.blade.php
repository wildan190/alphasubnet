<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('products.create') }}" class="inline-block mb-4 bg-blue-500 text-white py-2 px-4 rounded-md">
                    Create Product
                </a>

                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Size</th>
                            <th class="border px-4 py-2">Price</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ $product->size }}</td>
                                <td class="border px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="text-blue-500">View</a> | 
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-500">Edit</a> | 
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline" id="deleteForm{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 delete-button" data-id="{{ $product->id }}">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.id;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm' + productId).submit();
                    }
                });
            });
        });
    </script>

    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
</x-app-layout>
