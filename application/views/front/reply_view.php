<div class="reply">
    <strong><?= $reply['first_name']; ?></strong>
    <p><?= htmlspecialchars($reply['comment_text']); ?></p>
    <a href="#" class="reply-btn" data-comment-id="<?= $reply['id']; ?>">Reply</a>

    <!-- Reply form for this reply -->
    <div class="reply-form-container" style="display: none;" id="reply-form-<?= $reply['id']; ?>">
        <form action="<?= base_url('home/addComment') ?>" method="POST">
            <textarea name="comment_text" placeholder="Reply to this comment..." required></textarea>
            <input type="hidden" name="post_id" value="<?= 13 ?>"> <!-- Post ID -->
            <input type="hidden" name="parent_comment_id" value="<?= $reply['id']; ?>"> <!-- Parent reply ID -->
            <button type="submit">Post Reply</button>
        </form>
    </div>

    <!-- Display nested replies recursively -->
    <?php if (!empty($reply['replies'])): ?>
        <div class="replies" style="margin-left: 20px;">
            <?php foreach ($reply['replies'] as $nested_reply): ?>
                <?php $this->load->view('front/reply_view', ['reply' => $nested_reply, 'postId' => 13]); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
