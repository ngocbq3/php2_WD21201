@extends('admin.dashboard')

@section('title')
    Thêm bài viết
@endsection

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        <div class="control">
            <label for="">Title</label>
            <input type="text" name="title" value="{{ $post->title }}">
        </div>
        <div class="control">
            <label for="">Image</label>
            <input type="file" src="" name="image" alt=""> <br>
            <img src="{{ BASE_URL . $post->image }}" width="100" alt="">

        </div>
        <div class="control">
            <label for="">Category</label>
            <select name="category_id" id="">
                @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}" @selected($cate->id == $post->category_id)>
                        {{ $cate->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="control">
            <label for="">Description</label>
            <textarea name="description" cols="30" rows="4">{{ $post->description }}</textarea>
        </div>
        <div class="control">
            <label for="">Content</label>
            <textarea name="content" cols="30" rows="6">{{ $post->content }}</textarea>
        </div>
        <div class="control">
            <button type="submit">Create New</button>
        </div>
    </form>
@endsection
