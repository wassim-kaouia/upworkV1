@extends('layouts.app')

@section('content')

<p>welcome {{ auth()->user()->name }}</p>

@endsection