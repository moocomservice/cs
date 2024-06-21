<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">ผลการค้นหา</h1>
        @if ($found)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $name }}</h5>
                    <p class="card-text">จำนวนเงิน: {{ $amount }} บาท</p>
                    <p class="card-text">สินค้าที่ขาย: {{ $product }}</p>
                    <p class="card-text">วันที่: {{ $date }}</p>
                    <p class="card-text">หมายเลข: {{ $number }}</p>

                    @if (!empty($imageUrls))
                        <div class="mb-3">
                            <h5>รูปภาพ:</h5>
                            <div class="row">
                                @foreach ($imageUrls as $imageUrl)
                                    <div class="col-md-4">
                                        <img src="{{ $imageUrl }}" class="img-fluid mb-2">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <a href="moreinfo" class="btn btn-primary">ดูรายละเอียดเพิ่มเติม</a>
                    <a href="{{ route('search') }}" class="btn btn-secondary">กลับไปหน้าค้นหา</a>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $name }}</h5>
                    <p class="card-text">ไม่มีประวัติฉ้อโกง</p>
                    <a href="{{ route('search') }}" class="btn btn-secondary">กลับไปหน้าค้นหา</a>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
