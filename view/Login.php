<body>
    <div class="container-lg col-12 col-lg-6">
        <div class="mt-2">
            <div class="card">
                <div class="card-body mt-2">
                    <form action="?id=Login" method = "post">
                        <div class="mt-3 mb-3">
                            <label for="email" class="form-label">กรอกอีเมล</label>
                            <input type="email" class="form-control" id='email' name='email'>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="password" class="form-label">กรอกรหัสผ่าน</label>
                            <input type="password" class="form-control" id='password' name='password'>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-success mt-2">
                                เข้าสู่ระบบ
                            </button>
                            <div class="ms-auto d-flex">
                                <a href = "?id=View-Register" class="me-2 btn btn-primary mt-2">
                                    สมัครผู้ใช้
                                </a>
                                <!-- <a href = "?id=View-Register&type=res" class=" btn btn-outline-primary mt-2">
                                    สมัครร้านค้า
                                </a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body> 
