@extends('admin.dashboard')

@section('title')
    Danh sách bài viết
@endsection

@section('content')
    <div>
        @if ($message != '')
            <div style="color: green">
                {{ $message }}
            </div>
        @endif
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>
                    <a href="{{ BASE_URL . 'admin/articles/create' }} ">Create</a>
                </th>
            </tr>
            @foreach ($articles as $article)
                <tr>
                    <td><?= $article->id ?></td>
                    <td><?= $article->title ?></td>
                    <td><img src="{{ BASE_URL . $article->image }}" width="100" alt=""></td>
                    <td><?= $article->name ?></td>
                    <td>
                        <a href="{{ BASE_URL . '/admin/articles/edit/' . $article->id }}">Edit</a>

                        <form action="{{ BASE_URL . '/admin/articles/delete/' . $article->id }}" method="post">
                            <button type="submit" onclick="return confirm('Bạn có muốn xóa không?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
