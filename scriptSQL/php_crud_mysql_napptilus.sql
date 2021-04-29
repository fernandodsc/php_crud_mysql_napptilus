
CREATE DATABASE php_crud_mysql_napptilus;
USE php_crud_mysql_napptilus;


CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isbn` int(13) DEFAULT NULL,
  `sinopsis` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `portada` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id`, `titulo`, `autor`, `isbn`, `sinopsis`, `portada`) VALUES
(67, 'HISTORIA DE CRONOPIOS Y DE FAMAS', 'JULIO CORTAZAR', 2147483647, 'Historias de cronopios y de famas es uno de los libros legendarios de Julio CortÃ¡zar. PostulaciÃ³n de una mirada poÃ©tica capaz de enfrentar las miserias de la rutina y del sentido comÃºn, CortÃ¡zar toma aquÃ­ partido por la imaginaciÃ³n creadora y el humor corrosivo de los surrealistas.\r\nSin duda alguna, con este libro CortÃ¡zar sella un pacto de complicidad definitiva e incondicional con sus lectores.', 'cronopios.jpg'),
(68, 'CIEN AÃ‘OS DE SOLEDAD', 'GABRIEL GARCIA MARQUEZ', 2147483647, 'Â«Muchos aÃ±os despuÃ©s, frente al pelotÃ³n de fusilamiento, el coronel Aureliano BuendÃ­a habÃ­a de recordar aquella tarde remota en que su padre lo llevÃ³ a conocer el hielo.Â»\r\n\r\nCon esta cita comienza una de las novelas mÃ¡s importantes del siglo XX y una de las aventuras literarias mÃ¡s fascinantes de todos los tiempos. Millones de ejemplares de Cien aÃ±os de soledad leÃ­dos en todas las lenguas y el premio Nobel de Literatura coronando una obra que se habÃ­a abierto paso Â«boca a bocaÂ» -como gustaba decir el escritor- son la mÃ¡s palpable demostraciÃ³n de que la aventura fabulosa de la familia BuendÃ­a-IguarÃ¡n, con sus milagros, fantasÃ­as, obsesiones, tragedias, incestos, adulterios, rebeldÃ­as, descubrimientos y condenas, representaba al mismo tiempo el mito y la historia, la tragedia y el amor del mundo entero.', 'cienagnos.jpg');

ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;