<table class="table mt-4">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $loop -> iteration }}</td>
        <td>{{ $category -> name}}</td>
        <td>
            <a href="{{ route('categories.edit', $category) }}" class="underline">Edit</a>
            |
            <a href="{{ route('categories.show', $category) }}" class="underline">View</a>
            |
            <form action="{{ route('categories.destroy', $category)}}"
                method="post"
                class="inline"
                onsubmit="return confirm('Are you sure?')">
                @csrf
                @method("delete")
                <button  type="submit" class="text-red-500 underline">Delete</button>

            </form>

        </td>
    </tr>
    @endforeach
</table>
{{$categories -> links()}}
