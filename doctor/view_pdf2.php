<?php include("header.php"); ?>
            <!-- Page Container START -->
            <div class="page-container">
                <!-- Content Wrapper START -->
                <div class="main-content">
                        <div class="table-responsive">
                            <?php
                            $id=$_GET['id'];
                            $lab=$_GET['lab'];
                            ?>
                                        <iframe src="<?php echo $id ?>" width="90%" height="600px">
</iframe>
                                   
                               
                        </div>
                         <h4><?php echo "Generated By: ".$lab;?></h4>
                    </div>
                </div>

            </div>
                <!-- Content Wrapper END -->
<?php include("footer.php"); ?>
