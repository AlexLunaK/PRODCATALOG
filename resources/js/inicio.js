
document.addEventListener('DOMContentLoaded', function () {
    const botonesDetalles = document.querySelectorAll('.btn-detalles');

    botonesDetalles.forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('detalleProducto').textContent = btn.dataset.producto;
            document.getElementById('detalleDescripcion').textContent = btn.dataset.descripcion;
            document.getElementById('detallePrecio').textContent = btn.dataset.precio;
            document.getElementById('detalleCategoria').textContent = btn.dataset.categoria;
            document.getElementById('detalleStock').textContent = btn.dataset.stock;
            document.getElementById('detalleProveedor').textContent = btn.dataset.proveedor;
        });
    });
});