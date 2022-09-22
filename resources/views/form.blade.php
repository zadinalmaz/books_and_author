@extends("layout")

@section("book_name", isset($book) ? "Update ".$book->book_name : "Create book ")

@section("content")
    <a type="button" class="btn btn-secondary" href="{{route("books.index")}}">Back to books</a>
    <form method="POST"
          @if(@isset($book))
          action="{{ route("books.update", $book )}}"
          @else
          action="{{ route("books.store") }}"
          @endif
          class="mt-3">
        @csrf
        @isset($book)
            @method("PUT")
        @endisset
        <div class="row">
            <div class="row mt-3">
                <div class="col">
                    <input name="book_name"
                           value="{{ old("book_name", isset($book) ? $book->book_name : null )  }}"
                           type="text" class="form-control" placeholder="book_name" aria-label="book_name">
                    @error("book_name")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <input name="author_name"
                           value="{{ old("author_name", isset($book) ? $book->author_name : null )  }}"
                           type="text" class="form-control" placeholder="author_name" aria-label="author_name">
                    @error("author_name")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>
    </form>
@endsection
