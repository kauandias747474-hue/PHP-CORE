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
| **Path/Require Errors** | Inconsistência na árvore de diretórios local. / Local directory tree inconsistency. | **Flat Structure:** Simplificação do carregamento de arquivos. / File loading simplification. 
| **Data Inconsistency** | Dados nulos ou estruturados quebrando o fluxo de log. / Null or structured data breaking log flow. | **Type Casting:** Tratamento rigoroso de tipos de entrada. / Rigorous input type handling. |
| **Antivirus (Avast) Block** | Falsos positivos detectando binários do PHP/XAMPP como ameaças (**IDP.Generic**). / False positives detecting PHP binaries as threats. | **Exceções / Exceptions:** Configuração de pastas seguras e restauração de arquivos da Quarentena. / Folders whitelist and file restoration. |
| **Connection Refused (3307)** | Conflito de portas no XAMPP (MySQL rodando fora do padrão 3306). / Port conflict (MySQL running on non-standard port). | **DSN Port Mapping:** Especificação explícita da porta `:3307` na string de conexão PDO. / Explicitly defining port 3307 in the PDO DSN. |
| **Unknown Database (1049)** | Tentativa de conexão com banco de dados inexistente no MySQL. / Attempting to connect to a non-existent database. | **Schema Setup:** Criação manual do banco `modulo3php` via phpMyAdmin no XAMPP. / Manually creating the database via phpMyAdmin. |
| **Undefined Variable ($db)** | Variável do banco de dados referenciada no DSN sem definição prévia. / Database variable used in DSN before being defined. | **Variable Debugging:** Definição correta da variável `$db` antes da montagem da string DSN. / Defining the `$db` variable before DSN assembly. |
| **Git Identity Error** | Falha na identificação do autor (e-mail/nome) ao realizar o commit. / Failed author identity during commit. | **Git Config:** Configuração global de `user.name` e `user.email` via CLI. / Global setup of user identity via terminal. |
| **SQL Injection Risk** | Concatenação de variáveis em strings SQL brutas. / Raw variable concatenation in SQL strings. | **Prepared Statements:** Uso de `prepare()` e `execute()` via PDO para sanitização. / Using PDO prepared statements for deep sanitization. |
| **Outline Inconsistency** | Erros de sintaxe ou bloqueio de leitura impedindo o mapeamento do VS Code. / Syntax errors or read blocks breaking VS Code mapping. | **Refactoring:** Correção de chaves `{}` e validação de permissões de arquivo. / Fixing braces and validating file permissions. |
| **Data Inconsistency** | Dados nulos ou tipos incompatíveis quebrando o fluxo dos Repositories. / Null or mismatched data types breaking repository logic. | **Type Casting:** Tratamento rigoroso de tipos e validação de retorno (ACID). / Rigorous input handling and return validation. |


---

### 2. Por que esta estrutura é interessante? / Why this structure?

* **Resiliência (ACID):** O uso de `TransactionManager` garante que, se a internet cair após uma cobrança ou ocorrer um erro de banco, os dados não fiquem inconsistentes. / *The use of TransactionManager ensures that if the connection drops or a database error occurs, the data remains consistent (ACID).*
* **Desacoplamento (Dependency Injection):** O `StripeProvider` não sabe "fazer" internet; ele recebe o `ApiClient` pronto. Isso facilita a troca de provedores e manutenção. / *StripeProvider doesn't "make" internet; it receives a ready ApiClient. This Dependency Injection facilitates provider swapping and maintenance.*
* **Manutenibilidade (Flat Structure):** Ao simplificar a árvore de diretórios para o ambiente local, eliminamos erros de `require` comuns no Windows, tornando o projeto mais ágil. / *By simplifying the local directory tree, we eliminated common Windows "require" errors, making the project more agile for prototyping.*
* **Rastreabilidade Profissional (Git Identity):** Com a configuração da Identidade Git e o uso de Conventional Commits, o histórico de evolução torna-se auditável e colaborativo. / *Professional traceability with Git Identity and Conventional Commits ensures an auditable and collaborative evolution history.*
* **Diagnóstico de Infraestrutura (Port Mapping 3307):** A capacidade de identificar que o MySQL estava operando em uma porta não padrão e ajustar o DSN demonstra maturidade técnica em redes e configuração de serviços locais. / *Ability to identify non-standard MySQL ports and adjust DSN settings shows technical maturity in network and service configuration.*
* **Gestão de Segurança e Falsos Positivos (Avast Defense):** O enfrentamento do erro `IDP.Generic` provou a importância de gerir permissões de sistema e exceções de antivírus para manter a integridade dos binários do PHP. / *Overcoming 'IDP.Generic' errors highlights the importance of managing system permissions and antivirus exceptions to protect PHP binaries.*
* **Evolução de Depuração (Error 1049):** A transição do erro de "Conexão Recusada" para "Unknown Database" documenta o progresso lógico da resolução de problemas: primeiro estabilizamos a rede (camada física/transporte), depois o acesso aos dados (camada de aplicação). / *The shift from "Connection Refused" to "Unknown Database" documents logical troubleshooting: stabilizing the network first, then data access.*
* **Higiene de Versionamento (Git Identity & Commits):** A resolução da identidade do autor e o uso de commits granulares garantem que cada pequena vitória de hoje (porta, banco, repositórios) seja um ponto de restauração seguro e auditável. / *Resolving Git identity and using granular commits ensures every fix today is a safe, auditable restore point.*
* **Validação Estrutural (Outline Mapping):** A persistência em manter o código limpo permitiu que a IDE (VS Code) mapeasse o projeto em tempo real, provando que uma boa arquitetura facilita a leitura humana e de ferramentas. / *Clean code persistence allowed the IDE to map the project in real-time, proving that good architecture aids both humans and tools.*

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
