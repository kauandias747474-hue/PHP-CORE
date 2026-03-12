# 📁 03-infrastructure-persistence

## 📖 Descrição / Description

**PT-BR:** Esta camada é a implementação concreta de todos os recursos externos do sistema. Enquanto a camada anterior define "o que" deve ser feito através de interfaces, esta camada lida com o "como" fazer, isolando detalhes tecnológicos como drivers de banco de dados (MySQL), clientes HTTP e sistemas de arquivos.
**EN-US:** This layer is the concrete implementation of all external system resources. While the previous layer defines "what" should be done through interfaces, this layer handles the "how" to do it, isolating technical details such as database drivers (MySQL), HTTP clients, and file systems.

---

## 📡 Serviços e Integrações / Services & Integrations

### 1. Persistence & Transaction Manager
**PT-BR:** Gestão de transações ACID e persistência real em MySQL utilizando PDO. Inclui um *Query Builder* para garantir segurança contra SQL Injection.
**EN-US:** ACID transaction management and real MySQL persistence using PDO. Includes a Query Builder to ensure security against SQL Injection.

### 2. Logging (PSR-3)
**PT-BR:** Sistema de log multinível seguindo os padrões da comunidade (PSR-3), permitindo registrar eventos em arquivos locais ou serviços externos.
**EN-US:** Multi-level logging system following community standards (PSR-3), allowing event logging to local files or external services.

### 3. Resilient API Client
**PT-BR:** Cliente HTTP para comunicação com APIs de terceiros, equipado com lógica de retry e tratamento de timeouts para garantir estabilidade.
**EN-US:** HTTP client for communication with third-party APIs, equipped with retry logic and timeout handling to ensure stability.

### 4. Cache System
**PT-BR:** Abstração para suporte a múltiplos drivers como Redis ou File System, otimizando a performance da aplicação.
**EN-US:** Abstraction supporting multiple drivers like Redis or File System, optimizing application performance.

---

## 📂 Estrutura de Pastas / Directory Structure



* **`Database/`**: 
    * **PT-BR:** Conexão PDO, Transaction Manager e Query Builder.
    * **EN-US:** PDO connection, Transaction Manager, and Query Builder.
* **`Repositories/`**: 
    * **PT-BR:** Implementações SQL dos contratos (ex: `SqlUserRepository.php`).
    * **EN-US:** SQL implementations of contracts (e.g., `SqlUserRepository.php`).
* **`External/`**: 
    * **PT-BR:** Clientes para APIs externas e serviços de terceiros.
    * **EN-US:** Clients for external APIs and third-party services.
* **`Logging/`**: 
    * **PT-BR:** Implementações reais de escrita de log (ex: `FileLogger.php`).
    * **EN-US:** Actual log writing implementations (e.g., `FileLogger.php`).

---

## 🚀 Benefícios de Engenharia / Engineering Benefits

* **Isolamento Tecnológico (Technological Isolation):** * **PT-BR:** O "Coração" do projeto não sabe que o MySQL existe, apenas que os dados são salvos.
    * **EN-US:** The "Core" of the project doesn't know MySQL exists, only that data is saved.
* **Flexibilidade (Flexibility):** * **PT-BR:** Trocar o MySQL por PostgreSQL exige mudanças apenas nesta pasta.
    * **EN-US:** Switching from MySQL to PostgreSQL requires changes only in this folder.
* **Segurança (Security):** * **PT-BR:** Centraliza a higienização de dados e proteção contra ataques de I/O.
    * **EN-US:** Centralizes data sanitization and protection against I/O attacks.

---

## 🧪 Como Testar / How to Test

**PT-BR:** Você pode validar esta camada garantindo que as classes aqui implementam as interfaces da camada `02`. Se você conseguir instanciar um `SqlUserRepository` e passá-lo para um serviço que espera um `IUserRepository`, a integração está perfeita.
**EN-US:** You can validate this layer by ensuring the classes here implement the interfaces from layer `02`. If you can instantiate a `SqlUserRepository` and pass it to a service expecting an `IUserRepository`, the integration is perfect.
