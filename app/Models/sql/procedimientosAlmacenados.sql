DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerTotalDefensasCompletadas`()
BEGIN
    SELECT 
        COUNT(*) AS total_defensas_completadas
    FROM 
        defensa 
    WHERE 
        nota IS NOT NULL;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerTotalDefensasNoProgramadas`()
BEGIN
    SELECT 
        COUNT(e.id_estudiante) AS total_defensas_no_programadas
    FROM 
        estudiante e
    LEFT JOIN 
        defensa d_interna ON e.id_estudiante = d_interna.id_estudiante AND d_interna.tipo_defensa = 'interna'
    LEFT JOIN 
        defensa d_externa ON e.id_estudiante = d_externa.id_estudiante AND d_externa.tipo_defensa = 'externa'
    WHERE 
        (
            -- Si la defensa interna no está aprobada o el intento es menor a 1
            (e.intentos_interna < 1 OR (d_interna.nota < 51 AND e.intentos_interna = 1))
        ) 
        OR 
        (
            -- Si la defensa externa no está aprobada o el intento es menor a 1
            (e.intentos_externa < 1 OR (d_externa.nota < 51 AND e.intentos_externa = 1))
        );
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerTotalDefensasProgramadasHoy`()
BEGIN
    SELECT 
        COUNT(*) AS total_defensas_programadas_hoy
    FROM 
        defensa
    WHERE 
        DAYOFWEEK(fecha) = DAYOFWEEK(CURDATE());
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerTotalDefensasProgramadasMesActual`()
BEGIN
    SELECT 
        COUNT(*) AS total_defensas_programadas_mes_actual
    FROM 
        defensa
    WHERE 
        MONTH(fecha) = MONTH(CURDATE()) AND
        YEAR(fecha) = YEAR(CURDATE());
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerAreaAleatoria`()
BEGIN
    -- Selección aleatoria de un área
    SELECT id_area, nombre_area
    FROM area
    ORDER BY RAND()  -- Selección aleatoria
    LIMIT 1;
END$$
DELIMITER ;
