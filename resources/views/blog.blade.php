@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-1">
                    <div class="card-header">
                        {{ $blog['blog_title'] }}
                        <strong> -by {{ $userName }} </strong>
                    </div>
                    <div class="card-header">
                        Category :
                        @foreach ($blog['categories'] as $item)
                             {{ $item['category_name'] }}
                        @endforeach
                    </div>
                    <div class="card-body">
                        <div class="container">
                            {!! $blog['blog_content'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
