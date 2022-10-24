<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>
  <!-- ======= Header ======= -->



  <!-- ======= Sidebar ======= -->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- services Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

               

                <div class="card-body">
                  <h5 class="card-title">Services <span>|Total services</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo get_table_count('services'); ?></h6>

                    </div>


                  </div>

                </div>
              </div>
            </div> 
             <!-- End services Card -->

            <!-- profiles Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

             

                <div class="card-body">
                  <h5 class="card-title">PROFILES <span>| TOTAL PROFILES</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo get_table_count('profiles'); ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End profiles Card  -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card">

              <div class="card-body">
                  <h5 class="card-title">Services <span>| skills and skill2</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo get_table_count('skills'); ?> and <?php echo get_table_count('skills2'); ?></h6>

                    </div>
                  </div>
                </div>

                

              </div>

            </div> <!-- End Customers Card -->

           <!-- Customers Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                
<div class="card-body">
                  <h5 class="card-title">Comments<span>| to Profiles</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                    <?php 
                        $comment_query = "SELECT count(comment_id) AS NumberOfComments from comments 
                        left join profiles on comments.profile_id = profiles.profile_id 
                        where profiles.profile_id = '".$_SESSION['profile_id']."'";
                        $result = run_query($comment_query);
                        $rows = mysqli_fetch_array($result);
                      ?>
                      <h6><span style="font-size:36px; color:#ff771d;">
                      <?php echo $rows['NumberOfComments'] ;?> </span>
                      COMMENT ON : <span style="font-size:36px; color:#ff771d;">
                      <?php  echo ucwords($_SESSION['profile_name']) ;?> 
                      </span>ID</h6>
                    </div>
                  </div>

                </div>
                

              </div>
            
            </div> 

                <div>
                  <canvas id="myChart"></canvas>
                </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    // https://www.chartjs.org/docs/latest/getting-started/
    
    const servicesCount = "<?php echo get_table_count('services');?>";
    const profilesCount = "<?php  echo get_table_count('profiles'); ?>";
    const skillsCount = "<?php echo get_table_count('skills'); ?>";
    const skills2Count = "<?php echo get_table_count('skills2'); ?>"; 
    const categoriesCount = "<?php echo $rows['NumberOfComments'] ;?>";

    const config = {
        type: 'bar',
        data: {
            labels: [
                'SERVICES',
                'PROFILES',
                'Skills',
                'Skills',
                '<?php echo $rows['NumberOfComments'] ;?> COMMENTS ON ID : <?php  echo ucwords($_SESSION['profile_name']) ;?>'
            ],
            datasets: [{
              label: 'Data',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: [servicesCount, profilesCount, skillsCount, skills2Count, categoriesCount],
            }]
        },
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
  <!-- ======= Footer ======= -->
<?php include "includes/footer.php";?>
