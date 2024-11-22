DELIMITER $$

CREATE TRIGGER after_defensa_update
AFTER UPDATE ON defensa
FOR EACH ROW
BEGIN
    -- Verificar si la nota ha cambiado y si es diferente de null
    IF OLD.nota != NEW.nota AND NEW.nota IS NOT NULL THEN
        -- Si la defensa es interna, aumentamos el intento en la tabla estudiante
        IF NEW.tipo_defensa = 'Defensa interna' THEN
            UPDATE estudiante
            SET intentos_interna = intentos_interna + 1
            WHERE id_estudiante = NEW.id_estudiante;
        END IF;

        -- Si la defensa es externa, aumentamos el intento en la tabla estudiante
        IF NEW.tipo_defensa = 'Defensa externa' THEN
            UPDATE estudiante
            SET intentos_externa = intentos_externa + 1
            WHERE id_estudiante = NEW.id_estudiante;
        END IF;
    END IF;
END $$

DELIMITER ;
