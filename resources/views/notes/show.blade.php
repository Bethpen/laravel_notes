@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Notes') }}</div>

                <div class="card-body">
                  
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ "Created by: ".$note->user->name }}</label>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $note->title }}" required readonly>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <p id="description" type="text" class="form-control" name="description">{{ $note->description }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="share" class="col-md-4 col-form-label text-md-end">{{ __('Shared with: ') }}</label>

                            <div class="col-md-6">
                                <ul>
                                    
                                    @foreach ($note->shared as $item)
                                        <li>{{$item->name}}</li>
                                    @endforeach
                                </ul>
                            <div>
                        </div>

                        <a :href="{{ route('notes.edit', $note->id)}}">Edit</a>
                        <form method="POST" action="{{ route('notes.destroy', $note->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
