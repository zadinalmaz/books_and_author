@extends('layout')

@section('book_name', isset($author) ? 'Update '.$author->authorName : 'Create author')

@section('content')
    <a type="button" class="btn btn-secondary" href="/">Back to main</a>
    <form method="POST"
          @if(isset($author))
          action="{{ route('authors.update', $author) }}"
          @else
          action="{{ route('authors.store') }}"
          @endif
          class="mt-3">
        @csrf
        @isset($author)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="col">
                <input name="authorName" value="{{ isset($author) ? $author->authorName : null }}"
                       type="text" class="form-control mt-3" placeholder="AuthorName" aria-label="AuthorName">
                <button type="submit" class="btn btn-success mt-3">Confirm</button>
            </div>
        </div>
    </form>
@endsection
