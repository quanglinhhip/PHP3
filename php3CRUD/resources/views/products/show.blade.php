@extends('master')
@section('title')
    Chi tiết sản phẩm: {{ $product->name }}
@endsection
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="bg-primary text-white">FIELD NAME </th>
                <th class="bg-primary text-white">VALUE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product->toArray() as $field => $value)
                <tr>
                    <td>{{ Str::ucfirst($field) }}</td>
                    <td>
                        @if ($field == 'img_thumb')
                            <img src="{{ asset($value) }}" alt="ảnh sản phẩm" width="100px">
                        @elseif($field == 'category_id')
                            {{ $product->category->name }}
                        @else
                            {{ $value }}
                        @endif
                    </td>
                    {{-- <td>{{ $item->name }}</td>
                    <td>{{ $item->sku }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->overview }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route('products.index') }}">Quay lại</a>
@endsection
