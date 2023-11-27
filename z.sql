use pasteleria2;
-- Inserción de datos en la tabla Persona (//Empleados/Gerentes)
INSERT INTO Persona (DNI, nombre, apellido1, apellido2, direccion, fechaNac) VALUES
('11111111A', 'Juan', 'Gomez', 'Perez', 'Calle 123', '1990-01-01'),
('22222222B', 'Maria', 'Rodriguez', 'Lopez', 'Avenida 456', '1985-05-10'),
('33333333C', 'Pedro', 'Martinez', 'Sanchez', 'Plaza 789', '1998-12-20'),
('44444444D', 'Laura', 'Lopez', 'Fernandez', 'Callejon 10', '1980-08-15'),
('55555555E', 'Carlos', 'Fernandez', 'Gutierrez', 'Avenida 987', '1995-03-25');
-- Inserción de datos en la tabla Persona (//Clientes)
INSERT INTO Persona (DNI, nombre, apellido1, apellido2, direccion, fechaNac) VALUES
('66666666F', 'Ana', 'Lopez', 'Garcia', 'Calle 654', '1992-06-05'),
('77777777G', 'Roberto', 'Fernandez', 'Martinez', 'Avenida 876', '1987-09-15'),
('88888888H', 'Isabel', 'Sanchez', 'Perez', 'Plaza 321', '1994-02-18'),
('99999999I', 'Javier', 'Gutierrez', 'Rodriguez', 'Callejon 45', '1983-11-30'),
('10101010J', 'Marta', 'Martinez', 'Lopez', 'Avenida 789', '1997-04-20');


-- Inserción de datos en la tabla Sucursal
INSERT INTO Sucursal (numero, nombre, direccion) VALUES
(1, 'Sucursal 1', 'Calle Principal 123'),
(2, 'Sucursal 2', 'Avenida Secundaria 456'),
(3, 'Sucursal 3', 'Plaza Central 789'),
(4, 'Sucursal 4', 'Callejuela 10'),
(5, 'Sucursal 5', 'Avenida Principal 987');

-- Inserción de datos en la tabla Empleado
INSERT INTO Empleado (DNI, puesto, sueldo, sucursal) VALUES
('11111111A', 'Cajero', 2500.00, 1),
('22222222B', 'Repostero', 2800.00, 2),
('33333333C', 'Mesero', 2200.00, 3),
('44444444D', 'Chef', 3500.00, 4),
('55555555E', 'Camarero', 2000.00, 5);

-- Inserción de datos en la tabla Gerente
INSERT INTO Gerente (DNI) VALUES
('11111111A'),
('22222222B'),
('33333333C'),
('44444444D'),
('55555555E');

-- Inserción de datos en la tabla Cliente
INSERT INTO Cliente (DNI, numeroTelefono) VALUES
('66666666F', '555-1111'),
('77777777G', '555-2222'),
('88888888H', '555-3333'),
('99999999I', '555-4444'),
('10101010J', '555-5555');

-- Inserción de datos en la tabla Administra
INSERT INTO Administra (DNI_GERENTE, numeroSucursal) VALUES
('11111111A', 1),
('22222222B', 2),
('33333333C', 3),
('44444444D', 4),
('55555555E', 5);

-- Inserción de datos en la tabla Pedidos
INSERT INTO Pedidos (numeroSucursal, DNI_CLIENTE, tipoEntrega) VALUES
(1, '66666666F', 'Domicilio'),
(2, '77777777G', 'Sucursal'),
(3, '88888888H', 'Domicilio'),
(4, '99999999I', 'Sucursal'),
(5, '10101010J', 'Domicilio');

-- Inserción de datos en la tabla Productos
INSERT INTO Productos (nombre, precio) VALUES
('Pastel de Chocolate', 25.00),
('Galletas de Vainilla', 10.00),
('Tarta de Frutas', 30.00),
('Brownie', 15.00),
('Cupcakes', 12.00);

-- Inserción de datos en la tabla Contiene
INSERT INTO Contiene (ID_PEDIDO, ID_PRODUCTO) VALUES
(6, 1),
(7, 2),
(8, 3),
(9, 4),
(10, 5);

-- 1. Listar todos los empleados
SELECT * FROM Empleado;

-- 2. Listar todas las sucursales con sus respectivos gerentes
SELECT 
    Sucursal.numero, 
    Sucursal.nombre, 
    Gerente.DNI AS DNI_Gerente, 
    Persona.nombre AS Nombre_Gerente
FROM Sucursal
INNER JOIN Administra ON Sucursal.numero = Administra.numeroSucursal
INNER JOIN Gerente ON Administra.DNI_GERENTE = Gerente.DNI
INNER JOIN Persona ON Gerente.DNI = Persona.DNI;

-- 3. Listar los clientes y sus pedidos
SELECT Cliente.DNI, Persona.nombre AS Nombre_Cliente, Pedidos.*
FROM Cliente
INNER JOIN Persona ON Cliente.DNI = Persona.DNI
INNER JOIN Pedidos ON Cliente.DNI = Pedidos.DNI_CLIENTE;

-- 4. Calcular el total de ventas por sucursal
SELECT Sucursal.numero, Sucursal.nombre, SUM(Productos.precio) AS Total_Ventas
FROM Sucursal
LEFT JOIN Pedidos ON Sucursal.numero = Pedidos.numeroSucursal
LEFT JOIN Contiene ON Pedidos.id = Contiene.ID_PEDIDO
LEFT JOIN Productos ON Contiene.ID_PRODUCTO = Productos.id
GROUP BY Sucursal.numero, Sucursal.nombre;

-- 5. Listar los productos en un pedido específico
SELECT Pedidos.id AS Numero_Pedido, Productos.nombre AS Nombre_Producto, Productos.precio
FROM Pedidos
INNER JOIN Contiene ON Pedidos.id = Contiene.ID_PEDIDO
INNER JOIN Productos ON Contiene.ID_PRODUCTO = Productos.id
WHERE Pedidos.id = 6; -- Puedes cambiar el número del pedido según tu base de datos.

--ACTUALIZACIONES

-- 1. Actualizar el sueldo del chef (DNI '44444444D')
UPDATE Empleado SET sueldo = 3800.00 WHERE DNI = '44444444D';

-- 2. Cambiar la dirección de la sucursal 3
UPDATE Sucursal SET direccion = 'Plaza Central, Calle 789' WHERE numero = 3;

-- 3. Actualizar el número de teléfono del cliente '77777777G'
UPDATE Cliente SET numeroTelefono = '555-7890' WHERE DNI = '77777777G';

-- 4. Cambiar el tipo de entrega del pedido 2 a 'Domicilio'
UPDATE Pedidos SET tipoEntrega = 'Domicilio' WHERE id = 2;

-- 5. Modificar el precio de las 'Galletas de Vainilla'
UPDATE Productos SET precio = 12.50 WHERE nombre = 'Galletas de Vainilla';

--ELIMINACIONES

-- Simulación 1: Eliminar el cliente '77777777G' (simulación)
DELETE FROM Cliente WHERE DNI = '77777777G';

-- Eliminar las relaciones asociadas (considerando restricciones de clave foránea)
DELETE FROM Pedidos WHERE DNI_CLIENTE = '77777777G';

-- Simulación 2: Eliminar la sucursal 4 (simulación)
DELETE FROM Sucursal WHERE numero = 4;

-- Eliminar las relaciones asociadas (considerando restricciones de clave foránea)
DELETE FROM Empleado WHERE sucursal = 4;
DELETE FROM Administra WHERE numeroSucursal = 4;
DELETE FROM Pedidos WHERE numeroSucursal = 4;

-- Simulación 3: Eliminar el empleado '55555555E' (simulación)
DELETE FROM Empleado WHERE DNI = '55555555E';

-- Eliminar las relaciones asociadas (considerando restricciones de clave foránea)
DELETE FROM Administra WHERE DNI_GERENTE = '55555555E';
DELETE FROM Gerente WHERE DNI = '55555555E';

-- Simulación 4: Eliminar el producto 'Tarta de Frutas' (simulación)
DELETE FROM Productos WHERE nombre = 'Tarta de Frutas';

-- Eliminar las relaciones asociadas (considerando restricciones de clave foránea)
DELETE FROM Contiene WHERE ID_PRODUCTO = (SELECT id FROM Productos WHERE nombre = 'Tarta de Frutas');

-- Simulación 5: Eliminar el pedido 3 (simulación)
DELETE FROM Pedidos WHERE id = 3;

-- Eliminar las relaciones asociadas (considerando restricciones de clave foránea)
DELETE FROM Contiene WHERE ID_PEDIDO = 3;
