@extends('layout')

@section('book_name', 'Authors')

@section('content')
    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">AuthorName</th>
            <th scope="col">Books amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <th scope="row">{{$author->id}}</th>
                <th>
                    <a href="{{ route('authors.show', $author) }}">{{$author->authorName}}</a>
                </td>
                <td>
                    <a href="{{ route('authors.show', $author) }}"> {{ $author->count ?? 0 }}</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('authors.destroy', $author) }}">
                        <a type="button" class="btn btn-success" href="{{ route('authors.edit', $author) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <tr>
        <td>
            <a class="btn btn-primary" role="button" href="{{route('authors.create')}}">Add new author</a>
        </td>
        <td>
            <a type="button" class="btn btn-secondary" href="/">Back to main</a>
        </td>
    </tr>
@endsection
