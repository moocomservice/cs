<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check to Seller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .text-muted-link {
            color: #6c757d;
            text-decoration: none;
        }
        .text-muted-link:hover {
            color: #6c757d;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-5">Check to Seller</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <a href="/search" class="btn btn-success btn-lg mb-3">ค้นหารายชื่อมิจฉาชีพ</a>
                <br>
                <a href="#" class="btn btn-primary btn-lg mb-3" data-bs-toggle="modal" data-bs-target="#loginModal">เข้าสู่ระบบ</a>
                <p class="text-muted"><a href="#" class="text-muted-link" data-bs-toggle="modal" data-bs-target="#registerModal">สมัครบัญชีผู้ใช้งานใหม่</a></p>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="loginModalLabel">เข้าสู่ระบบ</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('profile') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">ชื่อผู้ใช้</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
    </form>
</div>

        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">สมัครบัญชีผู้ใช้งานใหม่</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="newUsername" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="newEmail" class="form-label">อีเมล</label>
                        <input type="email" class="form-control" id="newEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="newPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">สมัครบัญชี</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>