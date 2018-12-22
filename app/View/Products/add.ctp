<div class="container">
<h1>ADD PRODUCTS</h1>
<hr>
<?php //echo// $this->Form->create('Product',array('enctype'=>'multipart/form-data')); ?>
    <form name="addForm" id="addForm" method="post" enctype="multipart/form-data">
    <div class="form-group">
		<label for="exampleInputEmail1">Product Name</label>
        <?php 
        echo $this->Form->input('name',array('label'=> false, 'div'=> false, 
                                            'placeholder'=> 'Enter Proudct name', 
                                            'class'=>'form-control'));
        ?>
    </div>
    <div class="form-group">
		<label for="exampleInputEmail1">Quantity</label>
        <?php 
        echo $this->Form->input('quantity',array('label'=> false, 'div'=> false, 
                                            'placeholder'=> 'Enter quantity', 
                                            'class'=>'form-control'));
        ?>
    </div>
    <div class="form-group">
		<label for="exampleInputEmail1">Unit Price</label>
        <?php 
        echo $this->Form->input('unitprice',array('label'=> false, 'div'=> false, 
                                            'placeholder'=> 'Enter Unit Price', 
                                            'class'=>'form-control'));
        ?>
    </div>
    <div class="form-group">
		<label for="exampleInputEmail1">Description</label>
        <?php 
        echo $this->Form->input('description',array('label'=> false, 'div'=> false,
                                            'rows'=> 5, 
                                            'placeholder'=> 'Enter Proudct name', 
                                            'class'=>'form-control'));
        ?>
    </div>
    <div class="form-group">
		<label for="exampleInputEmail1">Image</label>
        <?php 
        echo $this->Form->input('image',array('label'=> false, 'div'=> false,
                                            'type'=>'file','name'=>'image','id'=>'txtImg',
                                            'class'=>'form-control'));
        ?>
    </div>
    <?php
//	echo $this->Form->submit(
//		'Save Post',
//		array('class' => 'btn btn-primary')
//	);
	echo $this->Form->end();
?>
</div>




