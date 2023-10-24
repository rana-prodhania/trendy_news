<?php
$realPath = dirname(__FILE__);
include_once './inc/head.php';
include_once $realPath . './classes/Post.php';
$post = new Post();
$limit = 4;
$posts = $post->getAllPost($limit);



?>

<body>

  <div class="wrap">

    <!-- START navbar -->
    <?php include_once('inc/header.php'); ?>
    <!-- END navbar -->

    <!-- START main content -->
    <section class="site-section py-sm">
      <div class="container mt-5">
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <!-- Post start -->
            <div class="row">
              <?php
              if (!empty($posts['data'])):
                foreach ($posts['data'] as $row):
                  ?>
                  <div class="col-md-6 h-100">
                    <a href="post-details.php?slug=<?php echo $row['slug']; ?>" class="blog-entry element-animate"
                      data-animate-effect="fadeIn">
                      <img src="./admin/uploads/post-img/<?php echo $row['image']; ?>" alt="Image placeholder">
                      <div class="blog-content-body">
                        <div class="post-meta">
                          <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib">
                            <?php echo $row['author']; ?>
                          </span>&bullet;
                          <span class="mr-2">
                            <?php echo date('F j, Y', strtotime($row['created_at'])); ?>
                          </span> &bullet;
                          <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                        </div>
                        <h2>
                          <?php echo Helper::textShorten($row['title'], 65); ?>
                        </h2>
                      </div>
                    </a>
                  </div>
                  <?php
                endforeach;
              else:
                echo "No post found";
              endif;
              ?>
            </div>
            <!-- Post end -->

            <!-- Pagination -->
            <?php if (!empty($posts['data'])): ?>
              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                      <!-- Previous page-->
                      <?php if ($posts['page'] == 1): ?>
                        <li class="page-item <?php echo $posts['page'] == 1 ? 'disabled' : ''; ?>"><a class="page-link"
                            href="#">&lt;</a></li>
                      <?php else: ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $posts['page'] - 1; ?>">&lt;</a>
                        </li>
                      <?php endif; ?>
                      <!-- Current page-->
                      <?php for ($i = 1; $i <= $posts['totalPage']; $i++): ?>
                        <li class="page-item <?php echo $posts['page'] == $i ? 'active' : ''; ?>"><a class="page-link"
                            href="?page=<?php echo $i; ?>">
                            <?php echo $i; ?>
                          </a></li>
                      <?php endfor ?>
                      <!-- Next page-->
                      <?php if ($posts['page'] == $posts['totalPage']): ?>
                        <li class="page-item <?php echo $posts['page'] == $posts['totalPage'] ? 'disabled' : ''; ?>"><a
                            class="page-link" href="#">&gt;</a></li>
                      <?php else: ?>
                        <li class="page-item "><a class="page-link" href="?page=<?php echo $posts['page'] + 1; ?>">&gt;</a>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </nav>
                </div>
              </div>
            <?php endif; ?>
            <!-- END Pagination -->

          </div>

          <!-- END main-content -->

          <!-- START sidebar -->
          <?php include_once './inc/sidebar.php'; ?>
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <!-- START footer -->
    <?php include_once './inc/footer.php'; ?>
    <!-- END footer -->

  </div>

  <!-- JavaScript -->
  <?php include_once './inc/script.php'; ?>
</body>

</html>