<div class="view">



    <div class="row-fluid" >
        <div class="span2">
            <div class="btn">
                <img src="data:image/gif;base64,<?php echo $data->getImageData(); ?>"  />
            </div>
        </div>
        <div class="span6">
            <b>
                <?php echo CHtml::link(CHtml::encode($data->nomeCompleto()), array('update', 'id'=>$data->id_user)); ?>
            </b>
            <p> <?php if (isset($data->medico->specializzazione) ) echo $data->medico->specializzazione;  ?> </p>

            <?php
                if (Yii::app()->user->isAdmin() ) {?>

                    <button  class="btn btn-danger btn-mini" onclick='PromptDeleteMedico(<?= $data->id_user ?>)' >
                        <i class="icon-trash icon-white"></i>
                        Elimina
                    </button>
            <?php }?>


        </div>
    </div>

</div>

