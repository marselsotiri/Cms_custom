<?php include "includes/admin_header.php";?>
    <div id="wrapper">
        
<?php 
        
  
$post_count=count_records(get_all_user_posts());   
$comment_count=count_records(get_all_post_user_comments());
$category_count=count_records(get_all_user_categories());
$post_published_count=count_records(get_all_user_published_posts());    
$post_draft_count=count_records(get_all_user_draft_posts());
$approved_comments_count=count_records(get_all_user_approved_posts_comments());
$unapproved_comments_count=count_records(get_all_user_unapproved_posts_comments());

?>

        <!-- Navigation -->

      <?php include "includes/admin_navigation.php";?> 
        
          

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <small>Role: Admin:</small>
                            Welcome to admin <?php echo strtoupper(get_user_name()); ?>
                            
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                  
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                   

         <?php echo "<div class='huge'>".$post_count."</div>" ?>
                          
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                           <?php 
                        
                            echo "<div class='huge'> {$comment_count}</div>"
                                ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                    echo "<div class='huge'> {$category_count}</div>"
                                ?>
                       
            <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                
<?php  
                
//  $post_published_count=checkStatus('posts','post_status','published');
//                
//
//       
// $post_draft_count=checkStatus('posts','post_status','draft');

                     
// $unapproved_comments_count=checkStatus('comments','comment_status','unapproved');
//
//
                     
 $subscriber_count=checkUserRole('users', 'user_role', 'subscriber');
               


    

    
?>                                                         
                
    <div class="row"> 
               
         <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Count'],
            
          <?php  
            
$elemnts_text=['All Posts','Active Posts','Draft Posts', 'Comment','Approved Comments', 'Pending Comments', 'Categories'];        
$elemnt_count=[$post_count, $post_published_count, $post_draft_count, $comment_count, $approved_comments_count, $unapproved_comments_count, $category_count];             
            
 for($i=0; $i<7; $i++) {
     
  echo "['{$elemnts_text[$i]}'" . "," . "{$elemnt_count[$i]}],";  
     

 }          
            
          ?>
            
//          ['Posts', 1000,],
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>       
               
<div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            
 
               </div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php";?>