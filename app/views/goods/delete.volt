<h2>Удаление товара</h2>

{% for message in messages if messages %}
    <p>{{ message.getMessage() }}</p>
{% endfor %}

<form class="form-horizontal" role="form" action="{{ id }}" method="POST">

    <p>Вы уверены что хотите удалить товар ?</p>

    {{ submit_button('Да') }}

</form>