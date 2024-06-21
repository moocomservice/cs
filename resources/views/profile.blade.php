<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .btn-purple {
        color: #fff;
        background-color: #6f42c1;
        border-color: #6f42c1;
    }

    .btn-purple:hover {
        color: #fff;
        background-color: #5a3ac5;
        border-color: #5a3ac5;
    }
    </style>

</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" alt="Profile Picture" class="rounded-circle mb-3">
                        <h5 class="card-title">ชื่อ : {{ Auth::user()->username }}</h5>
                        <p class="card-text">ID : {{ Auth::user()->id }}</p>
                        <p class="card-text">อีเมล : {{ Auth::user()->email }}</p>
                        <p class="card-text">ตำแหน่งงาน : {{ Auth::user()->role }}</p>
                    </div>
                </div>
                <div class="d-grid gap-2 mt-4">
                    <a href="/newreport" class="btn btn-success">เพิ่มรายงานมิจฉาชีพ</a>
                    <a href="#" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</a>
                    <a href="#" class="btn btn-secondary">เปลี่ยนรหัสผ่าน</a>
                    @if(Auth::user()->role === 'admin')
                        <a href="/reportlist" class="btn btn-purple">ดูการส่งรายงาน</a>
                    @endif
                    <a href="/logout" class="btn btn-danger">ออกจากระบบ</a>
                </div>
                <div class="text-center mt-4">
                    <a href="/" class="btn btn-light">หน้าหลัก</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
