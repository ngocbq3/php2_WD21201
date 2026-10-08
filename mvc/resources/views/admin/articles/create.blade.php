@extends('admin.dashboard')

@section('title')
    Thêm bài viết
@endsection

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        <div class="control">
            <label for="">Title</label>
            <input type="text" name="title" id="">
        </div>
        <div class="control">
            <label for="">Image</label>
            <input type="file" src="" name="image" alt="">

        </div>
        <div class="control">
            <label for="">Category</label>
            <select name="category_id" id="">
                @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}">
                        {{ $cate->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="control">
            <label for="">Description</label>
            <textarea name="description" cols="30" rows="4"></textarea>
        </div>
        <div class="control">
            <label for="">Content</label>
            <textarea name="content" cols="30" rows="6"></textarea>
        </div>
        <div class="control">
            <button type="submit">Create New</button>
        </div>
    </form>
@endsection
