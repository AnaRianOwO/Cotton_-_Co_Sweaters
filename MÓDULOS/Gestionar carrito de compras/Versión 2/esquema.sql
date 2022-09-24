CREATE TABLE IF NOT EXISTS productos(
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(1024) NOT NULL,
    precio DECIMAL(9,2)
);
CREATE TABLE IF NOT EXISTS carrito_usuarios(
    id_sesion VARCHAR(255) NOT NULL,
    id_producto BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (id_producto) REFERENCES productos(id)
    ON 