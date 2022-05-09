@extends('layouts.app')

@section('styles-links')
<link rel="stylesheet" href="/css/alt-gallery.css">
<link rel="stylesheet" href="/css/gallery.css">

@endsection

@section('content')
<div class="container">
    <div class="gallery" id="gallery">
        
        @foreach ($photos as $photo)
            <div class="gallery-item">
                <div class="content">
                    <img src="{{ $photo->path }}" alt="">
                </div>
            </div>
        @endforeach
    
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="/js/alt-gallery.js"></script>
@endsection