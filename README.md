# Backend Seguro - Lista de Tarefas

Este repositório contém a lógica de negócio, modelos de dados e configurações de infraestrutura da aplicação **Lista de Tarefas**.

## 🛡️ Segurança por Design
Os arquivos presentes aqui foram propositalmente mantidos **fora do diretório público do servidor (htdocs)**. 
- **Motivo:** Impedir que arquivos sensíveis como `conexao.php` sejam lidos ou executados diretamente via navegador.
- **Arquitetura:** A pasta pública da aplicação faz o `require` desses arquivos utilizando caminhos relativos de nível superior.

## 📂 Arquivos Incluídos
- `conexao.php`: Classe de conexão com PDO.
- `tarefa_model.php`: Classe de objeto para representação das tarefas.
- `tarefa_service.php`: Métodos para operações de CRUD (Create, Read, Update, Delete).
- `tarefa_controller.php`: Intermediário entre a View e o Service.

## 🚀 Como utilizar
Estes arquivos devem ser clonados em um diretório acima do diretório público do seu servidor web (Ex: uma pasta paralela à `public_html` ou `htdocs`).