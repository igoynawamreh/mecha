<?php echo Notify::read(); ?>

<?php if($pages): ?>
<ol class="comment-list">
  <?php foreach($pages as $comment): ?>
  <li class="comment" id="comment-<?php echo $comment->id; ?>">
    <div class="comment-header">
      <?php if($comment->url != '-'): ?>
      <a class="comment-name" href="<?php echo $comment->url; ?>" rel="nofollow" target="_blank"><?php echo $comment->name; ?></a>
      <?php else: ?>
      <span class="comment-name"><?php echo $comment->name; ?></span>
      <?php endif; ?>
      <span class="comment-time">
        <time datetime="<?php echo $comment->time; ?>"><?php echo Date::format($comment->time, 'Y/m/d H:i:s'); ?></time>
        <a href="<?php echo $comment->permalink; ?>" title="<?php echo $speak->permalink; ?>" rel="nofollow">#</a>
      </span>
    </div>
    <div class="comment-body"><?php echo $comment->message; ?></div>
    <div class="comment-footer">
      <a href="<?php echo $config->url . '/' . $config->manager->slug . '/comment/repair/' . $comment->id; ?>"><?php echo $speak->edit; ?></a> / <a href="<?php echo $config->url . '/' . $config->manager->slug . '/comment/kill/' . $comment->id; ?>"><?php echo $speak->delete; ?></a>
    </div>
  </li>
  <?php endforeach; ?>
</ol>

<nav class="blog-pager">
  <span class="pull-left"><?php echo $pager->prev->link; ?></span>
  <span class="pull-right"><?php echo $pager->next->link; ?></span>
</nav>

<?php else: ?>

<p><?php echo Config::speak('notify_empty', array(strtolower($speak->comments))); ?></p>

<?php endif; ?>