<section class="comments">

  <h4 class="comment-header">
    <i class="fa fa-comments"></i> <?php echo $page->page_total_comments_text; ?>
  </h4>

  <ol class="comment-list">
    <?php if($page->page_total_comments > 0): ?>
    <?php foreach($page->comments as $comment): ?>
    <li class="comment comment-<?php echo $comment->status; ?>" id="comment-<?php echo $comment->id; ?>">
      <div class="comment-avatar">
        <img alt="<?php echo $comment->name; ?>" src="<?php echo $config->protocol . 'www.gravatar.com/avatar/' . md5($comment->email) . '?s=60&amp;d=monsterid'; ?>" width="60" height="60">
      </div>
      <div class="comment-header">
        <?php if( ! empty($comment->url) && $comment->url != '#'): ?>
        <a class="comment-name" href="<?php echo $comment->url; ?>" rel="nofollow" target="_blank"><?php echo $comment->name; ?></a>
        <?php else: ?>
        <span class="comment-name"><?php echo $comment->name; ?></span>
        <?php endif; ?>
        <span class="comment-time">
          <time datetime="<?php echo $comment->time; ?>"><?php echo Date::format($comment->time, 'Y/m/d H:i:s'); ?></time> <a href="<?php echo $article->url . '#comment-' . $comment->id; ?>" title="<?php echo $speak->permalink; ?>" rel="nofollow">#</a>
        </span>
      </div>
      <div class="comment-body"><?php echo $comment->message; ?></div>
      <div class="comment-footer">
        <?php if($manager): ?>
        <a href="<?php echo $config->url . '/' . $config->manager->slug . '/comment/repair/' . $comment->id; ?>"><?php echo $speak->edit; ?></a> / <a href="<?php echo $config->url . '/' . $config->manager->slug . '/comment/kill/' . $comment->id; ?>"><?php echo $speak->delete; ?></a>
        <?php endif; ?>
      </div>
    </li>
    <?php endforeach; ?>
    <?php endif; ?>
  </ol>

  <form class="comment-form" action="<?php echo $config->url_current; ?>" id="comment-form" method="post">
    <?php echo Notify::read(); ?>
    <input name="token" type="hidden" value="<?php echo Guardian::makeToken(); ?>">
    <input name="parent" type="hidden" value="">
    <label class="grid-group">
      <span class="grid span-1 form-label"><?php echo $speak->comment_name; ?></span>
      <span class="grid span-5"><input name="name" type="text" class="input-block" value="<?php echo Guardian::wayback('name'); ?>"></span>
    </label>
    <label class="grid-group">
      <span class="grid span-1 form-label"><?php echo $speak->comment_email; ?></span>
      <span class="grid span-5"><input name="email" type="email" class="input-block" value="<?php echo Guardian::wayback('email'); ?>"></span>
    </label>
    <label class="grid-group">
      <span class="grid span-1 form-label"><?php echo $speak->comment_url; ?></span>
      <span class="grid span-5"><input name="url" type="url" class="input-block" value="<?php echo Guardian::wayback('url'); ?>"></span>
    </label>
    <label class="grid-group">
      <span class="grid span-1 form-label"><?php echo $speak->comment_message; ?></span>
      <span class="grid span-5"><textarea name="message" class="input-block"><?php echo Guardian::wayback('message'); ?></textarea></span>
    </label>
    <label class="grid-group">
      <span class="grid span-1 form-label"><?php echo Guardian::math(); ?> =</span>
      <span class="grid span-5"><input name="math" type="text" value="" autocomplete="off"></span>
    </label>
    <div class="grid-group">
      <span class="grid span-1 form-label">&nbsp;</span>
      <div class="grid span-5">
        <p><button class="btn btn-success btn-publish" type="submit"><i class="fa fa-check-circle"></i> <?php echo $speak->publish; ?></button></p>
        <p><?php echo $speak->comment_guide; ?></p>
      </div>
    </div>
  </form>

</section>