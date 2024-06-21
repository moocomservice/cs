<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container my-5">
        <h1 class="text-center mb-4">เพิ่มรายงานมิจฉาชีพ</h1>
        
        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ชื่อ :</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">นามสกุล :</label>
                <input type="text" name="surname" id="surname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="idcard" class="form-label">เลขบัตรประชาชน :</label>
                <input type="text" name="idcard" id="idcard" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="bankType" class="form-label">ธนาคาร :</label>
                <select name="bankType" id="bankType" class="form-select" required>
                    <option value="">เลือกธนาคาร</option>
                    <option value="ไทยพาณิชย์">ไทยพาณิชย์</option>
                    <option value="กสิกรไทย">กสิกรไทย</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bankAccount" class="form-label">เลขบัญชี :</label>
                <input type="text" name="bankAccount" id="bankAccount" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">วันที่โอน :</label>
                <input type="text" name="date" id="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">จำนวนเงิน:</label>
                <input type="text" name="amount" id="amount" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="productName" class="form-label">ชื่อสินค้า :</label>
                <input type="text" name="productName" id="productName" class="form-control">
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">PromptPay หรือ Truemoney Wallet:</label>
                <input type="text" name="telephone" id="telephone" class="form-control">
            </div>
            <div class="mb-3">
                <label for="images" class="form-label">อัปโหลดรูปภาพ (สูงสุด 3 รูป):</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Success Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="fas fa-check-circle fa-4x text-success"></i>
                            <p>Report created successfully!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<script>
    document.getElementById('reportForm').addEventListener('submit', function(event) {
        event.preventDefault();

        fetch(this.action, {
            method: 'POST',
            body: new FormData(this)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();

                document.getElementById('successModal').addEventListener('hidden.bs.modal', function() {
                    window.location.href = '/profile';
                });
            } else {
                console.error('Error creating report');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

</body>
</html>
