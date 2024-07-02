document.addEventListener('DOMContentLoaded', function () {
    const productos = document.querySelectorAll('.producto');

    productos.forEach(producto => {
        producto.addEventListener('mouseover', function () {
            this.classList.add('shadow-lg');
        });

        producto.addEventListener('mouseout', function () {
            this.classList.remove('shadow-lg');
        });

        producto.querySelector('.comprar-btn').addEventListener('click', function () {
            alert('Producto añadido al carrito');
        });
    });
});
