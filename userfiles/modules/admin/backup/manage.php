<? if(!is_admin()){error("must be admin");}; ?>
<?
/*
$var3 = api('mw/utils/Backup/get_bakup_location');
 d($var3);

$backs = new \admin\backup\api();
$backs = $backs->get_bakup_location();
d($backs);




 $var3 = api('mw/utils/Backup/get_bakup_location');
 d($var3);

 $var3 = api('mw/utils/Backup/get_bakup_location');
 d($var3);

 $var3 = api('mw/utils/Backup/get_bakup_location');
 d($var3);*/

 ?>

<div id="backups_list" >
  <h2>Available Backups</h2>
  <table   cellspacing="0" cellpadding="0" class="mw-ui-admin-table">
    <thead>
      <tr>
        <th>Filename </th>
        <th>Date</th>
        <th>Time</th>
        <th>Size</th>
        <th>Download</th>
        <th>Restore</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td>Filename</td>
        <td>Date</td>
        <td>Time</td>
        <td>Size</td>
        <td>Download</td>
        <td>Restore</td>
        <td>Delete</td>
      </tr>
    </tfoot>
    <tbody>
      <? $backups = api('mw/utils/Backup/get');
		  if(isarr($backups )): ?>
      <?
	  $i = 1;
	   foreach($backups  as $item): ?>
      <tr class="mw_admin_backup_item_<? print $i ?>">
        <td><? print $item['filename']  ?></td>
        <td ><span class="mw-date"><? print $item['date']  ?></span></td>
        <td><span class="mw-date"><? print $item['time']  ?></span></td>
        <td><span class="mw-date"><? print file_size_nice( $item['size'])  ?></span></td>
        <td><a class="mw-ui-admin-table-show-on-hover mw-ui-btn mw-ui-btn-blue" target="_blank" href="<? print api_url('mw/utils/Backup/download'); ?>?file=<? print $item['filename']  ?>">Download</a></td>
        <td>

        <a class="mw-ui-admin-table-show-on-hover mw-ui-btn mw-ui-btn-green" href="javascript:mw.admin_backup.restore('<? print $item['filename']  ?>')">Restore</a></td>
        <td><a class="mw-ui-admin-table-show-on-hover mw-ui-btn mw-ui-btn-red" href="javascript:mw.admin_backup.remove('<? print $item['filename']  ?>', '.mw_admin_backup_item_<? print $i ?>')">Delete</a></td>
      </tr>
      <? $i++; endforeach ; ?>
      <? endif; ?>
    </tbody>
  </table>
</div>
