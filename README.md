# 🧠 Core & Segurança - App Lista de Tarefas

Bem-vindo ao **núcleo da aplicação** Lista de Tarefas. Este repositório contém exclusivamente a regra de negócios, a modelagem de dados e a camada de segurança do sistema. 

Nenhum destes arquivos possui interface gráfica (HTML/CSS), pois eles compõem a **camada de backend protegida**, projetada para rodar de forma invisível e segura no servidor.

## 🔐 Arquitetura de Segurança (Security by Design)

O grande diferencial deste projeto é a sua topologia de diretórios. Todo o conteúdo deste repositório foi arquitetado para residir **fora do diretório público (`htdocs` ou `public_html`)** do servidor web.

**Por que essa abordagem?**
1. **Proteção de Credenciais:** O arquivo `conexao.php` possui dados sensíveis do banco (usuário, senha, host). Ao mantê-lo fora da raiz pública, é impossível que um invasor acesse o arquivo diretamente via URL.
2. **Prevenção contra injeção de código:** O acesso aos scripts PHP só ocorre de forma indireta e controlada pelas `Views` públicas.
3. **Isolamento de Responsabilidades:** Separação clara entre o que o usuário vê (Frontend) e como o sistema pensa (Backend).

---

## ⚙️ Padrões de Projeto e Tecnologias

Este backend foi desenvolvido utilizando **PHP Orientado a Objetos (POO)** e implementa conceitos de arquitetura limpa:

* **PDO (PHP Data Objects):** Utilizado para todas as conexões e queries. O uso rigoroso de `prepare()` e `bindValue()` blinda a aplicação contra ataques de *SQL Injection*.
* **Modelagem de Dados:** Uso de métodos mágicos (`__get` e `__set`) para encapsulamento perfeito dos atributos.
* **Service Pattern:** Isolamento das operações de CRUD em uma classe dedicada, mantendo o Controller limpo e focado apenas no roteamento das requisições.

---

## 📂 Estrutura do Core

A estrutura de arquivos foi dividida seguindo um padrão MVC simplificado para o backend:

* `conexao.php`: Responsável por instanciar a comunicação segura com o banco MySQL utilizando o bloco `try/catch` para tratamento de exceções.
* `tarefa_moidel.php`: A classe (Model) que espelha as tabelas do banco de dados na aplicação, tipando e estruturando a informação.
* `tarefa_service.php`: O "motor" do CRUD. Contém as queries de inserção, deleção, atualização e consultas (incluindo `JOIN` para trazer o status textual das tarefas).
* `tararefa_controller.php`: O maestro da orquestra. Intercepta as ações enviadas pelo frontend via `GET` ou `POST`, instancia os objetos necessários e devolve a resposta adequada (incluindo suporte a requisições assíncronas via API Fetch).

## 🚀 Como integrar com o Frontend

Para que o sistema funcione corretamente:
1.  Aloque este repositório em uma pasta imediatamente **anterior** à sua pasta pública no servidor (ex: `/var/www/lista_tarefas_seguranca/`).
2.  Configure o arquivo `conexao.php` com as credenciais do seu banco de dados local.
3.  Garanta que o projeto Frontend (Frontend Público) esteja apontando o `require_once` para o caminho relativo correto do `tararefa_controller.php`.