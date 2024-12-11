<!-- resources/views/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h3>Related Medicine</h3>
    <p>ID: {{ $post->medicine->medicine_id }}</p>
    <p>Name: {{ $post->medicine->name }}</p>
    <p>Brand: {{ $post->medicine->brand }}</p>
    <p>Dosage: {{ $post->medicine->dosage }}</p>
    <p>Form: {{ $post->medicine->form }}</p>
    <p>Price: {{ $post->medicine->price }}</p>
    <p>Stock: {{ $post->medicine->stock }}</p>
@endsection
