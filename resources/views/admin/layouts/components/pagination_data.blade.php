
    <table class="table table-hover table-lg">
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>isbn</th>
            <th>Publisher</th>
            <th>Authors</th>
        </tr>
        </thead>
        <tbody>

        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->isbn }}</td>
                <td><a href="{{route('publishers.show',$book->publisher )}}">{{ $book->publisher->name }}</a></td>
                <td>@foreach($book->authors as $author) {{ $author->name }} <br> @endforeach</td>
            </tr>
        @endforeach

        </tbody>

    </table>



<div class="nav_link">
    {!! $books->links() !!}
</div>








