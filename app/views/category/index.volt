<div class="items-container" >
<h1>Категории товаров</h1>

    <table class="table table-bordered">
        <thead>

        <tr>

            <th>Категория</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        {%  for category in categories %}
        <tr>
            <td>{{ category.title }}</td>
            <td>{{ link_to('category/edit/' ~ category.id, 'Редактировать') }}</td>
            <td>{{ link_to('category/delete/' ~ category.id, 'Удалить') }}</td>
        </tr>
        {% endfor %}
        </tbody>
    </table>

    {{ link_to('category/create/', 'Добавить','class':'btn btn-default pull-right')}}

</div>