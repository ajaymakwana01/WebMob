@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        + Add New Blog
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Blog Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="blog-form" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="label">Blog Title</label>
                                            <div class="control">
                                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" class="input" placeholder="Title" minlength="5" maxlength="100" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="label">Content</label>
                                            <div class="control">
                                                <textarea name="content" class="form-control" placeholder="Content" minlength="5" maxlength="2000" required rows="10">{{ old('content') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <label class="label">Category</label>
                                            <div class="control">
                                                @foreach ($categories as $category)
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" value="{{ $category['id'] }}" name="category[]">  {{ $category['category_name'] }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="field">
                                            <div class="control">
                                                <button type="submit" class="btn btn-primary">Publish</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-header">
                    Your Blogs - Click on the blog to read it
                </div>
                <div class="card-body">
                    <div class="container">
                        @if (!empty($blogs['blogs']))
                            @foreach ($blogs['blogs'] as $blog)
                            <ul  class="list-group mt-1">
                            <a href="{{ route('show.blog', ['blogId' => $blog['id']]) }}">
                                    <li class="list-group-item list-group-item-primary">
                                            {{$blog['blog_title']}}
                                    </li>
                                </a>
                                <li class="list-group-item">
                                    <strong>Category : </strong>
                                    @foreach ($blog['categories'] as $category)
                                         {{ $category['category_name'] }},
                                    @endforeach
                                </li>
                            </ul >
                            @endforeach

                        @else

                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
