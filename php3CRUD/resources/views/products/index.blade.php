@extends('master')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    <h2>
        <a href="{{ route('products.create') }}" class="btn btn-info mt-2">Thêm sản phẩm</a>
    </h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="bg-primary text-white">ID</th>
                <th class="bg-primary text-white">IMG THUMB </th>
                <th class="bg-primary text-white">NAME</th>
                <th class="bg-primary text-white">SKU</th>
                <th class="bg-primary text-white">CATEGORY</th>
                <th class="bg-primary text-white">OVERVIEW</th>
                <th class="bg-primary text-white">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <img src="{{ asset($item->img_thumb) }}" alt="ảnh sản phẩm" width="100px">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->sku }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->overview }}</td>
                    <td>
                        <a href="{{ route('products.show', $item) }}" class="btn btn-info mt-2">Show</a>
                        <a href="{{ route('products.edit', $item) }}" class="btn btn-warning mt-2">Edit</a>
                        <form action="{{ route('products.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-2"
                                onclick="return confirm('Bạn có chắc chắn muốn xoá không?')">Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
