<h2>Редактирование категории</h2>


{% for message in messages if messages %}
    <p>{{ message.getMessage() }}</p>
{% endfor %}


<form class="form-horizontal" role="form" action="{{ id }}" method="POST">
    <div class="form-group">
        <label class="col-lg-3 control-label">Название:</label>
        <div class="col-lg-8">
            <input name="title" class="form-control" type="text" value="{{ category.title }}">
        </div>
    </div>


    {{ submit_button('Изменить','class':'btn btn-default pull-right') }}

</form>