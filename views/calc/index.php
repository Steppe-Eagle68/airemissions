<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$this->title = Yii::t('main','Calculator');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'calc-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <div class="form-group">
        <?= $form->field($model, 'fuel')->widget(Select2::className(), [
            'data' => ArrayHelper::map(\app\models\Fuels::find()->all(), 'id', 'name'),
            'options' => ['placeholder' => Yii::t('main','Please, choose')],
            'pluginOptions' => ['allowClear' => true],
        ]) ?>
    </div>

    <?= $this->registerJs('$("#calcform-fuel").on("change", function (e) {
        try{ 
        var id = $("#calcform-fuel").select2("data")[0].id;
        if (typeof id == "undefined" || id == null || id == "") return;
        // Now you can work with the selected value, i.e.:
        //console.log(id);
        $.ajax({
            url: "'. Yii::$app->request->baseUrl. '/ajax/getboilers",
           type: \'get\',
           data: {id: id},
           success: function (data) {
              //console.log(data);
              $(\'#calcform-boiler\')
                .find(\'option\')
                .remove()
                .end();
              if (typeof data != "undefined" && data != null && data.length != 0){
                $( data ).each(function( index ) {
                    $(\'#calcform-boiler\').append(new Option (this.name, this.id));
                });
              }
              $("#calcform-boiler").val(\'\').trigger(\'change\');
           }
        });
        }catch(error){
            console.error(error);
        }
    });');
    ?>

    <div class="form-group">
        <?= $form->field($model, 'boiler')->widget(Select2::className(), [
            'data' => empty($boilers)?[]:$boilers,
            'options' => ['placeholder' => Yii::t('main','Please, choose')],
            'pluginOptions' => ['allowClear' => true],
        ]) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'catalyst')->widget(Select2::className(), [
            'data' => empty($catalysts)?[]:$catalysts,
            'options' => ['placeholder' => Yii::t('main','Please, choose')],
            'pluginOptions' => ['allowClear' => true],
        ]) ?>
    </div>

    <div class="form-group">
        <div class="col-lg-12">
            <?= Html::submitButton(Yii::t('main','Calculate'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>

<?php if (!empty($data)){?>
    <table class="table table-responsive table-bordered table-hover">
        <thead>
            <tr>
                <th valign="middle" class="align-middle"><?=Yii::t('main', 'No. s/n');?></th>
                <th valign="middle" class="align-middle"><?=Yii::t('main', 'Code');?></th>
                <th valign="middle"><?=Yii::t('main', 'Name of substance');?></th>
                <th valign="middle"><?=Yii::t('main', 'Emission mass');?></th>
                <!--<th valign="middle"><?/*=Yii::t('main', 'Tax rates in the current year, uah penny/t');*/?></th>
                <th valign="middle"><?/*=Yii::t('main', 'The amount of accrued tax liability, uah penny');*/?></th>-->
            </tr>
        </thead>
            <?php foreach ($data as $key => $val) {?>
                <tr>
                    <td align="right"><?=($key + 1)?></td>
                    <td></td>
                    <td><?= empty($val['name'])?'':$val['name']?></td>
                    <td align="right"><?= number_format(empty($val['value'])?0:$val['value'], 3, ',', ' ');?></td>
                    <!--<td width="10%"></td>
                    <td width="10%" ></td>-->
                </tr>
            <?php } ?>
        <tbody>
        </tbody>
    </table>
<?php } ?>



