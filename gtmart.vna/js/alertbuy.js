var click = document.getElementsByClassName("cart1");
for (var i = 0; i < click.length; i++) {
    click[i].onclick = function () {
        alert("Bạn vừa mua một sản phẩm");
        return false;
    };
};