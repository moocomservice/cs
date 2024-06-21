<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Report List</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>ID Card</th>
                                    <th>Bank Account</th>
                                    <th>Bank Type</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Product Name</th>
                                    <th>Telephone</th>
                                    <th>Images</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <td>{{ $report->id }}</td>
                                        <td>{{ $report->name }}</td>
                                        <td>{{ $report->surname }}</td>
                                        <td>{{ $report->idcard }}</td>
                                        <td>{{ $report->bankAccount }}</td>
                                        <td>{{ $report->bankType }}</td>
                                        <td>{{ $report->date }}</td>
                                        <td>{{ $report->amount }}</td>
                                        <td>{{ $report->productName }}</td>
                                        <td>{{ $report->telephone }}</td>
                                        <td>
                                            @if ($report->image_urls)
                                                <div class="image-gallery">
                                                    @foreach (json_decode($report->image_urls) as $imageUrl)
                                                        <img src="{{ $imageUrl }}" class="img-fluid mb-2" style="max-width: 100px;">
                                                    @endforeach
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('report.update', $report->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" onchange="this.form.submit()">
                                                    <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="approve" {{ $report->status === 'approve' ? 'selected' : '' }}>Approve</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <!-- Add any other actions you want here -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="/profile" class="btn btn-light">Back to Profile</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
