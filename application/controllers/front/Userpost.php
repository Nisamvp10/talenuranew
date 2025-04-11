<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Userpost extends Frond_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('PostModel');
        $this->load->model('Image_uploading_model');
        $this->load->helper('date');
    }
    function thought_submit(){
        $valid['success'] = array('status'=> 400 ,'msg'=>array());
		$this->form_validation->set_rules('thought','Thought','required|min_length[6]');
        if($this->form_validation->run() == TRUE) 
        {
            $file_data = $this->Image_uploading_model->image_uploader('','media');
            $data = [
                'user_id' => $this->userId,
                'content' => $this->input->post('thought'),
                'status'  => 1
            ];
           
            $insert       = $this->common->insertdataTodatabase('posts',$data);
            if($insert)
            {   
                if($insert && !empty($_FILES['media_files']['name'][0]))
                { 
                    $this->sub_img($insert);
                }
                $valid['status'] = 200;
                $valid['msg']    = "Good Job ! Package Successfully Added";
            }


        }else{
            echo json_encode([
                'success' => false,
                'message' => $this->form_validation->error_array()
            ]);
        }

        echo json_encode(($valid));

    }

    function sub_img($id)
    { $this->load->library('upload');
        define('PATH_IMG', './uploads/media/');
        create_folder('uploads/media/','index','index');
        $files = $_FILES;
         $data_count = count($_FILES['media_files']['name']);
        //if($data_count !=0){
        $image = array();
        for($i = 0; $i < $data_count; $i++)
        {
            $_FILES['media_file']['name'] = $files['media_files']['name'][$i];
            $_FILES['media_file']['type'] = $files['media_files']['type'][$i];
            $_FILES['media_file']['tmp_name'] = $files['media_files']['tmp_name'][$i];
            $_FILES['media_file']['error'] = $files['media_files']['error'][$i];
            $_FILES['media_file']['size'] = $files['media_files']['size'][$i];
            $this->upload->initialize($this->set_upload_options());

            if ($this->upload->do_upload('media_file')) {
                $upload_data = $this->upload->data();
                $file_path = 'uploads/media/' . $upload_data['file_name'];

                // Check if the file is an image or a video
                $media_type = strpos($upload_data['file_type'], 'image') !== false ? 'image' : 'video';

                // Save media details into the `media` table
                $uploadImgData[$i]['file_path']    = $file_path;
                $uploadImgData[$i]['post_id']      = $id;
                $uploadImgData[$i]['created_at']   = date('Y-m-d,H:i:s');
                $uploadImgData[$i]['media_type']   =  $media_type;
                $uploadImgData[$i]['status']       = 1;
            }
        }
        if(!empty($uploadImgData))
        {
            $this->common->multiple_insert('media',$uploadImgData);
        }
        return true;
    }
    // Function to configure file upload settings
    private function set_upload_options() {
        $config = array();
        $config['upload_path'] = './uploads/media';
        $config['allowed_types'] = 'gif|jpg|png|mp4|avi|mov';
        $config['max_size'] = '20480'; // 20 MB
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = TRUE;
        return $config;
    }

    function loadmoredata(){
        $page = $this->input->get('page'); // Get the page number
        $userpage = $this->input->get('user');
        if(!empty($userpage))
        {
            $con = 1;
        }else{
            $con = '';
        }
        
        $limit = 10; // Set the limit of records per page
        $offset = ($page - 1) * $limit; // Calculate the offset

        $data = $this->PostModel->getPosts($limit, $offset,$con);
       //echo $this->db->last_query();
      
        $datas='';
        foreach ($data as $item) {
           // print_r(value: $item['media_files']);
            $datas .= '<div class="box mt-3 mb-3">
                <div class="box-wrapper">
                        <div class="userPost">
                            <div class="img-box">
                                <div class="profilePic">
                                    <img src="'.img_valid($item['profilepic']).'" alt="">
                                </div>
                                <div class="userDetail">
                                    <h4>'.htmlspecialchars($item['first_name']).'</h4>
                                    <span>'.timeAgo($item['created_at']).'</span>
                                    <label class="online" ></label>
                                </div>
                            </div>
                        <div class="userText">
                            <p>
                            '.htmlspecialchars($item['content']).'
                            </p>
                        </div>
                        <div class="userimgPost">';
                        if(!empty($item['media_files']))
                        {   
                            $mediaFiles = explode(',', $item['media_files']);
                            $mediaCount = count($mediaFiles); 
                            $i=0;
                            $slider = 0;
                            
                                //echo "File Path: " . $filePath . "<br>";
                                //echo "Media Type: " . $mediaType . "<br>";

                                if ($mediaCount == 1) {
                                     $datas .= '<div class="userimgPost">';
                                    if(!empty($item['media_files']))
                                    {   
                                        foreach ($mediaFiles as $file)
                                        {
                                            list($filePath, $mediaType) = explode('::', $file); // Split by "::"
                                            if($mediaType == "image")
                                            {
                                                $datas .= '<img src="'.base_url($filePath).'" width="100%" alt="">';
                                               
                                            }elseif($mediaType == "video")
                                            {
                                                $datas .='<video controls class="w-100">
                                                        <source src="' . base_url($filePath) . '" type="video/mp4">
                                                    </video>';
                                            }
                                    
                                         
                                        }
                                    }
                                    $datas .='</div>';
                                }else
                                {
                           
                                if ($mediaCount > 1) {
                                    // Start the carousel wrapper
                                    $datas .= '
                                    <div id="carouselExampleIndicators'.$item['id'].'" class="carousel slide" data-ride="carousel">
                                        <!-- Carousel Indicators -->
                                        <ol class="carousel-indicators">';
                                    
                                    // Loop through media files to create indicators
                                    foreach ($mediaFiles as $index => $file) {
                                        $datas .= '<li data-target="#carouselExampleIndicators'.$item['id'].'" data-slide-to="'.$index.'" class="'.($index == 0 ? 'active' : '').'"></li>';
                                    }
                                    
                                    $datas .= '</ol>
                                    
                                    <!-- Carousel Inner -->
                                    <div class="carousel-inner">';
                               
                            }
                                
                                    foreach ($mediaFiles as $file)
                                    {  $slider++;
                                     list($filePath, $mediaType) = explode('::', $file); // Split by "::"
                                   
                                   
                                        $datas .='<div class="carousel-item  '.($i==1 ? "active": "").'">';
                                            if($mediaType == "image")
                                            {
                                                $datas .='<img src="'.base_url($filePath).'" class="d-block w-100" alt="First Slide">';
                                               
                                            }elseif($mediaType == "video")
                                            {
                                                $datas .='<video controls class="w-100">
                                                        <source src="' . base_url($filePath) . '" type="video/mp4">
                                                    </video>';
                                            }
                                        $datas .= '</div>';
                                        $i++; 
                                    }
                                        
                                        if ($mediaCount > 1) {
                                            // End the carousel inner div and add controls
                                            $datas .= '
                                            </div> <!-- End of .carousel-inner -->
                                        
                                            <!-- Carousel Controls -->
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators'.$item['id'].'" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators'.$item['id'].'" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                            </div> <!-- End of .carousel slide -->';
                                        }
                                
                        
                                //$datas .= '<img src="'.base_url($filePath).'" width="100%" alt="">';
                            }
                        }
                        $datas .='</div>
                        <div class="userActionPanel">
                            <div class="like" id="'.encryptor($item['id']).'" > ';
                              $this->PostModel->isLiked($item['id'], $this->userId) ?   $datas .='<i class="xlike fa fa-heart " onclick="likeUn(this)" data-post="'.encryptor($item['id']).'"></i> ' :  $datas .='<i class="xlike fa fa-heart-o" onclick="likeUn(this)" data-post="'.encryptor($item['id']).'"></i> '; 
                              $datas .='<span class="t_like">'.(!empty($item['like_count']) ?  $item['like_count'] : '').' </span>
                            </div>
                            <div class="like" id="'.encryptor($item['id']).'">
                                <i class="fa fa-commenting-o " ></i> <span class="t_comment" >'.(!empty($item['comments_count']) ?  $item['comments_count'] : '').' </span>
                            </div>
                        </div>

                        <div class="comment" id="commentSection'.encryptor($item['id']).'">';
                        $cmt = $this->PostModel->getComments($item['id']);
                        // echo $this->db->last_query();
                        $htmlreplay = $this->renderComments($cmt, $item['id']);
                        $datas .= $htmlreplay;
                        
                         $datas .='</div>

                        <div class="commentWrite">
                            <div class="img-box">
                                <div class="profilePic">
                                    <img src="'.img_valid($this->profilepic).'" alt="">
                                </div>
                             
                                <div class="comments w-100">
                                    <form id="" class="p-0 commentForm" method="post" >
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            
                                        <input type="hidden" name="post_id" value="'.encryptor($item['id']).'" /> 
                                        <textarea name="comment_text"  placeholder="Add  your interactions"  class="form-control" required="required" rows="1"></textarea>
                                            <div class="help-block with-errors"></div>
                                            <div class="form-group upImg" style=" position: absolute; top: 9px; left: 25px; /* background: red; */ font-size: 23px; ">
                                                <label for="fileUpload" class="d-flex align-items-center">
                                                    <i class="fa fa-paperclip"></i> <!-- FontAwesome paperclip icon -->
                                                   
                                                </label>
                                                <input type="file" class="form-control-file d-none" id="fileUpload" name="attachment">
                                            </div>
                                            <button class="btn" type="submit">Post</button>
                                        </div> <!-- singel form -->
                                    </div>
                                    </form>
                               </div>
                            </div>
                           
                        </div>

                    </div>
                </div>
            </div>
             </div>';
        }


        if (!empty($datas)) {
            echo json_encode($datas); // Return JSON data
        } else {
            echo json_encode([]);
        }
    }
    public function renderComments($comments,$postId) {
          //print_r($comments);
          $output = '';

          foreach ($comments as $comment) {
            //var_dump($comment);
             $output .= '<div class="reply" data-comment-id="' . htmlspecialchars($comment['id']) . '">
                        <div class="img-box">
                            <div class="profilePic">
                                <img src="' . img_valid($comment['profile']) . '" alt="">
                            </div>
                            <div class="userDetail">
                                <h4>' . htmlspecialchars($comment['first_name']) . '</h4>
                                <span>' . timeAgo($comment['created_at']) . '</span>
                            </div>
                        </div>
                         <div class="comments">
                            <p class="m-0">' . htmlspecialchars($comment['comment_text']) . '</p>
                        </div>
                        <a href="javascript:void(0)" class="reply-btn" onclick="commentReplay(this)" data-comment-id="' . $comment['id'] . '">Reply</a>
              
                            <!-- Reply form for this comment -->
                            <div class="reply-form-container" style="display: none;" id="reply-form-' . $comment['id'] . '">
                                <form action="' . base_url('home/addComment') . '" method="POST" class="commentForm"> 
                                    <textarea name="comment_text" placeholder="Reply to this comment..." required></textarea>
                                    <input type="hidden" name="post_id" value="' . encryptor($postId ). '"> <!-- Post ID -->
                                    <input type="hidden" name="parent_comment_id" value="' . $comment['id'] . '"> <!-- Parent comment ID -->
                                    <button type="submit"><span><i class="fa fa-paper-plane-o"></i></span></button>
                                </form>
                            </div>';
                            if (!empty($comment['replies'])) {
                                $output .= '<div class="replies" style="margin-left: 20px;">';
                                // Recursive call to render replies
                                $output .= $this->renderComments($comment['replies'], $postId);
                                $output .= '</div>'; // Close replies container
                            }
                
                            $output .= '</div>'; // Close comment
          }

            return $output;
        }
        
    
    public function likePost() {
        $valid['success'] = array('status'=>400,'response'=>false);
        $userId = $this->userId; // Get the logged-in user ID
        $postId =  decryptor($this->input->post('post'));
        
        // Check if the user has already liked this post
        if (!$this->PostModel->isLiked($postId, $userId)) {
            // Add a like
            $this->PostModel->addLike($postId, $userId);
            $likes = $this->PostModel->totalLike($postId);
            $valid['status'] = 200;
            $valid['likes'] =  $likes;
            $valid['response'] = TRUE;
            $valid['cls'] = "fa-heart";
        } else {
            // If the user already liked the post, remove the like
            $this->PostModel->removeLike($postId, $userId);
            $likes = $this->PostModel->totalLike($postId);
            $valid['status'] = 200;
            $valid['likes'] =  $likes;
            $valid['response'] = TRUE;
            $valid['cls'] = "fa-heart-o";
        }

        // Redirect back to the post page or feed
       echo  json_encode($valid);
    }
    public function addComment() {
        date_default_timezone_set('Asia/Kolkata'); // Set your desired timezone

        $valid['success'] = array('status'=>400,'response'=>false);
        $this->form_validation->set_rules('comment_text','Comment','required');
        if($this->form_validation->run() == TRUE)
        {
            $postId = decryptor($this->input->post('post_id'));
            $userId = $this->userId; // Assuming user is logged in
            $commentText = $this->input->post('comment_text');
            $parentCommentId = $this->input->post('parent_comment_id'); // Optional, can be null for top-level comments
        
            $data = [
                'post_id' => $postId,
                'user_id' => $userId,
                'parent_comment_id' => $parentCommentId, // This is null for top-level comments
                'comment_text' => $commentText,
                'created_at' => date('Y-m-d H:i:s')
            ];
            if($this->common->insertdataTodatabase('comments',$data))
            {
                $datas = '<div class="comment" id="commentSection'.encryptor($postId).'">';
                $cmt = $this->PostModel->getComments($postId);
                // echo $this->db->last_query();
                $htmlreplay = $this->renderComments($cmt, $postId);
                $datas .= $htmlreplay;
                $datas .='</div>';
                $totalComentspost = $this->PostModel->isCount('comments',['post_id'=>$postId]);
                //echo $this->db->last_query();
                $valid['status'] = 200;
                $valid['coments'] = $datas;
                $valid['tcomment'] = $totalComentspost;
                $valid['post'] = encryptor($postId);
            }
           
        }else{
            $valid['msg'] = "comment Cannot be null";
        }
        echo json_encode($valid);
        
    }
}