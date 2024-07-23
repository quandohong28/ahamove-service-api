@extends('layouts.main')

{{-- array:9 [▼ // app/Http/Controllers/AhamoveController.php:98
  "_id" => "DAD"
  "country_id" => "VN"
  "name" => "Da Nang"
  "name_vi_vn" => "Đà Nẵng"
  "location" => array:2 [▶]
  "level" => 2.0
  "area_id" => "48"
  "service_city_id" => "DAD"
  "public_service" => true
] --}}

@section('content')
    <div class="p-10">
        <h1 class="font-bold mb-10">Chi tiết thành phố</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="rounded border p-5">
                <p class="font-bold">ID</p>
                <p>{{ $city['_id'] }}</p>
            </div>
            <div class="rounded border p-5">
                <p class="font-bold">Mã quốc gia</p>
                <p>{{ $city['_id'] }}</p>
            </div>
            <div class="rounded border p-5">
                <p class="font-bold">Tên</p>
                <p>{{ $city['name'] }}</p>
            </div>
            <div class="rounded border p-5">
                <p class="font-bold">Tên Tiếng Việt</p>
                <p>{{ $city['name_vi_vn'] }}</p>
            </div>
            <div class="rounded border p-5">
                <p class="font-bold">Kinh độ</p>
                <p>{{ $city['location']['coordinates'][0] }}</p>
            </div>
            <div class="rounded border p-5">
                <p class="font-bold">Vĩ độ</p>
                <p>{{ $city['location']['coordinates'][1] }}</p>
            </div>
            <div class="rounded border p-5">
                <p class="font-bold">Cấp bậc</p>
                <p>{{ $city['level'] }}</p>
            </div>
            <div class="rounded border p-5">
                <p class="font-bold">Mã khu vực</p>
                <p>{{ $city['area_id'] }}</p>
            </div>
            <div class="rounded border p-5">
                <p class="font-bold">Mã dịch vụ thành phố</p>
                <p>{{ $city['service_city_id'] }}</p>
            </div>
            <div class="rounded border p-5">
                <p class="font-bold">Dịch vụ công cộng</p>
                <p>{{ $city['public_service'] ? 'Có' : 'Không' }}</p>
            </div>
        </div>
    </div>
@endsection
