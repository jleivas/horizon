<?PHP

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Correccion.php");
class CorreccionDao {
        public static function sqladdId(){
                $bd=new BD();
                $var = 0;
                $misRegistros= $bd->sqlSelectTodo("SELECT MAX(co_id) as id FROM `correction`");
                foreach($misRegistros as $fila) 
                {$var=$fila['id'];}
                $var=$var+1;
                return $var;
        }
        public static function sqlInsert( $co)
        {
                $stSql  = "insert into correction (";
                $stSql .= " `co_id`, `evaluacion_ev_id`, `treatment_tr_id`, `action1_ac_id`, `authoract1_au_id`, `action2_ac_id`, `authoract2_au_id`, `condicion1_cn_id`, `authorcond1_au_id`, `condicion2_cn_id`, `authorcond2_au_id`, `co_plan_action`, `co_plan_condicion`, `user_us_cod`, `co_status`";
                $stSql .= " )values (";
                $stSql .= " '{$co->getId()}'"
                        . ",'{$co->getIdEval()}'"
                        . ",'{$co->getTratamiento()}'"
                        . ",'{$co->getAccion1()}'"
                        . ",'{$co->getRespAccion1()}'"
                        . ",'{$co->getAccion2()}'"
                        . ",'{$co->getRespAccion2()}'"
                        . ",'{$co->getCondicion1()}'"
                        . ",'{$co->getRespCondicion1()}'"
                        . ",'{$co->getCondicion2()}'"
                        . ",'{$co->getRespCondicion2()}'"
                        . ",'{$co->getPlanAccion()}'"
                        . ",'{$co->getPlanCondicion()}'"
                        . ",'{$co->getIdUser()}'"
                        . ",'{$co->getStatus()}'"
                        . ")";
                        return BD::getInstance()->sqlEjecutar($stSql);
        }
        public static function sqlBuscar($param)
        {
                $stSql = "select * from correction WHERE co_id = {$param}";
                return BD::getInstance()->sqlSelectTodo($stSql);
        }
        public static function sqlUpdate( $re)
        {
                $stSql =  "update correction SET ";
                $stSql .= " treatment_tr_id='{$re->getTratamiento()}'"
                        . ",action1_ac_id='{$re->getAccion1()}'"
                        . ",authoract1_au_id='{$re->getRespAccion1()}'"
                        . ",action2_ac_id='{$re->getAccion2()}'"
                        . ",authoract2_au_id='{$re->getRespAccion2()}'"
                        . ",condicion1_cn_id='{$re->getCondicion1()}'"
                        . ",authorcond1_au_id='{$re->getRespCondicion1()}'"
                        . ",condicion2_cn_id='{$re->getCondicion2()}'"
                        . ",authorcond2_au_id   ='{$re->getRespCondicion2()}'"
                        . ",co_plan_action   ='{$re->getPlanAccion()}'"
                        . ",co_plan_condicion   ='{$re->getPlanCondicion()}'"
                        . ",user_us_cod   ='{$re->getIdUser()}'"
                        . ",co_status='{$re->getStatus()}'"
                        ;
                $stSql .= " Where  co_id='{$re->getId()}'"
                        ;
                return BD::getInstance()->sqlEjecutar($stSql);
        }
        public static function sqlCargar( $id)
        {
                $stSql =  "select *  from  correction ";
                $stSql .= " Where  co_id = {$id}"
                                ;
                $resultado= BD::getInstance()->sqlSelect($stSql);
                $fila= BD::getInstance()->sqlFetch();
                if (!$fila) return null;
                $coAux = new Correccion($fila["co_id"]
                                        ,$fila["evaluacion_ev_id"]
                                        ,$fila["treatment_tr_id"]
                                        ,$fila["action1_ac_id"]
                                        ,$fila["authoract1_au_id"]
                                        ,$fila["action2_ac_id"]
                                        ,$fila["authoract2_au_id"]
                                        ,$fila["condicion1_cn_id"]
                                        ,$fila["authorcond1_au_id"]
                                        ,$fila["condicion2_cn_id"]
                                        ,$fila["authorcond2_au_id"]
                                        ,$fila["co_plan_action"]
                                        ,$fila["co_plan_condicion"]
                                        ,$fila["user_us_cod"]
                                        ,$fila["co_status"]
                                );
                return $coAux;
        }

        public static function sqlCargarFromEvaluacion( $idEval)
        {
                $stSql =  "select *  from  correction ";
                $stSql .= " Where  evaluacion_ev_id = {$idEval}"
                                ;
                $resultado= BD::getInstance()->sqlSelect($stSql);
                $fila= BD::getInstance()->sqlFetch();
                if (!$fila) return null;
                $coAux = new Correccion($fila["co_id"]
                                        ,$fila["evaluacion_ev_id"]
                                        ,$fila["treatment_tr_id"]
                                        ,$fila["action1_ac_id"]
                                        ,$fila["authoract1_au_id"]
                                        ,$fila["action2_ac_id"]
                                        ,$fila["authoract2_au_id"]
                                        ,$fila["condicion1_cn_id"]
                                        ,$fila["authorcond1_au_id"]
                                        ,$fila["condicion2_cn_id"]
                                        ,$fila["authorcond2_au_id"]
                                        ,$fila["co_plan_action"]
                                        ,$fila["co_plan_condicion"]
                                        ,$fila["user_us_cod"]
                                        ,$fila["co_status"]
                                );
                return $coAux;
        }
        // MÃ©todo que ejecuta una sentencia,
        // Sin embargo no retorna ningÃºn registro
        public static function sqlSelect( $re)
        {
                $stSql =  "select *  from  correction ";
                $stSql .= " Where  co_id ={$re->getId()}";
                $resultado= BD::getInstance()->sqlSelect($stSql);
                if(!$resultado) return false;
                return true;
        }
        
        public static function sqlFetch()
        {
                $fila= BD::getInstance()->sqlFetch();
                if (!$fila) return null;
                $coAux = new Correccion($fila["co_id"]
                ,$fila["evaluacion_ev_id"]
                ,$fila["treatment_tr_id"]
                ,$fila["action1_ac_id"]
                ,$fila["authoract1_au_id"]
                ,$fila["action2_ac_id"]
                ,$fila["authoract2_au_id"]
                ,$fila["condicion1_cn_id"]
                ,$fila["authorcond1_au_id"]
                ,$fila["condicion2_cn_id"]
                ,$fila["authorcond2_au_id"]
                ,$fila["co_plan_action"]
                ,$fila["co_plan_condicion"]
                ,$fila["user_us_cod"]
                ,$fila["co_status"]
        );
        }
        public static function sqlFetchCorreccion($re)
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
                $stSql = "select * from correction WHERE co_id = {$param}";
                return BD::getInstance()->sqlEjecutar($stSql);
        }

        public static function sqlTodo()
        {   
        $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `correction`");
        return $misRegistros;
        }

        public static function sqlTodoPorLugar($param)
        {   
        $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `correction` WHERE place_pl_id = {$param}");
        return $misRegistros;
        }

        public static function sqlListar()
        {   
        $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `correction` WHERE ev_status = 1");
        return $misRegistros;
        }

}
?>