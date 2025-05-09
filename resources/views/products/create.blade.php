<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('products.store') }}" method="POST" id="createForm">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Product Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="size" class="block text-gray-700">Size (MB/GB)</label>
                        <input type="text" name="size" id="size" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="duration" class="block text-gray-700">Duration (in days)</label>
                        <input type="number" name="duration" id="duration" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700">Price</label>
                        <input type="number" name="price" id="price" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">
                            Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
