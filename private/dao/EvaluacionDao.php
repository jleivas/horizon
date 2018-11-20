<?PHP

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Evaluacion.php");
class EvaluacionDao {
        public static function sqladdId(){
                $bd=new BD();
                $misRegistros= $bd->sqlSelectTodo("SELECT MAX(ev_id) FROM `evaluacion`");
                foreach($misRegistros as $fila) 
                {$var=$fila['MAX(ev_id)'];}
                $var=$var+1;
                return $var;
        }
        public static function sqlInsert( $re)
        {
                $stSql  = "insert into evaluacion (";
                $stSql .= " `ev_id`, `ev_object`, `ev_zone`, `tipo_riesgo_tp_id`, `causa_ca_id`, `result_re_id`, `ev_atract`, `ev_exp`, `ev_deb`, `place_pl_id`, `ev_status`";
                $stSql .= " )values (";
                $stSql .= " '{$re->getId()}'"
                        . ",'{$re->getObject()}'"
                        . ",'{$re->getZone()}'"
                        . ",'{$re->getIdTipoRiesgo()}'"
                        . ",'{$re->getIdCausa()}'"
                        . ",'{$re->getIdResult()}'"
                        . ",'{$re->getAtract()}'"
                        . ",'{$re->getExp()}'"
                        . ",'{$re->getDeb()}'"
                        . ",'{$re->getIdPlace()}'"
                        . ",'{$re->getStatus()}'"
                        . ")";
                        return BD::getInstance()->sqlEjecutar($stSql);
        }
        public static function sqlBuscar($param)
        {
                $stSql = "select * from evaluacion WHERE ev_id = {$param}";
                return BD::getInstance()->sqlSelectTodo($stSql);
        }
        public static function sqlUpdate( $re)
        {
                $stSql =  "update evaluacion SET ";
                $stSql .= " ev_object='{$re->getObject()}'"
                        . ",ev_zone='{$re->getZone()}'"
                        . ",tipo_riesgo_tp_id='{$re->getIdTipoRiesgo()}'"
                        . ",causa_ca_id='{$re->getIdCausa()}'"
                        . ",result_re_id='{$re->getIdResult()}'"
                        . ",ev_atract='{$re->getAtract()}'"
                        . ",ev_exp='{$re->getExp()}'"
                        . ",ev_deb='{$re->getDeb()}'"
                        . ",place_pl_id='{$re->getIdPlace()}'"
                        . ",ev_status='{$re->getStatus()}'"
                        ;
                $stSql .= " Where  ev_id='{$re->getId()}'"
                        ;
                return BD::getInstance()->sqlEjecutar($stSql);
        }
        public static function sqlCargar( $id)
        {
                $stSql =  "select *  from  evaluacion ";
                $stSql .= " Where  ev_id = {$id}"
                                ;
                $resultado= BD::getInstance()->sqlSelect($stSql);
                $fila= BD::getInstance()->sqlFetch();
                if (!$fila) return null;
                $reAux = new Evaluacion($fila["ev_id"]
                                        ,$fila["ev_object"]
                                        ,$fila["ev_zone"]
                                        ,$fila["tipo_riesgo_tp_id"]
                                        ,$fila["causa_ca_id"]
                                        ,$fila["ev_atract"]
                                        ,$fila["ev_exp"]
                                        ,$fila["ev_deb"]
                                        ,$fila["result_re_id"]
                                        ,$fila["place_pl_id"]
                                        ,$fila["ev_status"]
                                );
                return $reAux;
        }
        // MÃ©todo que ejecuta una sentencia,
        // Sin embargo no retorna ningÃºn registro
        public static function sqlSelect( $re)
        {
                $stSql =  "select *  from  evaluacion ";
                $stSql .= " Where  ev_id ={$re->getId()}";
                $resultado= BD::getInstance()->sqlSelect($stSql);
                if(!$resultado) return false;
                return true;
        }
        
        public static function sqlFetch()
        {
                $fila= BD::getInstance()->sqlFetch();
                if (!$fila) return null;
                        $reAux = new Evaluacion($fila["ev_id"]
                                        ,$fila["ev_object"]
                                        ,$fila["ev_zone"]
                                        ,$fila["tipo_riesgo_tp_id"]
                                        ,$fila["causa_ca_id"]
                                        ,$fila["ev_atract"]
                                        ,$fila["ev_exp"]
                                        ,$fila["ev_deb"]
                                        ,$fila["result_re_id"]
                                        ,$fila["place_pl_id"]
                                        ,$fila["ev_status"]
                                );
        }
        public static function sqlFetchEvaluacion($re)
        {
                $fila= BD::getInstance()->sqlFetch();
                if (!$fila) return false;
                $re->setId($fila["ev_id"]);
                $re->setObject($fila["ev_object"]);
                $re->setZone($fila["ev_zone"]);
                $re->setIdTipoRiesgo($fila["tipo_riesgo_tp_id"]);
                $re->setIdCausa($fila["causa_ca_id"]);
                $re->setAtract($fila["ev_atract"]);
                $re->setExp($fila["ev_exp"]);
                $re->setDeb($fila["ev_deb"]);
                $re->setIdResult($fila["result_re_id"]);
                $re->setIdPlace($fila["place_pl_id"]);
                $re->setStatus($fila["ev_status"]);
                return true;						  
        }
        public static function sqlExiste($param)
        {
                $stSql = "select * from evaluacion WHERE ev_id = {$param}";
                return BD::getInstance()->sqlEjecutar($stSql);
        }

        public static function sqlTodo()
        {   
        $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `evaluacion`");
        return $misRegistros;
        }

        public static function sqlTodoPorLugar($param)
        {   
        $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `evaluacion` WHERE place_pl_id = {$param}");
        return $misRegistros;
        }

        public static function sqlListar()
        {   
        $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `evaluacion` WHERE ev_status = 1");
        return $misRegistros;
        }

}
?>