<?php
require "tarefa_moidel.php";
require "tarefa_service.php";
require "conexao.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if('$acao' == 'inserir') {
    $tarefa = new tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new conexao();
    $tarefaService = new Tarefa_service($conexao, $tarefa);
    $tarefaService->criar();
    header('Location: nova_tarefa.php?sucesso=1');
} elseif ($acao == 'recuperar') {
    $tarefa = new tarefa();
    $conexao = new conexao();
    $tarefaService = new Tarefa_service($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar();
} elseif ($acao == 'atualizar') {
   $tarefa = new tarefa();
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new conexao();
  $tarefaService = new Tarefa_service($conexao, $tarefa);
    if ($tarefaService->atualizar()) {
        header('Location: index.php?sucesso=1');
    }
} 