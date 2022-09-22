@extends("layout")

@section("book_name", "Book ".$book->book_name)

@section("content")
    <a type="button" class="btn btn-secondary" href="{{route("books.index")}}">Back to books</a>
    <div class="card mt-3" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id: {{$book->id}}</li>
            <li class="list-group-item">Book: {{$book->book_name}}</li>
            <li class="list-group-item">Author: {{$book->author_name}}</li>
            <li class="list-group-item">Count: {{$book->count}}</li>
            <li class="list-group-item">Author_id: {{$book->author_id}}</li>
            <li class="list-group-item">Created: {{$book->created_at->format("d/m/y H:i:s")}}</li>
            <li class="list-group-item">Updated: {{$book->updated_at->format("d/m/y H:i:s")}}</li>
        </ul>
    </div>
    <form method="POST" class="mt-3" action="{{ route("books.destroy", $book) }}" >
        <a type="button" class="btn btn-warning" href="{{ route("books.edit", $book) }}">Edit</a>
        @csrf
        @method("DELETE")
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endsection
