<div class="comments-section">
    <h3>Comments</h3>

    <!-- Loop through top-level comments -->
    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <strong><?= $comment['first_name']; ?></strong>
            <p><?= htmlspecialchars($comment['comment_text']); ?></p>
            <a href="#" class="reply-btn" data-comment-id="<?= $comment['id']; ?>">Reply</a>

            <!-- Reply form for this comment -->
            <div class="reply-form-container" style="display: none;" id="reply-form-<?= $comment['id']; ?>">
                <form action="<?= base_url('home/addComment') ?>" method="POST">
                    <textarea name="comment_text" placeholder="Reply to this comment..." required></textarea>
                    <input type="hidden" name="post_id" value="<?= 13 ?>"> <!-- Post ID -->
                    <input type="hidden" name="parent_comment_id" value="<?= $comment['id']; ?>"> <!-- Parent comment ID -->
                    <button type="submit">Post Reply</button>
                </form>
            </div>

            <!-- Display replies recursively -->
            <?php if (!empty($comment['replies'])): ?>
                <div class="replies" style="margin-left: 20px;">
                    <?php foreach ($comment['replies'] as $reply): ?>
                        <?php $this->load->view('front/reply_view', ['reply' => $reply, 'postId' =>13]); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <!-- Add new comment form -->
    <form action="<?= base_url('home/addComment') ?>" method="POST">
        <textarea name="comment_text" placeholder="Write a comment..." required></textarea>
        <input type="hidden" name="post_id" value="<?= 13; ?>"> <!-- Post ID -->
        <input type="hidden" name="parent_comment_id" value=""> <!-- No parent for top-level comments -->
        <button type="submit">Post Comment</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        // Handle reply button click
        $('.reply-btn').on('click', function(e) {
            e.preventDefault();
            var commentId = $(this).data('comment-id');
            $('#reply-form-' + commentId).toggle(); // Toggle the reply form for this comment
        });
    });
</script>
