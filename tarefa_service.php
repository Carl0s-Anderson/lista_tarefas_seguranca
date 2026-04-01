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

  public function criar()
  {

    $query = 'insert into tb_tarefas(tarefa) values(:tarefa)';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
    $stmt->execute();
  } //criar
  public function recuperar()
  {

    $query = '
     select 
        t.id, s.status, t.tarefa 
      from 
        tb_tarefas as t 
      left join 
        tb_status as s on (t.id_status = s.id)';
    $stmt = $this->conexao->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
  public function atualizar( )
  { 
   $query = 'update tb_tarefas set tarefa = :tarefa where id = :id';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
    $stmt->bindValue(':id', $this->tarefa->__get('id'));
    return $stmt->execute();
  }
  public function deletar()
  { //deletar


  }
}
