<div class="view">



    <div class="row-fluid" >
        <div class="span2">
            <div class="btn">
                <img src="data:image/gif;base64,<?php echo $data->getImageData(); ?>"  />
            </div>
        </div>
        <div class="span6">
            <b>
                <?php echo CHtml::link(CHtml::encode($data->nomeCompleto()), array('view', 'id'=>$data->id_user)); ?>
            </b>
            <p> <?php if (isset($data->medico->specializzazione) ) echo $data->medico->specializzazione;  ?> </p>
        </div>
    </div>

</div>