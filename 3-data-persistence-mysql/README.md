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
##  1. Relatório de Engenharia / Engineering Report

### Tabela de Desafios e Soluções / Challenges & Solutions Table

| Desafio / Challenge | Causa / Cause | Solução / Solution |
| :--- | :--- | :--- |
| **SQL Injection Risk** | Concatenação de variáveis em strings SQL. / Raw variables in SQL strings. | **Prepared Statements:** Sanitização profunda de entradas via PDO. / Deep input sanitization via PDO. |
| **SSL Handshake Fail** | Ambiente local sem certificados de autoridade. / Local environment lacking authority certificates. | Configuração de certificados globais e tratamento de erros de transporte. / Global certificate setup and transport error handling. |
| **Antivirus (Avast) Block** | Ferramentas de requisição detectadas como ameaças. / Request tools detected as threats. | Configuração de exceções e restauração de binários bloqueados. / Exception configuration and restoration of blocked binaries. |
| **PHP Deprecated (8.2+)** | Uso de padrões antigos de declaração e datas. / Use of old declaration and date patterns. | **Strict Declaration:** Padronização de atributos e Timezones fixos. / Attribute standardization and fixed Timezones. |
| **Connection Refused** | Falha de comunicação com o serviço MySQL local. / MySQL service communication failure. | **DSN Validation:** Validação de credenciais e integridade de portas. / Credential validation and port integrity. |
| **Data Integrity Fail** | Conflitos em chaves estrangeiras (FK) e relacionamentos. / Foreign key and relationship conflicts. | **Transactions:** Implementação de operações atômicas (ACID). / Implementation of atomic operations (ACID). |
| **Log File Bloat** | Arquivos de texto crescendo até o limite de memória. / Text files growing to memory limits. | **Daily Rotation:** Arquivamento automático por Ano e Mês. / Automatic archiving by Year and Month. |
| **Race Conditions** | Processos paralelos tentando escrever no mesmo local. / Parallel processes writing to the same location. | **File Locking:** Travamento exclusivo durante operações de escrita. / Exclusive locking during write operations. |
| **Path/Require Errors** | Inconsistência na árvore de diretórios local. / Local directory tree inconsistency. | **Flat Structure:** Simplificação do carregamento de arquivos. / File loading simplification. |
| **Data Inconsistency** | Dados nulos ou estruturados quebrando o fluxo de log. / Null or structured data breaking log flow. | **Type Casting:** Tratamento rigoroso de tipos de entrada. / Rigorous input type handling. |

---

### 2. Por que esta estrutura é interessante? / Why this structure?
* **Resiliência:** O uso de `TransactionManager` garante que, se a internet cair após uma cobrança, o banco de dados não fique inconsistente (ACID).
* **Desacoplamento:** O `StripeProvider` não sabe "fazer" internet; ele recebe o `ApiClient` pronto. Isso é **Injeção de Dependência** aplicada.
* **Manutenibilidade:** Sem a pasta `src`, eliminamos complexidade de caminhos no Windows, tornando o projeto mais ágil para prototipagem e testes.



---

##  Conceitos Aprendidos / Concepts Learned

* **Injeção de Dependência (DI):** Inverter o controle para tornar as classes testáveis.
* **Gestão de Transações:** Entender a importância do Commit/Rollback em fluxos financeiros.
* **Abstração de API:** Criar um "Motor" (Client) que serve para qualquer API futura.
* **Segurança de Dados:** Uso de Query Builders para blindar o banco contra ataques.

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
