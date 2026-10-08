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
                    <a href="">Create</a>
                </th>
            </tr>
            @foreach ($articles as $article)
                <tr>
                    <td><?= $article->id ?></td>
                    <td><?= $article->title ?></td>
                    <td><?= $article->image ?></td>
                    <td><?= $article->name ?></td>
                    <td>
                        Edit/Delete
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
