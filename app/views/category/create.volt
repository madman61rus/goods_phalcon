<h3>Создание категории</h3>


{% for message in messages if messages %}
    <p>{{ message.getMessage() }}</p>
{% endfor %}


<form class="form-horizontal" role="form" action="create" method="POST">
    <div class="form-group">
        <label class="col-lg-3 control-label">Название:</label>
        <div class="col-lg-8">
            <input name="title" class="form-control" type="text">
        </div>
    </div>

    {{ submit_button('Добавить','class':'btn btn-default pull-right') }}

</form>