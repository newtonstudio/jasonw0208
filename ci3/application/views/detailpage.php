<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1><?=$detail['title']?></h1>
      <p class="lead text-muted"><?=$detail['description']?></p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>

  <section>
    <div class="container">
        <?php
        foreach($leadList as $v) {
          ?>  
          <div style="border:1px solid black; padding:5px; margin:5px; background-color:rgba(0,0,0,0.2)">
          <?=$v['name']?> <?=$v['email']?> <?=$v['mobile']?> <br/>
          <?=$v['created_date']?>
          </div>
          <?php
        }
        ?>
        <?=$pagination?>
    </div>
  </section>

  <section>
    <div class="container">
      <form method="POST" action="<?=base_url('submit')?>">
        <input type="hidden" class="form-control" name="album_id" id="album_id" value="<?=$detail['id']?>">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control"  name="email" id="email" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="name">Mobile</label>
          <input type="text" class="form-control"  name="mobile" id="mobile">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
  </section>

</main>