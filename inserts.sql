producto(nombre, descripcion, id_sexo, precio, id_proveedor)
proveedor //1-, 2-
sexo //1-hombre, 2-mujer, 3-ambos
imagen(id_producto, id_imagen)
color(id_producto, id_color) //1-tierra, 2-frio, 3-neutro, 4-calido, 5-gris, 6-oscuro, 7-claro, 8-marron
etapa(id_producto, id_etapa) //1-joven-adolescente, 2-adulto-joven, 3-adulto, 4-adulto-mayor
categoria(id_producto, id_categoria) //1-lectura, 2-musica, 3-deportes, 4-accesorios, 5-personalizable


call sp_producto_insert('Reloj casual de cuero', 'Excelente para hombres extrovertidos', 1, 3500, 2);
call sp_producto_imagen_insert(1, 1);
call sp_producto_color_insert(1, 1);
call sp_producto_etapa_insert(1, 1);
call sp_producto_categoria_insert(1, 4);


call sp_producto_insert('Faja de cuero', 'Detalle que resalta cualquier look', 1, 3000, 2);
call sp_producto_imagen_insert(1, 1);
call sp_producto_color_insert(1, 1);
call sp_producto_etapa_insert(1, 1);
call sp_producto_categoria_insert(1, 4);