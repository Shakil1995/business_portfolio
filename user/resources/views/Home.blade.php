@extends('Layout.app')

@section('content')


@include('Component.HomeBanner')
@include('Component.Services')

@include('Component.Courses')
@include('Component.Project')

@include('Component.Contact')
@include('Component.Blog')
@include('Component.user_Review')

{{-- @include('Component.userForm') --}}
@include('Component.footer')











@endsection