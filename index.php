<?php
include('path.php');
$page_title = 'Home | SparshBlogs';

include(ROOT_PATH . '/app/helpers/dbaccess.php');

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);

// search posts

function getPublishedPostsByTopicId($topic_id)
{
  global $conn;
  $posts = selectAll('posts', ['published' => 1, 'topic_id' => $topic_id]);
  $topicPosts = array();
  foreach ($posts as $post) {
    array_push($topicPosts, $post);
  }
  return $topicPosts;
}

// Define the number of posts to display per page.
$postsPerPage = 3;

// Determine the current page based on $_GET['page'] and topic id null or something eles

if (isset($_GET['page'])) {
  $currentPage = $_GET['page'];
  if (isset($_GET['t_id'])) {
    $topic_id = $_GET['t_id'];
    $posts = getPublishedPostsByTopicId($topic_id);
  }
} else {
  if (isset($_GET['t_id'])) {
    $topic_id = $_GET['t_id'];
    $posts = getPublishedPostsByTopicId($topic_id);
  }
  $currentPage = 1;
}


// Determine the total number of pages.
$totalPages = ceil(count($posts) / $postsPerPage);

// Ensure the current page isn't less than one.
if ($currentPage < 1) {
  $currentPage = 1;
  // Ensure the current page isn't greater than the total pages.
} elseif ($currentPage > $totalPages) {
  $currentPage = $totalPages;
}



// Calculate the offset to retrieve the appropriate posts for the current page.
$offset = ($currentPage - 1) * $postsPerPage;

// Get the posts for the current page.
$posts = array_slice($posts, $offset, $postsPerPage);

// Include the database connection file and the helper functions

if (isset($_GET['t_id'])) {
  $top = selectOne('topics', ['id' => $_GET['t_id']]);
  $naav = $top['name'];
} else {
  $naav = 'All Posts';
}
?>

<!-- #region -->
<?php include_once('assets/include/head.php'); ?>

<body>
  <?php include_once('assets/include/navbar.php'); ?>

  <div class="blog-home5 py-5">
    <div class="row justify-content-center shadow-lg">
      <div class="col-md-12 text-center">
        <h3 class=" pt-3 pb-1">
          <?php echo $naav; ?>
        </h3>
      </div>
    </div>
    <div class="row ">
      <div class="container-fluid col-md-10 mx-auto" id="latest-posts">
        <div class="row">
          <!-- Content Column -->

          <div class="row mt-3 justify-content-center">
            <?php foreach ($posts as $key => $post): ?>
              <div class="col-md-4">
                <div class="card mb-3 ">
                  <div class="card-img">
                    <a href="post.php?id=<?php echo $post['id']; ?>">
                      <img class="img-fluid" src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>"
                        alt="wrappixel kit">
                    </a>
                  </div>
                  <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title mb-3"><a href="post.php?id=<?php echo $post['id']; ?>"
                        class="text-decoration-none text-dark">
                        <?php echo $post['title']; ?>
                      </a></h5>
                    <p class="card-text">
                      <?php echo html_entity_decode(substr($post['body'], 0, 100) . '...'); ?>
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated
                        <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                      </small></p>
                    <a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Read More</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <?php include_once('assets/include/sidebar.php'); ?>
      </div>
    </div>
  </div>

  <!-- Pagination Links -->
  <!-- Pagination Links -->

  <!-- Pagination Links -->
  <div style="text-align: center;">
    <nav aria-label="Page navigation example" style="display: inline-block;">
      <ul class="pagination">
        <?php if ($currentPage > 1): ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo ($currentPage - 1); ?>&t_id=<?php echo $topic_id; ?>"
              aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (isset($_GET['t_id'])): ?>
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
              <a class="page-link" href="?page=<?php echo $i; ?>&t_id=<?php echo $topic_id; ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php endfor; ?>
        <?php else: ?>
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
              <a class="page-link" href="?page=<?php echo $i; ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php endfor; ?>
        <?php endif; ?>

        <?php if ($currentPage < $totalPages): ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo ($currentPage + 1); ?>&t_id=<?php echo $topic_id; ?>"
              aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>




  <?php include_once('assets/include/foot.php'); ?>
</body>

</html>