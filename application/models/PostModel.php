<?php
defined('BASEPATH') OR exit('No direct script allowed');

class PostModel extends CI_Model{
    public function getPosts($limit, $offset,$condition=false)
    {
        $this->db->select('p.*, u.first_name,u.profile as profilepic, GROUP_CONCAT(CONCAT(m.file_path, "::", m.media_type)) as media_files,
        (SELECT COUNT(l.id) FROM likes as l WHERE l.post_id = p.id) as like_count, 
        (SELECT COUNT(c.id) FROM comments as c WHERE c.post_id = p.id) as comments_count');
        $this->db->from('posts as p');
        $this->db->join('users as u','p.user_id = u.id','LEFT');
        $this->db->join('media as m','p.id = m.post_id','LEFT');
        $this->db->where('p.status',1);
        if(!empty($condition))
        {
            $this->db->where('u.id',$this->userId);
        }
        $this->db->group_by('p.id'); // Group by post ID to combine media files
        $this->db->limit($limit, $offset);
        $this->db->order_by('p.id desc');
        $query = $this->db->get(); // 'posts' is the table name

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return [];
    }
      // Check if the user has liked a post
      public function isCount($table=false, $condition=false) 
    {
        $this->db->from($table);
        $this->db->where($condition);
        return $this->db->count_all_results();
    }
    public function isLiked($postId, $userId) 
    {
        $this->db->where('post_id', $postId);
        $this->db->where('user_id', $userId);
        return $this->db->get('likes')->num_rows() > 0;
    }

    public function addLike($postId, $userId) {
        $this->db->insert('likes', [
            'post_id' => $postId,
            'user_id' => $userId
        ]);
        return $this->db->insert_id();
    }
    public function removeLike($postId, $userId) {
        $this->db->where('post_id', $postId);
        $this->db->where('user_id', $userId);
        $this->db->delete('likes');
    }
    public function totalLike($postId) {
        $this->db->where('post_id', $postId);
        $this->db->from('likes');
        return $this->db->count_all_results();
    }

    // Add Comment
    public function addComment($postId, $userId, $comment) {
        $this->db->insert('comments', [
            'post_id' => $postId,
            'user_id' => $userId,
            'comment' => $comment
        ]);
        return $this->db->insert_id();
    }

    public function getComments($postId) {
        // Get all top-level comments for the post
        $this->db->select('comments.*,comments.created_at as storetime, users.first_name,users.profile');
        $this->db->from('comments');
        $this->db->join('users', 'users.id = comments.user_id', 'LEFT');
        $this->db->where('comments.post_id', $postId);
        $this->db->where('comments.parent_comment_id IS NULL'); // Only fetch top-level comments
        $this->db->order_by('comments.created_at', 'DESC');
        $query = $this->db->get();
    
        $comments = $query->result_array();
    
        //For each comment, fetch replies
        foreach ($comments as &$comment) {
            $comment['replies'] = $this->getReplies($comment['id']);
        }
    
        return $comments;
    }

    // Fetch replies to a comment
    public function getReplies($commentId) {
        $this->db->select('comments.*, users.first_name,users.profile');
        $this->db->from('comments');
        $this->db->join('users', 'users.id = comments.user_id', 'LEFT');
        $this->db->where('comments.parent_comment_id', $commentId);
        $this->db->order_by('comments.created_at', 'ASC');
        $query = $this->db->get();
        $replies = $query->result_array();

        // Recursively fetch nested replies
        foreach ($replies as &$reply) {
            $reply['replies'] = $this->getReplies($reply['id']);
        }

        return $replies;
    }

}