@extends('layouts.app')

@section('content')
<h1>To-Do List</h1>
<a href="{{ route('checklist.create') }}">Tambah Checklist</a>
<ul>
    @foreach ($checklists as $checklist)
        <li>{{ $checklist->name }}</li>
    @endforeach
</ul>
@endsection
