<?php

$e = File::E( ! is_null($the_name) ? $the_name : "");
$is_text = is_null($the_name) || strpos(',' . SCRIPT_EXT . ',', ',' . $e . ',') !== false;

?>
<?php if($is_text && $the_content !== false): ?>
<p>
<?php echo Form::textarea('content', Guardian::wayback('content', $the_content), $speak->manager->placeholder_content, array(
    'class' => array(
        'textarea-block',
        'textarea-expand',
        'code',
        'MTE'
    )
)); ?>
</p>
<?php endif; ?>
<p>
  <?php if($e === 'cache'): ?>
  <?php echo Form::hidden('name', File::url($the_name)); ?>
  <?php else: ?>
  <?php echo Form::text('name', Guardian::wayback('name', File::url($the_name)), $speak->manager->placeholder_file_name); ?>
  <?php endif; ?>
  <?php if(strpos($config->url_path, '/repair/file:') === false): ?>
  <?php echo Jot::button('construct', $speak->create); ?>
  <?php else: ?>
  <?php echo Jot::button('action', $is_text ? $speak->update : $speak->rename); ?>
  <?php endif; ?> <?php if(strpos($config->url_path, '/repair/file:') !== false): ?>
  <?php echo Jot::btn('destruct', $speak->delete, $path_destruct); ?>
  <?php else: ?>
  <?php echo Jot::btn('reject', $speak->cancel, $path_reject); ?>
  <?php endif; ?>
</p>