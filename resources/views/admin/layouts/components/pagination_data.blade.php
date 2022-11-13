
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

        @foreach($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->isbn }}</td>
                <td><a href="{{route('publishers.show',$row->publisher )}}">{{ $row->publisher->name }}</a></td>
                <td>@foreach($row->authors as $author) {{ $author->name }} <br> @endforeach</td>
            </tr>
        @endforeach

        </tbody>

    </table>



<div class="nav_link">
    {!! $data->links() !!}
</div>








