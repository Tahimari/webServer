{% block body %}
    <h3>Invoice number: {{ delivery.id }}</h3>
    <h5>date: {{ delivery.createdAt|date('Y-m-d\\ H:i:s') }}</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Vat (23%)</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            {% for item in delivery.items %}
                <tr>
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.title }}</td>
                    <td>{{ item.category }}</td>
                    <td>{{ (item.price*0.77)|number_format(2, '.', ',')}} PLN</td>
                    <td>{{ (item.price*0.23)|number_format(2, '.', ',') }} PLN</td>
                    <td>{{ item.price }} PLN</td>
                </tr>
            {% endfor %}
        </tbody>
    </table>
    <p>Price: {{ (sum*0.77)|number_format(2, '.', ',') }} PLN</p>
    <p>Vat: {{ (sum*0.23)|number_format(2, '.', ',') }} PLN</p>
    <p><b>Total: {{ sum }} PLN</b></p>
    <div class="selling">
        <p><b>Selling:</b></p>
        <p>Company: WebShop</p>
        <p>First Name: Kamil</p>
        <p>Last Name: Misiak</p>
        <p>Adress: ul. Kosciuszki 10</p>
        <p>Post code: 32-300</p>
        <p>City: Olkusz</p>
    </div>
    <div class="billTo">
        <p><b>Bill To</b></p>
        <p>First Name: {{ delivery.firstName }}</p>
        <p>Last Name: {{ delivery.lastName }}</p>
        <p>adress: {{ delivery.adressLine }}</p>
        <p>Post Code: {{ delivery.postalCode }}</p>
        <p>City: {{ delivery.City }}</p>    
    </div>
{% endblock %}
