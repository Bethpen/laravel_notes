@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <a href="{{ route('notes.create')}}">Create New</a>
               <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td>{{$note->title}}</td>
                                    <td>{{$note->created_at}}</td>
                                    <td>
                                        <a href="{{route('notes.show', $note->id)}}">Show</a>
                                        <a href="{{route('notes.edit', $note->id)}}">Edit</a>
                                        <form action="{{route('notes.destroy', $note->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
               </table>
        </div>
    </div>
</div>
@endsection
