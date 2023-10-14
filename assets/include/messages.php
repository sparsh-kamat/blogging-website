<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger ">
        <ul class="list-group" style="list-style-type: none;>
        <?php foreach($errors as $error): ?>
            <li><?php echo '<h6 class="alert alert-danger">' . $error . '</h6>'; ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(count($success) > 0): ?>
    <div class="alert alert-success">
        <ul class="list-group" style="list-style-type: none;>
        <?php foreach($success as $success): ?>
            <li> <?php echo '<h6 class="alert alert-success">' . $success . '</h6>'; ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
