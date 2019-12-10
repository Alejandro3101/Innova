--PROCEDURE DETALLEVENTA---
USE dbVenta;

CREATE PROCEDURE SP_ClienteConMayorConsumo()

AS
	PRINT('Mejores Clientes, con Mayores Compras');
	PRINT('');
	DECLARE @Cliente VARCHAR(255),@Documento VARCHAR(255),@Correo VARCHAR(255),@Telefono  VARCHAR(255),@Direccion  VARCHAR(255),@NoCompras INT;
	DECLARE CursorCliente CURSOR FOR SELECT TOP 10 CONCAT(c.Nombre,' ',c.Apellido) AS 'Cliente',c.Documento,c.Correo,c.Telefono,c.Direccion,COUNT(*) AS 'NoCompras' FROM Cliente c INNER JOIN Venta v ON c.IdCliente = v.ClienteIdCliente GROUP BY c.Nombre,c.Apellido,c.Documento,c.Correo,c.Telefono,c.Direccion;
	OPEN CursorCliente;
	FETCH NEXT FROM CursorCliente INTO @Cliente,@Documento,@Correo,@Telefono,@Direccion,@NoCompras;
	WHILE @@FETCH_STATUS = 0
	BEGIN   
		PRINT(CONCAT(@Cliente,'          ',@Documento,'          ',@Correo,'          ',@Telefono,'          ',@Direccion,'          ',@NoCompras));
		FETCH NEXT FROM CursorCliente INTO @Cliente,@Documento,@Correo,@Telefono,@Direccion,@NoCompras;
	END
	CLOSE CursorCliente;
	DEALLOCATE CursorCliente;
GO

DECLARE @variable VARCHAR(255);
SET @variable = '2019-12-6';

SELECT ISDATE(@variable)
IF(@variable = '')
	BEGIN
		PRINT('CAMPO INCOMPLETO');
	END
ELSE
	BEGIN
		PRINT('CAMPO COMPLETO');
	END


	