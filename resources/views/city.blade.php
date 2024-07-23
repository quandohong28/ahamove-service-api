@extends('layouts.main')

@section('title', 'Danh sách thành phố')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($cities as $citi)
            <a href="{{ route('city-detail', ['id' => $citi['_id']]) }}"
                class="bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-10 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                <p>{{ $citi['_id'] }}</p>
                <p>{{ $citi['name'] }}</p>
                <p>{{ $citi['name_vi_vn'] }}</p>
            </a>
        @endforeach
    </div>
@endsection
