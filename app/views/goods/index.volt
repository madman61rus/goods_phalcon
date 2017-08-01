<div class="container" >
    <div class="row clearfix">
        <h1>Товары</h1>
    </div>

    <table class="table table-bordered table-hover">
        <thead>

        <tr>

            <th>Наименование</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Количество</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        {%  for good in goods %}
            <tr>
                <td>{{ good.title }}</td>
                <td>{{ good.categories.title}}</td>
                <td>{{ good.price }}</td>
                <td>{{ good.quantity }}</td>
                <td>{{ link_to('goods/edit/' ~ good.id, 'Редактировать') }}</td>
                <td>{{ link_to('goods/delete/' ~ good.id, 'Удалить') }}</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    {{ link_to('goods/create/', 'Добавить','class':'btn btn-default pull-right')}}

</div>