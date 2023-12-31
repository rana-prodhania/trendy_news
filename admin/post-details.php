<?php
$title = "Post Details";
include_once './layouts/head.php';

$postObj = new Post();
$tagObj = new Tag();

if ($_GET['id']) {
  $id = $_GET['id'];
  $post = $postObj->getPostAdmin($id);
}
$tags = $tagObj->getAllTagsFromPost($id);
?>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu or Sidebar -->
      <?php include_once './layouts/sidebar.php'; ?>
      <!-- / Menu or Sidebar -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include_once './layouts/navbar.php'; ?>
        <!-- / Navbar -->

        <!-- Content -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-4 justify-content-center">
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Post Details</h5>
                    <a href="posts.php" class="btn btn-sm btn-outline-danger">Back</a>
                  </div>
                  <div class="card-body">
                    <h5>category:
                      <?php echo $post['category_name']; ?>
                    </h5>
                    <h3>title:
                      <?php echo $post['title']; ?>
                    </h3>
                    <p>author:
                      <?php echo $post['author']; ?>
                    </p>
                    <div class="text-center">
                      <img src="uploads/post-img/<?php echo $post['image']; ?>" alt="" srcset="" class="img-fluid w-50">
                    </div>
                    <p>
                      <?php echo $post['description']; ?>
                    </p>
                    <p>status:
                      <?php echo $post['status'] == 1 ? 'Published' : 'Draft'; ?>
                    </p>
                    <p>featured:
                      <?php echo $post['is_featured'] == 1 ? 'Yes' : 'No'; ?>
                    </p>
                    <div>
                      tags:
                      <?php foreach ($tags as $tag):
                        ; ?>
                        <p class="fw-bold d-inline-block">#
                          <?php echo $tag['name']; ?>
                        </p>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Content -->
      </div>
      <!-- / Layout page -->
    </div>
  </div>

  <!-- JavaScript -->
  <?php include_once './layouts/script.php'; ?>
</body>

</html>