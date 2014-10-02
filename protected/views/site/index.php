                                                                <?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;//scrolling="no"
var_dump(Yii::app()->params['gclient_id']);
?>
<iframe style="width:100%;height:100%" id="gSignIn" src="<?php echo Yii::app()->getBaseUrl(true)?>/gplus-quickstart-php/signin.php"></iframe>
<p>Wecome to the <b><?php echo Yii::app()->name; ?></b>.</p>
<!--<iframe width="640" height="390" src="//www.youtube.com/embed/utNNZOG8pUI" frameborder="0" allowfullscreen></iframe>-->
<?php //echo CHtml::encode(Yii::app()->basePath); ?>
<?php //$this->renderPartial('_form', array('userModel'=>$userModel, 'queryModel'=>$queryModel)) ?>
</br>
<p style="margin-top:15px">For more details on project, please email us at <a href="mailto:admin@uttarakhandsamaaj.com">admin@uttarakhandsamaaj.com</a>.
Feel free to post your comments on our <a href="https://www.facebook.com/uttarakhandrbl" target="_blank">facebook page</a>.</p>
                            
                            
