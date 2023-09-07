<body>
    <div class="container-lg col-12 col-lg-6 mt-3">
        <div class="row">
            <?php while($row = mysqli_fetch_assoc($data)) : ?>
                <?php if ($row['role'] != 'res') continue ?>
                <div class="col-12 col-lg-5">
                    <div class="card-header d-flex">
                        <?=$row['firstname']?>
                        <p class = 'ms-auto'>คิวล่าสุด <?=$row['queue']?></p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary w-100" id = <?=$row['id']?>>
                            จองคิว
                        </button>
                    </div>
                </div> 
            <?php endwhile ?>
        </div>
    </div>
</body>

<script>
    $('.btn').click(function(){
        $.ajax({
            url : '?id=Queue' ,
            method : 'post',
            data : {
                id : $(this).attr('id') ,
            },
            success : function(res) {
                window.location.reload();
            }
        })
    })
</script>