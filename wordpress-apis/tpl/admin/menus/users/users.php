<div class="warp">
    <h1>کاربران</h1>

    <table class="widefat">

    <thead>
     <tr>   
        <th>شناسه</th>
        <th>نام کامل</th>
        <th>ایمیل</th>
        <th>شماره همراه</th>
        <th>کیف پول</th>
        <th>عملیات</th>
     </tr>
    </thead>
    <tbody>

         <?php foreach($users as $user): ?>
         <?php
         $UserWallet = get_user_meta($user->ID,'wallet',true);
         $UserWallet = empty($UserWallet) ? 0 : $UserWallet;
         ?>
              <tr>
                <td><?php echo $user->ID; ?></td>
                <td><?php echo $user->display_name; ?></td>
                <td><?php echo $user->user_email; ?></td>
                <td><?php echo get_user_meta($user->ID,'mobile',true); ?>
                  <a href="<?php echo add_query_arg(['action'=>'RemoveMobile' , 'id'=>$user->ID]); ?>">
                    <span class="dashicons dashicons-trash"></span>
                  </a>
                </td>
                <td><?php echo number_format($UserWallet).' تومان '; ?>
                  <a href="<?php echo add_query_arg(['action'=>'RemoveWallet' , 'id'=>$user->ID]); ?>">
                    <span class="dashicons dashicons-trash"></span>
                  </a>
                </td>
                <td>
                    <a href="<?php echo add_query_arg(['action'=>'edit' , 'id'=>$user->ID]); ?>">
                     ویرایش<span class="dashicons dashicons-edit"></span>
                    </a>
                </td>
              </tr>
         <?php endforeach ?>

    </tbody>

    </table>
</div>