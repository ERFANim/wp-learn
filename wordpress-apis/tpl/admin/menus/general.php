<div class="warp">
    <h1>تنظیمات پلاگین</h1>

    <form action="" method="post">

        <label for="is_plugin_active">
            <input name="is_plugin_active" type="checkbox" id="is_plugin_active"
            <?php echo isset($current_plugin_status) && intval($current_plugin_status)>0 ? 'checked' : ''; ?>>
            فعال بودن پلاگین
        </label>
        <div>
        <button class="button-primary" type="submit" name="saveSettings">ذخیره سازی</button>
        </div>    
    </form>
</div>