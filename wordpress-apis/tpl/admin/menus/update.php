<div class="warp">
    <h1>ویرایش رکورد </h1>

    <form method="post">
    <table class="form-table">
       <tr valign="top">
       <th scope="row">نام</th>
       <td>
       <input type="text" name="FirstName" value="<?php echo $itemsample[0]->FirstName ?>">
       </td> 
       </tr>

       <tr valign="top">
       <th scope="row">نام خانوادگی</th>
       <td>
       <input type="text" name="LastName" value="<?php echo $itemsample[0]->LastName ?>">
       </td> 
       </tr>

       <tr valign="top">
       <th scope="row">موبایل</th>
       <td>
       <input type="text" name="Mobile" value="<?php echo $itemsample[0]->Mobile?>">
       </td> 
       </tr>

       <tr valign="top">
       <th scope="row"></th>
       <td>
       <input type="submit" name="updatedata" class="button-primary" value=" بروزرسانی">
       </td> 
       </tr>

    </table>
    </form>
</div>