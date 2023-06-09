@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Notes') }}</div>

                <div class="card-body">
                        @if ($errors)
                            @foreach ($errors->all() as $e)
                                {{$e}}
                            @endforeach
                        @endif

                        <form method="POST" action="{{$isEdit ? route('notes.update', $note->id): route('notes.store')}}">
                        @csrf
                        @if ($isEdit)
                          @method('PUT')  
                        @endif
                        
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $isEdit ? $note->title : '' }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ $isEdit ? $note->description : '' }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Share with others') }}</label>
                                <div class="col-md-6">
                                   <select name="share[]" id="share" multiple>
                                        @foreach (App\Models\User::all()->except(Auth::id()) as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                   </select>
                                </div>
                            </div>
                            <button type="submit">{{$isEdit? "Update":"Create"}}</button>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
