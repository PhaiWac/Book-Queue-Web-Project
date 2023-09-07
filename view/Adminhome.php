<body>
    <div class="container-lg col-12 col-lg-6 mt-5">
        <div class="mt-2 mb-2 d-flex">
            <input type="text" class="form-control me-2" placeholder="search">
            <button class="btn rounded btn-primary">Search</button>
        </div>

        <div class="card mt-2">
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($data)) : ?>
                <div class="col-12 col-lg-4 item" id = <?=$row['email']?>>
                    <div class="card m-3">
                        <div class="card-header">
                            asdad
                        </div>
                        <div class="card-body">
                            <h2><?=$row['email']?></h2>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-success accept" id = <?=$row['email']?> >
                                อนุมัติ
                            </button>
                            <button class="btn btn-danger delete" id = <?=$row['email']?>>
                                ไม่อนุมัติ
                            </button>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
</body>

<script>
    $('.accept').click(function(){
        var id =  $(this).attr('id')  ;
        $.ajax({
            url : '?id=AcceptShop' ,
            method : 'POST' ,
            data : {
                id : id ,
            },
            success : function(res) {
                window.location.reload() ;
            },
            
        })
    })
    $('.delete').click(function(){
        var id =  $(this).attr('id')  ;
        $.ajax({
            url : '?id=NotAcceptShop' ,
            method : 'POST' ,
            data : {
                id : id ,
            },
            success : function(res) {
                window.location.reload() ;
            },
            
        })
    })
</script>