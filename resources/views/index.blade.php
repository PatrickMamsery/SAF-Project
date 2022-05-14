@extends('layouts.app')

@section('styles-links')
<link rel="stylesheet" href="/css/gallery.css">
<link rel="stylesheet" href="/css/bootstrap-notifications.min.css">
@endsection

@section('content')

    @include('sections.hero')
    @include('sections.about')
    @include('sections.work')
    @include('sections.upcoming')
    @include('sections.trending')


@endsection
