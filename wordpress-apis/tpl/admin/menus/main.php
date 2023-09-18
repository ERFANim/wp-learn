<div class="warp">
    <h1>لیست اطلاعات</h1>

        <a href="<?php echo add_query_arg(['action'=>'add']); ?>" class="button-primary">ثبت داده جدید</a>
        <button id="sendAjaxRequest" class="button">SendAjaxRequest</button>        
        <table class="widefat">
            <thead>
                <tr>
                    <th>شناسه</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>موبایل</th>
                    <th>عملیات</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
    
                <?php foreach($samples as $sample): ?>
                    <tr>
                        <td><?php echo $sample->ID; ?></td>
                        <td><?php echo $sample->FirstName; ?></td>
                        <td><?php echo $sample->LastName; ?></td>
                        <td><?php echo $sample->Mobile; ?></td>
                        <td>
                            <a href="<?php echo add_query_arg(['action' => 'delete','item' => $sample->ID]); ?>">حذف کردن</a>
                        </td>
                        <td>
                            <a href="<?php echo add_query_arg(['action' => 'update','item' => $sample->ID]); ?>">ویرایش</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

</div>