<div class="container" >
    <div class="row clearfix">

        <h2>Редактирование товара</h2>
    </div>

    <div class="row">

    {% for message in messages if messages %}
    <p>{{ message.getMessage() }}</p>
{% endfor %}

    </div>


<div class="row ">

<form class="form-horizontal" role="form" action="{{ id }}" method="POST">

    <div class="form-group">
        <label class="col-lg-3 control-label">Название:</label>
        <div class="col-lg-8">
            <input name="title" class="form-control" type="text" value="{{ good.title }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Категория:</label>
        <div class="col-lg-8">
            <div class="ui-select">
                <select id="categoryid" name="categoryid" class="form-control">
                    {% for category in categories %}
                        <option {% if good.categoryId == category.id %} selected {% endif %} value="{{ category.id }}">{{ category.title }}</option>
                    {% endfor %}
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Цена:</label>
        <div class="col-md-8">
            <input name="price" class="form-control" value="{{ good.price }}" type="number" step="0.01" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Количество:</label>
        <div class="col-md-8">
            <input name="quantity" class="form-control" value="{{ good.quantity }}" type="number">
        </div>
    </div>


</form>
</div>
    {{ submit_button('Изменить','class':'btn btn-default pull-right') }}


</div>