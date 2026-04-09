#  03) Data Persistence MySql

##  Descrição / Description

**PT-BR:** Este módulo representa a camada de infraestrutura completa do sistema. Ele é responsável por gerenciar a persistência em **MySQL**, logs de sistema e integrações com APIs externas (Stripe). A arquitetura foi desenhada para ser resiliente, utilizando Injeção de Dependência e o padrão Repository para isolar a lógica de negócio dos detalhes técnicos de IO (Entrada e Saída).

**EN-US:** This module represents the complete infrastructure layer of the system. It handles **MySQL** persistence, system logging, and external API integrations (Stripe). The architecture is designed for resilience, using Dependency Injection and the Repository pattern to isolate business logic from technical IO (Input/Output) details.

---

##  Estrutura de Arquivos / File Structure

###  External & Integration (APIs)
* **`External/ApiClient.php`**: 
    * **PT-BR:** Motor HTTP (cURL) genérico. Gerencia conexões, headers e bypass de SSL para ambiente Windows.
    * **EN-US:** Generic HTTP engine (cURL). Manages connections, headers, and SSL bypass for Windows environments.
* **`External/StripeProvider.php`**: 
    * **PT-BR:** Provedor especializado que traduz comandos do sistema para o formato da API do Stripe.
    * **EN-US:** Specialized provider that translates system commands into Stripe API format.
* **`External/index.php`**: 
    * **PT-BR:** Ponto de entrada (Maestro) que orquestra a Injeção de Dependência entre o Client e o Provider.
    * **EN-US:** Entry point (Maestro) that orchestrates Dependency Injection between Client and Provider.

### Database & Persistence (MySQL)
* **`Database/MySqlConnection.php`**: Gerenciador da conexão PDO (Singleton/Manager).
* **`Database/QueryBuilder.php`**: Abstração de SQL para garantir segurança contra SQL Injection.
* **`Database/TransactionManager.php`**: Gestão de integridade ACID (Commit/Rollback).
* **`Repositories/SqlOrderRepository.php` & `SqlUserRepository.php`**: Implementações que transformam registros do banco em objetos PHP.

###  Logging & Utilities
* **`Logging/FileLogger.php`**: Sistema de registro de eventos em arquivo (Padrão PSR-3).
* **`bin/console.php` & `server.php`**: Utilitários de linha de comando e servidor local.
* **`storage/Unit/clear_logs.php`**: Script de manutenção para limpeza de arquivos de log.

###  Quality Assurance (Tests)
* **`tests/Integration/OrderPersistenceTest.php`**: Valida o fluxo de salvar dados no MySQL.
* **`tests/Integration/PaymentFlowTest.php`**: Testa o caminho completo: Cobrança -> Resposta da API -> Log de Erro/Sucesso.

---
## 1. Relatório de Engenharia / Engineering Report

### Tabela de Desafios e Soluções / Challenges & Solutions Table

| Desafio / Challenge | Causa / Cause | Solução / Solution |
| :--- | :--- | :--- |
| **SQL Injection Risk** | Concatenação de variáveis em strings SQL. / Raw variables in SQL strings. | **Prepared Statements:** Sanitização profunda de entradas via PDO. / Deep input sanitization via PDO. |
| **SSL Handshake Fail** | Ambiente local sem certificados de autoridade. / Local environment lacking authority certificates. | Configuração de certificados globais e tratamento de erros de transporte. / Global certificate setup and transport error handling. |
| **Antivirus (Avast) Block** | Ferramentas de requisição detectadas como ameaças. / Request tools detected as threats. | Configuração de exceções e restauração de binários bloqueados. / Exception configuration and restoration of blocked binaries. |
| **Connection Refused / Access Denied** | Serviço MySQL offline ou credenciais incorretas (root). / MySQL service offline or incorrect credentials. | **DSN & Credential Sync:** Validação de portas e padronização de senhas no `MySqlConnection`. / Port validation and password standardization. |
| **Git Identity Error** | Falha na identificação do autor (e-mail/nome) no commit. / Git author identity (email/name) not configured. | **Git Config:** Definição global de `user.email` e `user.name` via CLI. / Global setup of user identity via CLI. |
| **Autoload Class Error** | Classes não encontradas após refatoração de pastas. / Classes not found after folder refactoring. | **Dump-Autoload:** Regeneração do mapeamento de classes via Composer. / Regenerating class mapping via Composer. |
| **Data Integrity Fail** | Conflitos em chaves estrangeiras (FK) e relacionamentos. / Foreign key and relationship conflicts. | **Transactions:** Implementação de operações atômicas (ACID). / Implementation of atomic operations (ACID). |
| **Log File Bloat** | Arquivos de texto crescendo até o limite de memória. / Text files growing to memory limits. | **Daily Rotation:** Arquivamento automático por Ano e Mês. / Automatic archiving by Year and Month. |
| **Path/Require Errors** | Inconsistência na árvore de diretórios local. / Local directory tree inconsistency. | **Flat Structure:** Simplificação do carregamento de arquivos. / File loading simplification. |
| **Data Inconsistency** | Dados nulos ou estruturados quebrando o fluxo de log. / Null or structured data breaking log flow. | **Type Casting:** Tratamento rigoroso de tipos de entrada. / Rigorous input type handling. |

---

### 2. Por que esta estrutura é interessante? / Why this structure?

* **Resiliência:** O uso de `TransactionManager` garante que, se a internet cair após uma cobrança ou ocorrer um erro de banco, os dados não fiquem inconsistentes (ACID).
* **Desacoplamento:** O `StripeProvider` não sabe "fazer" internet; ele recebe o `ApiClient` pronto. Isso é **Injeção de Dependência** aplicada para facilitar a troca de provedores.
* **Manutenibilidade:** Ao simplificar a árvore de diretórios para o ambiente local, eliminamos erros de `require` comuns no Windows, tornando o projeto mais ágil para prototipagem.
* **Rastreabilidade Profissional:** Com a configuração da **Identidade Git** e o uso de **Conventional Commits (feat)**, o histórico de evolução do sistema torna-se auditável, simulando um ambiente real de desenvolvimento colaborativo.


---
##  Conceitos Aprendidos / Concepts Learned

* **Injeção de Dependência (DI):** Inverter o controle para tornar as classes testáveis e independentes. / Inverting control to make classes testable and independent.
* **Gestão de Transações:** Entender a importância do Commit/Rollback para manter a integridade ACID em fluxos financeiros. / Understanding the importance of Commit/Rollback to maintain ACID integrity in financial flows.
* **Abstração de API:** Criação de um motor genérico (Client) para comunicação com qualquer serviço externo. / Creating a generic engine (Client) for communication with any external service.
* **Segurança de Dados:** Uso de Query Builders e Prepared Statements para blindar o banco contra SQL Injection. / Using Query Builders and Prepared Statements to shield the database against SQL Injection.
* **Identidade e Rastreabilidade (Git):** Configuração de perfis globais e entendimento de como o Git vincula autoria ao código. / Configuring global profiles and understanding how Git links authorship to code.
* **Conventional Commits:** Aplicação de padrões de mensagens (ex: `feat:`, `fix:`) para um histórico de projeto semântico e organizado. / Applying message standards (e.g., `feat:`, `fix:`) for a semantic and organized project history.
* **Gestão de Dependências (Composer):** Resolução de erros de mapeamento de classes através do comando `dump-autoload`. / Resolving class mapping errors using the `dump-autoload` command.
---

##  Como Testar / How to Test

**PT-BR:**
1. Navegue até a pasta desejada (ex: `External/` ou `tests/`).
2. Execute: `php index.php` ou `php PaymentFlowTest.php`.
3. Um erro **401** no console é um sinal de **Sucesso Técnico**: indica que a comunicação atravessou todas as camadas de software e hardware com sucesso.

**EN-US:**
1. Navigate to the desired folder (e.g., `External/` or `tests/`).
2. Run: `php index.php` or `php PaymentFlowTest.php`.
3. A **401** error in the console is a sign of **Technical Success**: it indicates that communication successfully passed through all software and hardware layers.
