@extends("layout")

@section("book_name", "Books")

@section("content")
    <a class="btn btn-primary"  role="button" href="{{ route("books.create") }}">Create book</a>

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Book</th>
            <th scope="col">Author</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
{{--        <pre>--}}
{{--            {{ print_r($data) }}--}}

{{--        </pre>--}}
{{--                @foreach($authors as $author)--}}
{{--                    <div>{{ $author->id }}</div>--}}
{{--                @endforeach--}}
                @foreach($books as $book)
            <tr>
                <th scope="row">{{ $book->id }}</th>
                <td>
                    <a href="{{ route("books.show", $book) }}">{{ $book->book_name }}</a>
                </td>
                <td>
                    <a href="{{ route("books.show", $book) }}">{{ $book->author_name }}</a>
                </td>
                <td>
                    <form method="POST" action="{{ route("books.destroy", $book) }}" >
                        <a type="button" class="btn btn-warning" href="{{ route("books.edit", $book) }}">Edit</a>
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$books->links()}}
@endsection
