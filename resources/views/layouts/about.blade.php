@extends('layouts.app')

@section('styles-links')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
@endsection

@section('content')
    @include('sections.about.about')

    @include('sections.about.social_activities')

    @include('sections.about.activities')

    @include('sections.about.leaders')

    @include('sections.about.technical')

    <div class="" style="margin-bottom: 100px">

    </div>
@endsection