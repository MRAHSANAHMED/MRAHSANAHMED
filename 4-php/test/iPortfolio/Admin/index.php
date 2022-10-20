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
                  <h5 class="card-title">Customers <span>| comments</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php // echo get_table_count(''); ?></h6>

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
    
    const postCount = "<?php ?>";
    const commentsCount = "<?php  ?>";
    const usersCount = "<?php  ?>";
    const categoriesCount = "<?php  ?>";

    const config = {
        type: 'bar',
        data: {
            labels: [
                'Posts',
                'Comments',
                'Users',
                'Categories'
            ],
            datasets: [{
              label: 'Data',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: [postCount, commentsCount, usersCount, categoriesCount],
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
