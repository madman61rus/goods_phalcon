<h3>Ввод нового товара</h3>


    <?php foreach ($messages as $message) { if ($messages) { ?>
        <p><?= $message->getMessage() ?></p>
    <?php } ?><?php } ?>


<form class="form-horizontal" role="form" action="create" method="POST">
    <div class="form-group">
        <label class="col-lg-3 control-label">Название:</label>
        <div class="col-lg-8">
            <input name="title" class="form-control" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Категория:</label>
        <div class="col-lg-8">
            <div class="ui-select">
                <select id="categoryid" name="categoryid" class="form-control">
                    <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category->id ?>"><?= $category->title ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Цена:</label>
        <div class="col-md-8">
            <input name="price" class="form-control" value="0" type="number" step="0.01">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Количество:</label>
        <div class="col-md-8">
            <input name="quantity" class="form-control" value="0" type="number">
        </div>
    </div>

    <?= $this->tag->submitButton(['Добавить']) ?>

</form>