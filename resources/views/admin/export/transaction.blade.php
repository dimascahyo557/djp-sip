<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Product name</th>
            <th>Product id</th>
            <th>Transaction date</th>
            <th>Price</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->product->name }}</td>
                <td>{{ $transaction->product_id }}</td>
                <td>{{ $transaction->trx_date }}</td>
                <td>{{ $transaction->price }}</td>
                <td>{{ $transaction->created_at }}</td>
                <td>{{ $transaction->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>