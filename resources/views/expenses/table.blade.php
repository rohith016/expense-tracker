<table class="table mt-4">
    <tr>
        <th>#</th>
        <th>Amount</th>
        <th>User</th>
        <th>Category</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    @foreach ($expenses as $expense)
    <tr>
        <td>{{ $loop -> iteration }}</td>
        <td>{{ $expense->amount}}</td>
        <td>{{ $expense->user?->name}}</td>
        <td>{{ $expense->category?->name}}</td>
        <td>{{ $expense->date }}</td>
        <td>
            <a href="{{ route('expenses.edit', $expense) }}" class="underline">Edit</a>
            |
            <a href="{{ route('expenses.show', $expense) }}" class="underline">View</a>
            |
            <form action="{{ route('expenses.destroy', $expense)}}"
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
{{$expenses -> links()}}
