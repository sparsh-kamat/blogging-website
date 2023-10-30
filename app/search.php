<?php
include('../path.php');
$page_title = 'Search | SparshBlogs';

include(ROOT_PATH . '/app/helpers/dbaccess.php');

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);

$searchterm = $_GET['search-term'];


// search posts
function searchPosts($term)
{
    global $conn;
    $match = '%' . $term . '%';
    $sql = "SELECT * FROM posts WHERE published=1 AND title LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $match);
    $stmt->execute();
    $result = $stmt->get_result();
    $posts = $result->fetch_all(MYSQLI_ASSOC);
    return $posts;
}

$posts = searchPosts($searchterm);

// Define the number of posts to display per page.
$postsPerPage = 3;

// Determine the current page based on $_GET['page'] and topic id null or something eles

if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

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





?>

<?php include(ROOT_PATH . '/assets/include/head.php'); ?>

<body>
    <?php include(ROOT_PATH . '/assets/include/navbar.php'); ?>
    <div class="blog-home5 py-5">
        <div class="row ">
            <div class="container-fluid col-md-10 mx-auto" id="latest-posts">
                <div class="row">
                    <!-- Content Column -->
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <h3 class="mb-3">Search Result</h3>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <?php foreach ($posts as $key => $post): ?>
                            <div class="col-md-4">
                                <div class="card mb-3 ">
                                    <div class="card-img">
                                        <a href="post.php?id=<?php echo $post['id']; ?>">
                                            <img class="img-fluid"
                                                src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>"
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
                                        <a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- pagination -->
            <div style="text-align: center;">
                <nav aria-label="Page navigation example" style="display: inline-block;">
                    <ul class="pagination mt-5">
                        <?php if ($currentPage > 1): ?>
                            <li class="page-item">
                                <a class="page-link"
                                    href="?page=<?php echo ($currentPage - 1); ?>&search-term=<?php echo $searchterm; ?>"
                                    aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <?php if ($i == $currentPage): ?>
                                <li class="page-item active"><a class="page-link"
                                        href="?page=<?php echo $i; ?>&search-term=<?php echo $searchterm; ?>">
                                        <?php echo $i; ?>
                                    </a></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link"
                                        href="?page=<?php echo $i; ?>&search-term=<?php echo $searchterm; ?>">
                                        <?php echo $i; ?>
                                    </a></li>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($currentPage < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link"
                                    href="?page=<?php echo ($currentPage + 1); ?>&search-term=<?php echo $searchterm; ?>"
                                    aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </nav>




            </div>
            <?php include(ROOT_PATH . '/assets/include/foot.php'); ?>
</body>

</html>