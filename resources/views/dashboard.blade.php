@extends('layouts.dashboard')

@section('mainPanel')
    Dashboard Content
@endsection

@section('leftPanel')
    <x-parts.profile-avatar-box/>
@endsection

@section('rightPanel')
    <x-parts.profile-cv-summary/>
@endsection

