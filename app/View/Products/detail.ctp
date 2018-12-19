<div class="card text-center">
    <div class="card-header">
        Product detail of <b><?php echo $product['Product']['name']; ?></b>
    </div>
    <div class="card-body">
        <img class=" img-thumbnail" src="<?php echo $this->webroot;?>/public/img/<?php echo $product['Product']['image'] ?>" alt="Card image cap">
        <p class="card-text"><?php echo $product['Product']['description'] ?>;</p>
        <p class="card-text"><?php echo $product['Product']['unitprice'] ?></p>
        <p class="card-text"><?php echo $product['Product']['quantity'] ?></p>
        <p class="card-text"><?php echo $product['Product']['created'] ?></p>
        <p class="card-text"><?php echo $product['Product']['modified'] ?></p>


<!--        <a href="#" class="btn btn-primary">Go somewhere</a>-->
    </div>
    <div class="card-footer text-muted">
        <?php
        echo $this->html->link(
            'EDIT', array('controller'=>'products',
            'action'=> 'edit',
            $product['Product']['id']),
            array('class'=>'nav-link'));
        ?>

        <?php echo $this->Html->link('Delete', array('action' =>'delete', $product['Product']['id']),
            array('class' => ' btn btn-primary view_dialog', 'data-id'=> $product['Product']['id']));
        ?>
        <?php echo $this->Html->link('Home', array('action' =>'index'),
            array('class' => ' btn btn-primary '));
        ?>
    </div>
    <div id="view_dialog"></div>
    <div id="view_dialogOk"></div>
</div>