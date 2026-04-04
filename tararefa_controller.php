<?php
require "tarefa_moidel.php";
require "tarefa_service.php";
require "conexao.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'inserir') {
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
        if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
            header('Location: index.php?sucesso=1');
        } else {
            header('Location: todas_tarefas.php?sucesso=1');
        }
     
    }
} elseif ($acao == 'excluir') {
    $tarefa = new tarefa();
    $tarefa->__set('id', $_GET['id']);

    $conexao = new conexao();
    $tarefaService = new Tarefa_service($conexao, $tarefa);
    $tarefaService->excluir();

     if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
            header('Location: index.php?sucesso=1');
        } else {
            header('Location: todas_tarefas.php?sucesso=1');
        }
}  elseif ($acao == 'mudarStatus') {
    $tarefa = new tarefa();
    $tarefa->__set('id', $_GET['id']);
    $tarefa->__set('id_status', 2);

    $conexao = new conexao();
    $tarefaService = new Tarefa_service($conexao, $tarefa);
    $tarefaService->marcarRealizada();

  
    if(isset($_GET['ajax']) && $_GET['ajax'] == 'true') {
        http_response_code(200);
        exit(); 
    }

    // Lógica antiga de fallback (redirecionamento)
    if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
        header('Location: index.php?sucesso=1');
    } else {
        header('Location: todas_tarefas.php?sucesso=1');
    }
} elseif ($acao == 'recuperarTarefasPendentes') {
    $tarefa = new tarefa();
    $tarefa->__set('id_status', 1); 
    $conexao = new conexao();
    $tarefaService = new Tarefa_service($conexao, $tarefa);
    
    // Mude de $tarefasPendentes para $tarefas
    $tarefas = $tarefaService->recuperarTarefasPendentes(); 
}