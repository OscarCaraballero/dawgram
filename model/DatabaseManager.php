<?php

//require_once 'db/DB.php';
//
//class DatabaseManager extends BD {
//
//    protected $tableUsers = "incidencias.Usuarios";
//    protected $tableClients = "incidencias.Clientes";
//    protected $tableIncidences = "incidencias.Incidencias";
//    protected $tableErroresKiu = "incidencias.cnf_errores";
//    protected $tableAAVV = "directorio_AAVV.Directorio_Agencias";
//    protected $tableDirector = "directorio_AAVV.Contactos";
//    protected $id = "Nombre";
//    protected $idIncidences = "idIncidencias";
//    protected $idEmpresa = "idEmpresa";
//    protected $passwd = "Password";
//    protected $company = "Empresa";
//
//    public function __construct() {
//        parent::__construct();
//    }
//
//    public function findIncidence($id) {
//        try {
//            $query = $this->conn->prepare("SELECT * FROM {$this->tableIncidences} WHERE {$this->idIncidences} = :id");
//            $query->bindParam(':id', $id, PDO::PARAM_INT);
//            $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//
//        return $query->fetchAll(PDO::FETCH_ASSOC);
//    }
//
//    public function findUser($id, $passwd) {
//        try {
//            $query = $this->conn->prepare("
//	        SELECT *
//	        FROM {$this->tableUsers}
//	        WHERE {$this->id} = :id
//                    AND {$this->passwd} = :passwd
//	      ");
//            $query->bindParam(':id', $id, PDO::PARAM_STR);
//            $query->bindParam(':passwd', $passwd, PDO::PARAM_STR);
//            $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//
//        return $query->fetchAll(PDO::FETCH_ASSOC);
//    }
//
//    public function findIncidencesMain() {
//        try {
//            if ($_SESSION['search'] != 1) {
//                $query = $this->conn->prepare("SELECT i.idIncidencias,i.Fecha,i.Solucionado, i.NMaletas, i.Comentario,(SELECT NombreReal FROM incidencias.Usuarios 
//                WHERE Nombre=i.Usuarios_Nombre LIMIT 0,1) as Usuarios_Nombre,i.Clientes_Empresa,i.FechaResuelto, 
//                        (SELECT NombreReal FROM incidencias.Usuarios WHERE Nombre=i.UsuarioResolv LIMIT 0,1) as UsuarioResolv,i.Problema,i.Canal 
//                        FROM incidencias.Incidencias as i WHERE Solucionado = 'NO' "
//                        . "AND Usuarios_Nombre IN ((SELECT Nombre FROM {$this->tableUsers} WHERE idRolUsuarios = {$_SESSION['search']})) ORDER BY Fecha ASC LIMIT 0, 10");
//            } else {
//                $query = $this->conn->prepare("SELECT i.idIncidencias,i.Fecha,i.NMaletas,i.Solucionado,i.Comentario,(SELECT NombreReal FROM incidencias.Usuarios 
//                WHERE Nombre=i.Usuarios_Nombre LIMIT 0,1) as Usuarios_Nombre,i.Clientes_Empresa,i.FechaResuelto, 
//                        (SELECT NombreReal FROM incidencias.Usuarios WHERE Nombre=i.UsuarioResolv LIMIT 0,1) as UsuarioResolv,i.Problema,i.Canal 
//                        FROM incidencias.Incidencias as i WHERE Solucionado = 'NO' ORDER BY Fecha ASC LIMIT 0, 10");
//            }
//            $query->execute();
//        } catch (Exception $e) {
//            return $e->getMessage();
//        }
//
//        return $query->fetchAll(PDO::FETCH_ASSOC);
//    }
//
//    public function findIncidencesAll() {
//        $count1 = $_SESSION['count'];
//        $count2 = 500;
//        $arrayFilter = $_SESSION['filter'];
//
//        $filter = "";
//
//        if (!empty($arrayFilter)) {
//            if (!is_null($arrayFilter['Atendio']) && $arrayFilter['Atendio'] != "")
//                $filter .= ' AND Usuarios_Nombre = (SELECT Nombre from incidencias.Usuarios where NombreReal ="' . $arrayFilter['Atendio'] . '")';
//            if (!is_null($arrayFilter['Resolvio']) && $arrayFilter['Resolvio'] != "")
//                $filter .= ' AND UsuarioResolv = (SELECT Nombre from incidencias.Usuarios where NombreReal ="' . $arrayFilter['Resolvio'] . '")';
//            if (!is_null($arrayFilter['Solucionado']) && $arrayFilter['Solucionado'] != "")
//                $filter .= ' AND Solucionado ="' . $arrayFilter['Solucionado'] . '" ';
//            if (!is_null($arrayFilter['Fecha']) && $arrayFilter['Fecha'] != "")
//                $filter .= ' AND DATE_FORMAT(Fecha, "%d/%m/%Y") ="' . $arrayFilter['Fecha'] . '" ';
//        }
//
//        try {
//            if ($_SESSION['search'] != 1) {
//                $query = $this->conn->prepare("SELECT i.idIncidencias,i.Fecha,i.Solucionado,i.Comentario,(SELECT NombreReal FROM incidencias.Usuarios 
//                WHERE Nombre=i.Usuarios_Nombre LIMIT 0,1) as Usuarios_Nombre,i.Clientes_Empresa,i.FechaResuelto, 
//                        (SELECT NombreReal FROM incidencias.Usuarios WHERE Nombre=i.UsuarioResolv LIMIT 0,1) as UsuarioResolv,i.Problema,i.Canal 
//                        FROM incidencias.Incidencias as i "
//                        . "WHERE Usuarios_Nombre IN ((SELECT Nombre FROM {$this->tableUsers} WHERE idRolUsuarios = {$_SESSION['search']})) "
//                        . "AND Solucionado IN ('SI', 'NO') $filter ORDER BY Fecha DESC LIMIT {$count1}, {$count2}");
//            } else {
//                $query = $this->conn->prepare("SELECT i.idIncidencias,i.Fecha,i.Solucionado,i.Comentario,(SELECT NombreReal FROM incidencias.Usuarios 
//                WHERE Nombre=i.Usuarios_Nombre LIMIT 0,1) as Usuarios_Nombre,i.Clientes_Empresa,i.FechaResuelto, 
//                        (SELECT NombreReal FROM incidencias.Usuarios WHERE Nombre=i.UsuarioResolv LIMIT 0,1) as UsuarioResolv,i.Problema,i.Canal 
//                        FROM incidencias.Incidencias as i WHERE Solucionado IN ('SI', 'NO') $filter ORDER BY Fecha DESC LIMIT {$count1}, {$count2}");
//            }
//            $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//
//        return $query->fetchAll(PDO::FETCH_ASSOC);
//    }
//
//    public function findCompanies() {
//        try {
//            $query = $this->conn->prepare("SELECT TELEFONO_OFICIAL, EMAIL_OFICIAL, NOMBRE_COMERCIAL, 
//			(SELECT NOMBRE_Y_APELLIDOS FROM {$this->tableDirector} WHERE ID_AGENCIA = ID_DIRECTORIO AND TIPO = 'DIRECTOR') as DIRECTOR
//			FROM {$this->tableAAVV} WHERE ESTADO='FIRMADO' GROUP BY NOMBRE_COMERCIAL");
//            $query->execute();
//        } catch (Exception $e) {
//            print_r($e->getMessage());
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//
//        return $query->fetchAll(PDO::FETCH_ASSOC);
//    }
//
//    public function findCount() {
//        $count1 = $_SESSION['count'];
//        $count2 = 500;
//        $arrayFilter = $_SESSION['filter'];
//
//        $filter = "";
//
//        if (!empty($arrayFilter)) {
//            if (!is_null($arrayFilter['Atendio']) && $arrayFilter['Atendio'] != "")
//                $filter .= ' AND Usuarios_Nombre = (SELECT Nombre from incidencias.Usuarios where NombreReal ="' . $arrayFilter['Atendio'] . '")';
//            if (!is_null($arrayFilter['Resolvio']) && $arrayFilter['Resolvio'] != "")
//                $filter .= ' AND UsuarioResolv = (SELECT Nombre from incidencias.Usuarios where NombreReal ="' . $arrayFilter['Resolvio'] . '")';
//            if (!is_null($arrayFilter['Solucionado']) && $arrayFilter['Solucionado'] != "")
//                $filter .= ' AND Solucionado ="' . $arrayFilter['Solucionado'] . '" ';
//            if (!is_null($arrayFilter['Fecha']) && $arrayFilter['Fecha'] != "")
//                $filter .= ' AND DATE_FORMAT(Fecha, "%d/%m/%Y") ="' . $arrayFilter['Fecha'] . '" ';
//        }
//
//        try {
//            if ($_SESSION['search'] != 1) {
//                $query = $this->conn->prepare("SELECT count(*) as count FROM incidencias.Incidencias "
//                        . "WHERE Usuarios_Nombre IN ((SELECT Nombre FROM {$this->tableUsers} WHERE idRolUsuarios = {$_SESSION['search']})) "
//                        . "AND Solucionado IN ('SI', 'NO') $filter ORDER BY Solucionado, Fecha ASC");
//            } else {
//                $query = $this->conn->prepare("SELECT count(*) as count "
//                        . "FROM incidencias.Incidencias WHERE Solucionado IN ('SI', 'NO') $filter");
//            }
//            $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//
//        return $query->fetchAll(PDO::FETCH_ASSOC);
//    }
//
//    public function insertIncidences($data = array()) {
//        try {
//            $query = $this->conn->prepare("
//	        INSERT INTO $this->tableIncidences 
//	        (" . implode(', ', array_keys($data)) . ")
//	        VALUES
//	        (:" . implode(', :', array_keys($data)) . ")
//	      ");
//
//            foreach ($data as $key => &$val) {
//                $query->bindParam($key, $val, PDO::PARAM_STR);
//            }
//
//            return $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//    }
//
//    public function insertCompany($data = array()) {
//
//        try {
//            $query = $this->conn->prepare("
//	        INSERT INTO $this->tableClients
//	        (" . implode(', ', array_keys($data)) . ")
//	        VALUES
//	        (:" . implode(', :', array_keys($data)) . ")
//	      ");
//
//            foreach ($data as $key => &$val) {
//                $query->bindParam($key, $val, PDO::PARAM_STR);
//            }
//
//            return $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//    }
//
//    public function updateIncidence($id, $data = array()) {
//        foreach ($data as $key => $value) {
//            $update_str[] = "{$key} = :{$key}";
//        }
//
//        try {
//            $query = $this->conn->prepare("
//	        UPDATE $this->tableIncidences SET
//	        " . implode(',', $update_str) . "
//	        WHERE {$this->idIncidences} = :id
//	      ");
//
//            foreach ($data as $key => &$val) {
//                $query->bindParam($key, $val, PDO::PARAM_STR);
//            }
//
//            $query->bindParam(':id', $id, PDO::PARAM_INT);
//
//            return $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//    }
//
//    public function updateCompany($id, $data = array()) {
//        foreach ($data as $key => $value) {
//            $update_str[] = "{$key} = :{$key}";
//        }
//
//        try {
//            $str_query = "
//	        UPDATE $this->tableClients SET
//	        " . implode(',', $update_str) . "
//	        WHERE {$this->idEmpresa} = :id
//	      ";
//            $query = $this->conn->prepare($str_query);
//            foreach ($data as $key => &$val) {
//                $query->bindParam($key, $val, PDO::PARAM_STR);
//            }
//
//            $query->bindParam(':id', $id, PDO::PARAM_INT);
//
//            return $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//    }
//
//    public function updatePasswd($username, $passwd) {
//        try {
//            $query = $this->conn->prepare("UPDATE $this->tableUsers SET Password = '{$passwd}'  WHERE Nombre = '{$username}'");
//            return $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//    }
//
//    protected function delete($id) {
//        //return parent::delete($id);
//    }
//
//    //--------------------------------ErroresKIU--------------------------------
//
//    public function delError($id) {
//        try {
//            $query = $this->conn->prepare("DELETE FROM $this->tableErroresKiu WHERE id_error={$id}");
//            return $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//    }
//
//    public function getError() {
//        try {
//            $query = $this->conn->prepare("SELECT * FROM $this->tableErroresKiu");
//            $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//        return $query->fetchAll(PDO::FETCH_ASSOC);
//    }
//
//    function getErrorStats($tipo) {
//        $query = "";
//        switch ($tipo) {
//            case "mes":
//                try {
//                    $query = $this->conn->prepare("SELECT MONTH(fecha) as x,COUNT(id_error) as cuantos FROM $this->tableErroresKiu GROUP BY MONTH(fecha) order by MONTH(fecha)");
//                    $query->execute();
//                } catch (Exception $e) {
//                    return "No se ha podido establecer contacto con la base de datos";
//                }
//                break;
//            case "hora":
//                try {
//                    $query = $this->conn->prepare("SELECT HOUR(fecha) as x, COUNT(id_error) as cuantos FROM $this->tableErroresKiu GROUP BY HOUR(fecha) order by HOUR(fecha)");
//                    $query->execute();
//                } catch (Exception $e) {
//                    return "No se ha podido establecer contacto con la base de datos";
//                }
//                break;
//        }
//        return $query->fetchAll(PDO::FETCH_ASSOC);
//        ;
//    }
//
//    public function insertErrores($data = array()) {
//
//        try {
//            $query = $this->conn->prepare("
//	        INSERT INTO $this->tableErroresKiu 
//	        (" . implode(', ', array_keys($data)) . ")
//	        VALUES
//	        (:" . implode(', :', array_keys($data)) . ")
//	      ");
//
//            foreach ($data as $key => &$val) {
//                $query->bindParam($key, $val, PDO::PARAM_STR);
//            }
//
//            return $query->execute();
//        } catch (Exception $e) {
//            return "No se ha podido establecer contacto con la base de datos";
//        }
//    }
//
//}
