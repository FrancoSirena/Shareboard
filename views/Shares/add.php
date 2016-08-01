<div class="panel panel-default">
   <div class="panel-heading">
      <h3 class="panel-title">New Share</h3>
   </div>
   <div class="panel-body">
      <form method=post action="#">
         <div class="form-group">
            <label>Title:</label>
            <input type=text name=title id=title class="form-control" required>
         </div>
         <div class="form-group">
            <label>Body:</label>
            <textarea rows=4 cols=60 name=body id=body class="form-control" required></textarea>
         </div>
         <div class="form-group">
            <label>Link:</label>
            <input type=text class='form-control' id=link name=link required>
         </div>
         <input type=hidden name=user>
         <input type=submit class="btn btn-default" value="Save" name=submit>
         <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>">Cancel</a>
      </form>
   </div>
</div>