<body>
    <div class="container-lg col-12 col-lg-6 mt-3">
        <table class="table">
            <thead class = 'table-dark round-2'>
                <tr>
                    <th>ชื่อ</th>
                    <th>สกุล</th>
                    <th>เบอร์</th>
                    <th>ที่อยู่</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody class="table-primary">
                    <?php while($row = mysqli_fetch_assoc($data) ) : ?>
                        <?php if ($row['role'] != 'res') continue  ?> 
                        <tr>
                            <td><?=$row['firstname']?></td>
                            <td><?=$row['lastname']?></td>
                            <td><?=$row['phone']?></td>
                            <td><?=$row['address']?></td>
                            <td class="d-felx">
                                <button class="btn btn-danger" id = <?=$row['id']?> >
                                    ลบข้อมูล
                                </button>
                            </td>
                        </tr>
                    <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>

<script>
    $('.btn').click(function(){
        var id = $(this).attr("id") ;

        $.ajax({
            url : '?id=DeleteUser' ,
            method : 'post' ,
            data : {
                id : id ,
            },
            success : function(res) {
                window.location.reload() ;
            }
        })
    })
</script>