<?php

 interface State {
    public function concluir(Estado $estado);
    public function sinconcluir(Estado $estado);
    public function estarpendiente(Estado $estado);
    public function procesar(Estado $estado);
}