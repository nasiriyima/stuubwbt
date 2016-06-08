<table class="table">
        <thead>
        <tr>
                <th>
                        <input class="all" id="all" onclick="enableElements('all', 'all');" type="checkbox">
                </th>
                <th>From</th>
                <th class="hidden-sm">Subject</th>
                <th>Status</th>
                <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($messages as $message): ?>
                <tr>
                        <td><input class="checkbox" type="checkbox" onclick="enableElements('one', '<?php echo e($message->id); ?>');" id="chk<?php echo e($message->id); ?>"></td>
                        <td>
                                <a href="javascript:showMessage('<?php echo \Crypt::encrypt($message->id); ?>')"><?php echo ($message->status == 0)? '<strong>'.$message->sender->first_name.'</strong>' : $message->sender->first_name; ?></a>
                        </td>
                        <td class="hidden-sm">
                                <a href="javascript:showMessage('<?php echo \Crypt::encrypt($message->id); ?>')"><?php echo ($message->status == 0)? '<strong>'.$message->subject.'</strong>' : $message->subject; ?></a>
                        </td>
                        <td>
                                <a href="javascript:showMessage('<?php echo \Crypt::encrypt($message->id); ?>')"><span class="label label-<?php echo e(($message->status == 0)? 'info' :(($message->status == 1)? 'success' : '')); ?>"><?php echo e(($message->status == 0)? 'new' :(($message->status == 1)? 'read' : '')); ?></span></a>
                        </td>
                        <td>
                                <a href="#" title="reply"><span class="fa fa-reply"></span></a>
                                <a href="javascript:void(0)" onclick="showDeleteModal('<?php echo e($message->id); ?>');" title="trash"><span class="fa fa-trash-o"></span></a>
                                <input type="hidden" class="messages" id="message_id<?php echo e($message->id); ?>" name="messageId<?php echo e($message->id); ?>" value="<?php echo e($message->id); ?>"  disabled />
                        </td>
                </tr>
        <?php endforeach; ?>
        </tbody>
</table>