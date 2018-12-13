
    <?php $this->assign('title', 'Home page') ?>


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo $this->webroot;?>/dist/img/slide/slide1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo $this->webroot;?>/dist/img/slide/slide2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo $this->webroot;?>/dist/img/slide/slide3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
  <div class="row mt-4 ">

  <?php foreach($products as $product) : ?>
    <div class="col-md-4 lg-4 sm-6">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?php echo $this->webroot;?>/public/img/<?php echo $product['Product']['image'] ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $product['Product']['name'] ?></h5>
          <p class="card-text"><?php echo $product['Product']['description'] ?></p>
          <p class="card-text"><?php echo $product['Product']['quantity'] ?></p>
          <!-- <a href="#" class="btn btn-primary">View Details</a> -->
          <?php 
          echo $this->Form->submit(
            'Detail',
            array('class' => 'btn btn-primary',
                  'controller'=>'products',
                  'action'=>'edit',
                  $product['Product']['id']));
          ?>
          <?php 
            echo $this->html->link(
              'EDIT', array('controller'=>'products',
                'action'=> 'edit',
              $product['Product']['id']),
                array('class'=>'nav-link'));
          ?>
            <?php
            echo $this->Form->postLink(
                'Delete',
                array( 'controller'=>'products',
                        'action' => 'delete', $product['Product']['id']),
                array('confirm' => 'Are you sure?')
            );
            ?>
            <div id="view_dialog"></div>
            <?php echo $this->Html->link('DeleteTest', array('action' =>'delete', $product['Product']['id']), array('class' => 'view_dialog')); ?>

        </div>
        
      </div>
     
    </div>
  <?php endforeach ?>;

  </div>
</div>