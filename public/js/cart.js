/* 
 * eConnect4u
 */

$(document).ready(function () {
    $('.cart').on('click', function (e) {
        $.ajax({
            method: 'GET',
            url: '/account/get-cart'
        }).done(function (data) {
            generateCart(data);
        });
    });
});

function generateCart(data) {
    $('.cart-paragraph').html(data.length);
    var cartList = $('.item-cart-list');
    var cartListUL = document.createElement("ul");
    cartListUL.classList.add("cart-list");
    var sum = 0;

    for (var i = 0; i < data.length; i++) {

        sum += data[i].price;

        var list = document.createElement("li");

        var div = document.createElement("div");
        div.classList.add("cart-items");

        var img = document.createElement("img");
        img.src = data[i].imageUrl;
        img.classList.add("img-fluid");

        var paragraphDiv = document.createElement("div");
        var paragraph1 = document.createElement("p");
        var paragraph2 = document.createElement("p");
        paragraph2.setAttribute("id", "item-price");


        var node1 = document.createTextNode(data[i].title);
        var node2 = document.createTextNode(data[i].price + "zł");

        paragraph1.appendChild(node1);
        paragraph2.appendChild(node2);

        paragraphDiv.appendChild(paragraph1);
        paragraphDiv.appendChild(paragraph2);

        div.appendChild(img);
        div.appendChild(paragraphDiv);

        list.appendChild(div);
        cartListUL.appendChild(list);
    }
    cartList.html(cartListUL);
    $('#cart-price').html("To pay " + sum + "zł");
}
