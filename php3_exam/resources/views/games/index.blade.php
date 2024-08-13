@extends('master')
@section('title')
    Danh sách game
@endsection

@section('content')
    <h1><a href="{{ route('games.create') }}"class="btn btn-success">Thêm mới </a></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="bg-primary text-white">ID</th>
                <th class="bg-primary text-white">ẢNH BÌA</th>
                <th class="bg-primary text-white">TÊN TRÒ CHƠI</th>
                <th class="bg-primary text-white">NHÀ PHÁT TRIỂN</th>
                <th class="bg-primary text-white">NĂM PHÁT HÀNH</th>
                <th class="bg-primary text-white">THỂ LOẠI</th>
                <th class="bg-primary text-white">HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        {{-- <img src="{{ \Storage::url($item->cover_art) }}" alt="" width="50px"> --}}
                        <img src="{{ asset($item->cover_art) }}" alt="" width="50px">

                    </td>
                    <td>{{ $item->game_title }}</td>
                    <td>{{ $item->developer }}</td>
                    <td>{{ $item->release_year }}</td>
                    <td>{{ $item->genre }}</td>
                    <td>
                        <a href="{{ route('games.show', $item) }}" class="btn btn-primary">Chi tiết</a>
                        <a href="{{ route('games.edit', $item) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('games.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('R u sure?')">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
