@extends('layout')

@section('css')

@stop
@section('content')

@include('partials.breadcrumb')


<!--    blog lists start   -->
<div class="blog-lists">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8">
                <div class="left-side">
                    <div class=" {{(session()->get('rtl') == 1) ? 'project-carousel-rtl': 'project-carousel'}} owl-carousel">
                        <div class="single-ss">
                            <img src="{{asset('public/images/blog/'.@$blog->image)}}" alt="{{$blog->title}}">
                        </div>
                    </div>
                    <div class="part-text-top">
                        <h2 class="subtitle my-3">@lang($blog->title)</h2>
                        <p>@lang($blog->details)</p>
                    </div>
                </div>
            </div>
          @include('partials.popular-blog')
        </div>
    </div>
</div>
<!--    blog lists end   -->


@stop

@section('js')

@stop
