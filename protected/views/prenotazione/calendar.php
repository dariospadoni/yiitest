<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>

<link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fullcalendar.css" />

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fullcalendar.min.js"> </script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-i18n.js"> </script>

<?php
$this->pageCaption='Prenotazioni';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
    'Prenotazioni'=>array('index'),
	'Calendario visite',
);

$this->menu=array(
	array('label'=>'Nuova prenotazione', 'url'=>array('create')),
    array('label'=>'Lista prenotazioni', 'url'=>array('create')),
);


?>

<div id="calendar"></div>

<script type="text/javascript">

    $(function(){

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            timeFormat: 'HH:mm',
            firstDay:1,
            monthNames: $.datepicker.regional["it"].monthNames,
            monthNamesShort: $.datepicker.regional["it"].monthNamesShort,
            dayNames: $.datepicker.regional["it"].dayNames ,
            dayNamesShort: $.datepicker.regional["it"].dayNamesShort,
            editable: true,
            columnFormat: {
                month: 'ddd',
                week: 'ddd d/M',
                day: 'dddd d/M'
            },
            buttonText: {
                today: 'oggi',
                month: 'mese',
                week: 'settimana',
                day: 'giorno'
            },
            eventSources: [
                {
                    url:"<?php echo CController::createUrl( "prenotazione/calendarEvents") ?>",
                    type:"GET",
                    data: function(){ return {
                        id_prestazione:  $("#Prenotazione_id_prestazione").val(),
                        cognome_paziente:  $("#Prenotazione_nomePaziente").val()
                    }}
                }
            ]
        });

    });


</script>