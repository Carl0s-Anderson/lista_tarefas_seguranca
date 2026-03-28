<?php
class Tarefa_service
{
  private $conexao;
  private $tarefa;


  public function __construct(conexao $conexao, tarefa $tarefa)
  {

    $this->conexao = $conexao->conectar();
    $this->tarefa = $tarefa;
  }

  public function criar() {

    $query = 'insert into tb_tarefas(tarefa) values(:tarefa)';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
    $stmt->execute();
  } //criar
  public function recuperar()
  { // lera


  }
  public function atualizar()
  { //atualizar


  }
  public function deletar()
  { //deletar


  }
}
