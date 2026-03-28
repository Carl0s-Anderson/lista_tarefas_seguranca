<?php
require "tarefa_moidel.php";
require "tarefa_service.php";
require "conexao.php";



$tarefa = new tarefa();
$tarefa->__set('tarefa', $_POST['tarefa']);

$conexao = new conexao();
$tarefaService = new Tarefa_service($conexao, $tarefa);
$tarefaService->criar();

header('Location: nova_tarefa.php?sucesso=1');