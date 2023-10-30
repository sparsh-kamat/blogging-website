<div class="card mt-2">
    <div class="card-body text-center">
        <form class="d-flex justify-content-center mt-4" action=<?php echo BASE_URL . '/app/search.php' ?> method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search-term">
            <button class="btn btn-success" type="submit" name="search-btn">Search</button>
        </form>
        <h2 class="mt-5">Topics</h2>
        <?php foreach ($topics as $key => $topic): ?>
            <div class="mb-3">
                <a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>" class="text-decoration-none">
                    <?php echo $topic['name']; ?>
                </a>
            </div>
        <?php endforeach; ?>

        
    </div>
</div>


<style>
  
   
    .card-body form input {
        width: 80%;
    }

    .card-body a:hover {
        text-decoration: underline;
    }

    .card-body a:visited {
        color: black;
    }   

</style>


<!-- //bootstrap siebar to show all topics -->