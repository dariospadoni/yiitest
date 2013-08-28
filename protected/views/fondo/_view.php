<div class="view">

    <div class="row-fluid" >
        <div class="span2">
            <div class="btn">
                <img src="data:image/gif;base64,<?php echo $data->getImageData(); ?>"  />
            </div>
        </div>
        <div class="span6">
            <b>
                <?php echo CHtml::link(CHtml::encode($data->nome), array('update', 'id'=>$data->id_fondo)); ?>
            </b>

<!--            <p>--><?php //echo CHtml::encode($data->sito_web); ?><!--</p>-->

            <div class="excerpt" > <?php if ($data->descrizione!="" ) { echo $data->descrizione; } else { echo "&nbsp;";};  ?>  </div>

            <?php
            if (Yii::app()->user->isAdmin() ) {?>

                <button  class="btn btn-danger btn-mini" onclick='PromptDeleteFondo(<?= $data->id_fondo ?>)' >
                    <i class="icon-trash icon-white"></i>
                    Elimina
                </button>
            <?php }?>

        </div>
    </div>

</div>