<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">ค้นหา</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('search') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="telephone">Promtpay Or Truemoney Wallet:</label>
                        <input type="text" class="form-control" id="telephone" name="telephone">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">ชื่อ นามสกุล:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="idcard">เลขบัตรประชาชน:</label>
                        <input type="text" class="form-control" id="idcard" name="idcard">
                    </div>
                    <div class="form-group mb-3">
                        <label for="bankType">ธนาคาร:</label>
                        <select class="form-control" id="bankType" name="bankType">
                            <option value="">เลือกธนาคาร</option>
                            <option value="ไทยพาณิชย์">ไทยพาณิชย์</option>
                            <option value="กสิกรไทย">กสิกรไทย</option>
                            <!-- Add more bank options here -->
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="bankAccount">เลขบัญชีธนาคาร:</label>
                        <input type="text" class="form-control" id="bankAccount" name="bankAccount">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">ค้นหา</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
