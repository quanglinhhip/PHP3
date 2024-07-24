@extends('master')
@section('title')
    Danh sách danh mục
@endsection
@section('content')
    <h2>
        <a href="{{ route('categories.create') }}" class="btn btn-info mt-2">Thêm sản phẩm</a>
    </h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="bg-primary text-white">ID</th>
                {{-- <th class="bg-primary text-white">IMG THUMB </th> --}}
                <th class="bg-primary text-white">NAME</th>
                <th class="bg-primary text-white">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    {{-- <td>
                        <img src="{{ asset($item->img_thumb) }}" alt="ảnh sản phẩm" width="100px">
                    </td> --}}
                    <td>{{ $item->name }}</td>

                    <td>
                        <a href="{{ route('categories.show', $item) }}" class="btn btn-info mt-2">Show</a>
                        <a href="{{ route('categories.edit', $item) }}" class="btn btn-warning mt-2">Edit</a>
                        <form action="{{ route('categories.destroy', $item) }}" method="POST">
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
