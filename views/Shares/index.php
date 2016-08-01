<div>
   <?php if (isset($_SESSION['is_logged_in'])) { ?>
      <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Now</a>
   <?php } ?>
   <?php foreach($viewModel as $row): ?>
      <div class=well>
         <h4><?php echo $row['title']; ?></h4>
         <small><?php echo $row['create_date']; ?></small>
         <hr>
         <p><?php echo $row['body']; ?></p>
         <br>
         <a class="btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Go to site</a>
      </div>
   <?php endforeach; ?>
</div>