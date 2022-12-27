<?php
class State {

    public static $OPEN = "OPEN";
    public static $IN_PROGRESS = "IN_PROGRESS";
    public static $READY = "READY";
    public static $CANCELED = "CANCELED";
    public static $CLOSED = "CLOSED";

    final public static function getDisplayText($status){
        switch($status) {
            case State::$OPEN:
                return "Aberto";
            case State::$IN_PROGRESS:
                return "Em Progresso";
            case State::$READY:
                return "Pronto";
            case State::$CANCELED:
                return "Cancelada";
            case State::$CLOSED:
                return "Fechada";
        }
    return "estado invalido";
    }
}
?>
