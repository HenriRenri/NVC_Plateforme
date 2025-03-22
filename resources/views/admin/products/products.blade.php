@extends('layouts.admin')

@section('content')
    <div class="container mx-auto mt-10">

        
        <h1 class="text-2xl font-bold mt-5 text-center">Products listes</h1>
        <div class="flex items-center flex-wrap justify-end">
            <ul class="flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                  <svg class="icon-slash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 20L20 4" />
                   </svg>
                </li>
                <li>
                    <div class="text-tiny">Products listes</div>
                </li>
            </ul>
        </div>
        <table class="table-auto w-full border-collapse border border-gray-300 mt-5">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Box id</th>
                    <th class="border border-gray-300 px-4 py-2">Categories</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Description</th>
                    <th class="border border-gray-300 px-4 py-2">Price</th>
                    <th class="border border-gray-300 px-4 py-2">Stock</th>
                    <th class="border border-gray-300 px-4 py-2">Is active</th>
                    <th class="border border-gray-300 px-4 py-2">Images</th>
                    <th class="border border-gray-300 px-4 py-2">Created at</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($products as $product)
                    <td class="border border-gray-300 px-4 py-2">{{ $product->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->category_id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->description }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->price }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->stock }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->is_active }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->images }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->created_at }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <div class="flex justify-between items-center">
                            <div class="text-gray-400">
                              <i class="fa fa-eye cursor-pointer"></i>
                            </div>
                            <div class="text-green-400">
                              <a href="#">
                                <i class="fa fa-user-pen  text-xl"></i>
                              </a>
                            </div>
                            <div class="text-red-400">
                              <button id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal"  type="button">
                                <i class="fa fa-trash"></i>
                              </button>
                            </div>
                        </div>
                    </td>
                 @endforeach
            </tbody>
        </table>
        @if ($products->hasPages())
            <div class="mt-5 flex justify-between">
            {{-- Previous Page Link --}}
            @if ($products->onFirstPage())
                <span class="px-4 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded">Previous</span>
            @else
                <a href="{{ $products->previousPageUrl() }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">< Previous</a>
            @endif

            {{-- Next Page Link --}}
            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Next ></a>
            @else
                <span class="px-4 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded">Next</span>
            @endif
            </div>
        @endif
    </div>
@endsection