@extends('admin.dashboard')

@section('title')
    Danh sách bài viết
@endsection

@section('content')
    <div>
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
                        Edit/Delete
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
