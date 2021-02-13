-- Base de datos: `testLaboratorio`
-- Estructura de tabla `tblprod`

CREATE TABLE `tblprod` (
  `id` int(10) UNSIGNED NOT NULL,
  `prod_code` varchar(20) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_ctry` varchar(50) NOT NULL,
  `prod_qty` int(20) NOT NULL,
  `price` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Datos de Prueba para la tabla `tblprod`

INSERT INTO `tblprod` (`id`, `prod_code`, `prod_name`, `prod_ctry`, `prod_qty`, `price`) VALUES
(8, '002', 'Gardenia', 'Panaderia', 25, '2.50'),
(9, '003', 'Coco Crunch', 'Cereales', 15, '5.25'),
(10, '0001', 'Red Bull', 'Bebidas', 50, '1.25'),
(11, '004', 'Queso', 'Lacteos', 30, '3.25'),
(12, '005', 'Kiwi', 'Frutas', 20, '2.00'),
(13, '006', 'Porkchop', 'Carnes', 60, '4.25'),
(14, '007', 'Pimienta negra', 'Especies', 5, '1.25'),
(15, '008', 'Miel de aveja', 'Edulcorantes', 40, '3.00'),
(16, '009', 'Coliflor', 'Vegetales', 15, '1.50'),
(18, '0011', 'Uva  ', 'Bebidas', 22, '0.50'),
(19, '001', 'Quaker', 'Cereales', 98, '3.25'),
(21, '0015', 'Avena quaker', 'Cereales', 49, '4.25');

-- Kell's de la tabla `tblprod`

ALTER TABLE `tblprod` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `book_id` (`prod_code`);
  
-- AUTO_INCREMENT de la tabla `tblprod`

ALTER TABLE `tblprod` MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;