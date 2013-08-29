<style>
    th {text-align: left; color:#888; font-weight: normal;font-size: small;}
    #tblDettPaziente { width:100%;}
</style>
<?php
$this->pageCaption='Scheda paziente #'.$model->nomeCompleto();
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Pazienti'=>array('index'),
	$model->nomeCompleto(),
);

$this->menu=array(
	//array('label'=>'Elenco pazienti', 'url'=>array('index')),
    array('label'=>'Gestione pazienti', 'url'=>array('admin')),
    array('label'=>'Nuovo paziente', 'url'=>array('create')),
	array('label'=>'Modifica paziente', 'url'=>array('update', 'id'=>$model->id_paziente)),
	array('label'=>'Elimina Paziente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_paziente),'confirm'=>'Sei sicuro di voler eliminare questo paziente?')),

);
?>

<?php
//$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'baseScriptUrl'=>false,
//	'cssFile'=>false,
//	'attributes'=>array(
//        'nome',
//        'cognome',
//		'cf',
//        'codice_sanitario',
//        'data_nascita',
//        'comune_nascita',
//		'indirizzo',
//		'citta',
//        'provincia',
//		'cap',
//		'telefono',
//		'email',
//		'note',
//	),
//));
?>

<h4><?php echo $model->nomeCompleto(); ?> </h4>
<table class="detail-view" id="tblDettPaziente">
    <tbody>
        <tr>
            <th><?= $model->getAttributeLabel('cf');?></th><td> <?= $model->cf;?> </td>
            <th><?= $model->getAttributeLabel('codice_sanitario');?></th><td> <?= $model->codice_sanitario;?> </td>
        </tr>
        <tr>
            <th><?= $model->getAttributeLabel('data_nascita');?></th><td> <?= $model->data_nascita; ?> </td>
            <th><?= $model->getAttributeLabel('citta_nascita');?></th><td> <?= $model->citta_nascita;?> </td>
        </tr>
            <th><?= $model->getAttributeLabel('indirizzo');?></th> <td> <?= $model->indirizzo;?> </td>
            <th><?= $model->getAttributeLabel('citta');?></th><td> <?= $model->citta;?> </td>
        </tr>
        <tr>
            <th><?= $model->getAttributeLabel('provincia');?></th><td> <?= $model->provincia;?> </td>
            <th><?= $model->getAttributeLabel('cap');?></th><td> <?= $model->cap;?> </td>
        </tr>
        <tr>
            <th><?= $model->getAttributeLabel('telefono');?></th><td> <?= $model->telefono;?> </td>
            <th><?= $model->getAttributeLabel('email');?></th><td> <?= $model->email;?> </td>
        </tr>
        <tr>
            <th><?= $model->getAttributeLabel('note');?></th><td> <?= $model->note;?></td>
        </tr>
    </tbody>
</table>

