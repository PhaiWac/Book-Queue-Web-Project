<body>
    <div class="container-lg col-12 col-lg-6 mt-3">
        <table class="table">
            <thead class = 'table-dark round-2'>
                <tr>
                    <th>ชื่อ</th>
                    <th>สกุล</th>
                    <th>เบอร์</th>
                    <th>ที่อยู่</th>
                </tr>
            </thead>
            <tbody class="table-primary">
                    <?php while($row = mysqli_fetch_assoc($data) ) : ?>
                        <?php if ($row['role'] == 'admin') continue  ?> 
                        <tr>
                            <td><?=$row['firstname']?></td>
                            <td><?=$row['lastname']?></td>
                            <td><?=$row['phone']?></td>
                            <td><?=$row['address']?></td>
                        </tr>
                    <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>