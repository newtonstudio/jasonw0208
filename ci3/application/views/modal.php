<style>
ul li {
    list-style:none;
    padding:5px;
    border:1px solid black;
    margin:5px;
}

ul li:hover {
    background-color: rgba(0,0,0,0.1);
}
</style>
<main role="main">
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row">      
      <?php
      foreach($themeList as $v) {
      ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="javascript:openModal('<?=$v['title']?>');"><svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg></a>
            <div class="card-body">
              <p class="card-text"><?=$v['title']?></p>
              <ul>
              <?php
              foreach($v['timeslot'] as $v2) {
                  ?>
                  <li><?=$v2['starttime']?> ~ <?=$v2['endtime']?></li>
                  <?php
              }
              ?>
              </ul>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
        
      </div>
    </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">You are now booking <span id="gameName"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>

    function openModal(title) {

        $("#gameName").text(title);

        $("#exampleInputEmail1").val('');
        $("#exampleInputPassword1").val('');
        $('#myModal').modal('show');

    }

</script>