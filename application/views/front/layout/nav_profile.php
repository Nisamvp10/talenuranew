<div class="box ">
                <div class="box-wrapper">
                <div class="img-box">
                    <div class="profilePic">
                        <img src="<?=(!empty($this->profilepic) ? base_url($this->profilepic) : base_url('layout/front/images/user.svg'));?>" alt="">
                    </div>
                    <div class="userDetail">
                        <h4><?=$this->fname;?></h4>
                        <span><?=$this->email;?></span>
                        <label></label>
                    </div>
                </div>
                <div class="detail-box">
                  <ul>
                    <li>
                        <a href="<?=base_url('profile');?>" class="<?=($active=="profile"  ? 'active' : '');?>" ><i class="fa fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-gear"></i> Settings</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-bell"></i> Notification</a>
                    </li>
                    <li>
                        <a href="<?=base_url('signout');?>"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                  </ul>
                
                </div>
                </div>
            </div>