<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <div class="table-responsive">
        <table class="table" id="alldata">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booking as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <th scope="row">{{ $item->name }}</th>
                        <th scope="row">{{ $item->email }}</th>
                        <th scope="row">{{ $item->service->service }}</th>
                        <th scope="row">{{ $item->status->status }}</th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>
</html>
