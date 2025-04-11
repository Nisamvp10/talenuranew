<style>
.flex {
  display: block;
  justify-content: center;
  align-items: center;
}

.flex-column {
  display: block;
  flex-direction: column;
}



#ourUniversity .container .header {
  text-align: center;
  margin-top: 20px;
  margin-bottom: 20px;
}

#ourUniversity .container .header h1 {
  text-transform: uppercase;
  margin-bottom: 50px;
  position: relative;
}

#ourUniversity .container .header h1::after {
  content: "";
  position: absolute;
  width: 80px;
  height: 2px;
  background-color: dodgerblue;
  bottom: -30px;
  left: 47%;
}

#ourUniversity .container .header p {
  line-height: 2;
  color: #aaa;
}

#ourUniversity .container>span {
  text-align: center;
  background-color: dodgerblue;
  color: white;
  padding: 10px 30px;
  margin: auto;
  display: block;
  width: 200px;
  margin-bottom: 100px;
}

#ourUniversity .container .content {
  width: 100%;
  margin-bottom: 50px;
}

#ourUniversity .container .content .row {
  width: 100%;
  height: auto;
  background-color: white;
  border-bottom: 1px solid rgb(41, 128, 185);
  display: block;
  gap: 50px;
  transition-duration: 0.5s;
  transition-property: transform;
  position: relative;
  margin-bottom:25px;
}

#ourUniversity .container .content .row:hover {
  transform: scale(1.1);
  z-index: 1;
  box-shadow: 0 0 10px 0 rgba(41, 127, 185, 0.521);
  border: 0px;
}

#ourUniversity .container .content .row .data {
  display: block;
  width: 60%;
}

#ourUniversity .container .content .row .data .img {
  width: 100%;
  height: 100%;
  transition-duration: 0.7s;
  transition-timing-function: ease-in-out;
  transform-origin: left;
  border-radius: 5px;
  background-color: rgba(170, 170, 170, 0.411);
  text-align: center;
  padding: 4px;
}

#ourUniversity .container .content .row .data .img img {
  width: 100%;
  height: 100%;
  border-radius: 5px;
  object-fit: fill;
}

#ourUniversity .container .content .row .data .text {
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  width: 100%;
  height: 100%;
  gap: 12px;
  padding: 20px
}

#ourUniversity .container .content .row .data .text .statue {
  background-color: rgb(127, 177, 61);
  color: white;
  font-weight: bold;
  padding: 5px;
  border-radius: 5px;
  width: 100%;
  text-align: center;
}

#ourUniversity .container .content .row .data .text p {
  font-weight: 600;
    font-size: 18px;
    letter-spacing: 1.5px;
    line-height: inherit;
    text-transform: uppercase;
    font-family: 'Roboto Slab';
}



#ourUniversity .container .content .row .data:last-child {
  gap: 100px;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}


#ourUniversity .container .content .row .data:last-child .city p:first-child {
  font-size: 30px;
}






#ourUniversity .container .content .row:nth-child(3) .data .text .statue {
  background-color: rgb(41, 128, 185);
}

#ourUniversity .container .content .row:nth-child(4) .data .text .statue {
  background-color: rgb(133, 53, 166);
}
#ourUniversity .container .content .row:nth-child(6) .data .text .statue {
  background-color: rgb(41, 128, 185);
}

#ourUniversity .container .content .row:nth-child(1)::before {
  content: '';
  position: absolute;
  left: -50px;
  top: 0;
  height: 100%;
  width: 50px;
  background-color: white;
  border-right: 1px solid #eee;
  border-left: 4px solid rgb(41, 128, 185);
}

#ourUniversity .container .content .row:nth-child(1)::after {
  content: '';
  position: absolute;
  left: -75px;
  top: 40%;
  font-size: 25px;
  transform: rotate(-90deg);
}


.rwd-table {
  margin: 20px auto;
  min-width: 100%;
  max-width: 100%;
  border-collapse: collapse;
}

.rwd-table tr:first-child {
  border-top: none;
  background: #428bca;
  color: #fff;
}

.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  background-color: #f5f9fc;
}

.rwd-table tr:nth-child(odd):not(:first-child) {
  background-color: #ebf3f9;
}

.rwd-table th {
  display: none;
}

.rwd-table td {
  display: block;
}

.rwd-table td:first-child {
  margin-top: .5em;
}

.rwd-table td:last-child {
  margin-bottom: .5em;
}

.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 120px;
  display: inline-block;
  color: #000;
}

.rwd-table th,
.rwd-table td {
  text-align: left;
}

.rwd-table {
  color: #333;
  border-radius: .4em;
  overflow: hidden;
}

.rwd-table tr {
  border-color: #bfbfbf;
}

.rwd-table th,
.rwd-table td {
  padding: .5em 1em;
}
@media screen and (max-width: 601px) {
  .rwd-table tr:nth-child(2) {
    border-top: none;
  }
}
@media screen and (min-width: 600px) {
  .rwd-table tr:hover:not(:first-child) {
    background-color: #d8e7f3;
  }
  .rwd-table td:before {
    display: none;
  }
  .rwd-table th,
  .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child,
  .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child,
  .rwd-table td:last-child {
    padding-right: 0;
  }
  .rwd-table th,
  .rwd-table td {
    padding: 1em !important;
  }
}
 .tfooter  td{
    background: #00b0dd;
    font-size: 20px;
    text-transform: uppercase;
    margin: 0;
    padding: 0.3em 18px!important;

}


#portfolio {
  
  padding: 8px 0;
}
#page-title{
   display: block;
    padding: 0;
    margin-bottom: 50px;
}
#portfolio .card {
  margin: 0 -8px 32px -8px;
  color: rgba(0, 0, 0, 0.87);
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.05);
  background: #fafafa;
}
#portfolio .card .card-title {
  display: flex;
  justify-content: flex-end;
  padding: 16px;
  font-weight: 300;
}
#portfolio .card .card-data {
  display: flex;
  justify-content: flex-end;
  padding: 16px 16px 0 0;
  font-size: 1.5rem;
  font-weight: 300;
}
#portfolio .card hr {
  width: 90%;
}
#portfolio .card .card-hint {
  display: flex;
  padding: 0 0 8px 8px;
  font-size: 0.9rem;
  font-weight: 300;
}
#portfolio .card .card-hint i {
  font-size: 1.3rem;
  color: red;
  margin-right: 8px;
}
#portfolio .card .card-icon {
  display: flex;
  position: absolute;
  top: -20px;
  left: 12px;
  background: linear-gradient(60deg, #ffa726, #EF6C00);
  color: white;
  width: 90px;
  height: 90px;
  box-shadow: 2px 2px 16px rgba(0, 0, 0, 0.15);
  align-items: center;
  justify-content: center;
  border-radius: 25%;
}
#portfolio .card .card-icon i {
  font-size: 25px;
}
#portfolio #storageCard .card-icon {
  background: linear-gradient(60deg, #5E35B1, #039BE5);
}
#portfolio #storageCard .card-hint i {
  color: red;
}
#portfolio #loveCard .card-icon {
  background: linear-gradient(60deg, #F50057, #FF8A80);
}
#portfolio #loveCard .card-hint i {
  color: blue;
}
#portfolio #pizzaCard .card-icon {
  background: linear-gradient(60deg, #fb8c00, #FFCA29);
}
#portfolio #pizzaCard .card-hint i {
  color: red;
}
#portfolio #gameCard .card-icon {
  background: linear-gradient(60deg, #43A047, #FFEB3B);
}
#portfolio #gameCard .card-hint i {
  color: green;
}
.studydescription{
    width:100%;
    margin:0;
    padding:0;
}
.studydescription img{
    width: 100%;
}
.gradientbg{
    
    background: #193775;
    background: -webkit-linear-gradient(left, #193775, #00abc9);
    background: -moz-linear-gradient(left, #193775, #00abc9);
    background: -o-linear-gradient(left, #193775, #00abc9);
    background: -ms-linear-gradient(left, #193775, #00abc9);
    background: linear-gradient(left, #193775, #00abc9);
    color: #fff;
    padding: 10px;

}
</style>



        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="title-box">
                    <h1> Studies in <?=$country->category;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        
                    </ol>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        
        <!-- start case-study-single-content -->
        <section class="case-study-single-content section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-8">
                        <div class="case-details">
                            <div class="img-holder">
                            <img src="<?=img_vlid('country',$country->path)?>" alt class="img img-responsive">
                            </div>
                            <div class="case-title ">
                                <h3 class="gradientbg"><?=$country->title;?></h3>
                               <!--  <span>Digital Consult, strategy &amp; growth</span> -->
                            </div>
                            <p><?=$country->main_content;?></p>
                            <div class="row studydescription ">
                                <p><?=$country->description;?></p>
                            </div>

                            <div class="case-single-tab">
                                <ul class="nav">
                                    <li class="active">
                                        <a href="#problem" data-toggle="tab">Why Study in <?=$country->category;?></a>
                                    </li>
                                    
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="problem">
                                        <p><?=$country->why_study;?></p>

                                    
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col col-lg-3 col-lg-offset-1 col-md-4">
                        <div class="sidebar">
                            <div class="widget">
                                 <div class="header">
                                 <h3>Study in <?=$country->category;?></h3>
                             </div>
                                <div class="link-widget">
                                    <ul>
                                        <?php $list = study_abroad_list($country->slug);
                                               if(!empty($list)){
                                            foreach ($list as $key) { ?>
                                        <li><a href="<?=base_url('country/'.$key->slug)?>"><?=$key->category;?></a></li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </div>
                            </div>

                            <div id="ourUniversity">
                                <div class="container" style="width: 100%;">
                                <!-- header -->
                                <div class="header">
                                    <h1>Popular Universities</h1>
                                </div>
                                <!-- header -->
                                    <div class="content .flex-column">
                                        <!-- row -->
                                    <?php if(!empty($university)){
                                        foreach ($university as $key ) { ?>
                                        <div class="row">
                                       
                                                    
                                            <div class="data">
                                                <!--  -->
                                                <div class="img flex">
                                                    <img src="<?=img_vlid('university',$key->path)?>" alt="">
                                                </div>
                                                <!--  -->
                                                <div class="text">
                                                    <p><?=$key->university;?></p>
                                                    <!--  -->
                                                    
                                                    <!--  -->
                                                </div>
                                                <!--  -->
                                            </div>
                                             </div>
                                            <?php 
                                                }
                                            }
                                            ?>
                                            <!--  -->
                                            
                                            <!--  -->
                                       
                                        
                                    </div>
                                </div>
                            </div>

                            

                            <div class="widget news-letter-widget">
                                <h4>Susbscribe our monthly newsletter</h4>
                                <form class="form">
                                    <div>
                                        <input type="text" class="form-control" placeholder="your email...">
                                    </div>
                                    <div>
                                        <button class="btn" type="submit">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- end container -->
        </section>
        <!-- end case-study-single-content -->
        <section id="typeexp">
            <div class="container">
            <div class="wrapper ">
                <h3>Cost of Education in <?=$country->category;?></h3>
            <table class="rwd-table">
    <tbody>
      <tr>
        <th>Types of Expenses   </th>
        <th>Annual Expenses in </th>
      </tr>
      <?php 
      if(!empty($cost)){
        $amount = 0;
        foreach ($cost as $key) { ?>
            
      <tr>
        <td data-th="Supplier Code">
          <?=$key->type_exppense;?>
        </td>
        <td data-th="Supplier Name">
          <?=$key->cost;?>
        </td>
        
      </tr>

      <?php  $amount +=$key->cost;}  ?>
         </tbody>
        <tfooter >
        <tr class="tfooter">
        <td data-th="Supplier Code">
          Total
        </td>
        <td data-th="Supplier Name">
          <?=$amount;?>
        </td>
        
        </tfooter>
        <?php } ?>
      
             </table>

            </div>
        </div>
        </section>
        <?php 
        if(!empty($course)){?>
        <section style="padding: 50px 0">
        <div class="container">
        <h1 class="text-center" id="page-title">Popular Courses</h1>
        <div class="row" id="portfolio">
        <?php 
            foreach ($course as $key) { ?>
               
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card" id="storageCard">
              <div class="card-title"><?=$key->course;?></div>
              <div class="card-icon"><i class="fa fa-flag"></i></div>
              <div class="card-data"></div>
              <hr/>
              <div class="card-hint"> <i class="fa fa-home"></i><a href="#"><?=$country->category;?></a></div>
            </div>
          </div>
        <?php } ?>

       
        
          
        </div>
      </div>
    </section>
<?php } ?>
       
