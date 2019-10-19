<?php
/** @var $this yii\web\View
* @var $var string
 * @var $product  \app\models\Product */
?>
<h1>Header</h1>
<?php
echo \yii\widgets\DetailView::widget(['model' => $product]);
