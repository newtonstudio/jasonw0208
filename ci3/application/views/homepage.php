<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
      <form method="POST" action="<?=base_url('home/uploadSubmit')?>" enctype="multipart/form-data">
        <input type="file" name="myFile" />
        <input type="submit" value="Upload" />
      </form>

    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
      <?php
      foreach($albumList as $v) {
      ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="<?=base_url('assets/img/pic1.jpg')?>" class="img-fluid" />
            <div class="card-body">
              <p class="card-text"><?=$v['description']?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?=base_url('album/'.$v['id'].'/'.$v['title'])?>" class="btn btn-sm btn-outline-secondary">View</a>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted"><?=$v['minutes']?></small>
              </div>
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
