# 06)Infrastructure Services

## 📖 Descrição / Description

**PT-BR:** Este módulo representa a "espinha dorsal" técnica do sistema. Ele isola as comunicações com o mundo externo (APIs, sistemas de arquivos e logs) da lógica de negócio principal. O objetivo central foi criar uma **Camada de Abstração**, garantindo que o sistema não dependa de ferramentas específicas, mas sim de capacidades técnicas bem definidas e intercambiáveis.
**EN-US:** This module represents the system's technical "backbone." It isolates communications with the outside world (APIs, file systems, and logs) from the core business logic. The central goal was to create an **Abstraction Layer**, ensuring the system doesn't rely on specific tools but on well-defined and interchangeable technical capabilities.

---

## 🛠️ Funcionalidades / Features

### 1. 📜 FileLogger (Auditoria e Diagnóstico / Auditing & Diagnostics)
* **PT-BR:** Centraliza o registro de eventos e erros usando a constante `FILE_APPEND`. Isso permite rastrear falhas críticas em tempo real sem sobrescrever dados anteriores, sendo fundamental para a saúde da aplicação em produção.
* **EN-US:** Centralizes event and error logging using the `FILE_APPEND` constant. This allows tracking critical failures in real-time without overwriting previous data, which is essential for application health in production.

### 2. 📧 SendGridMailer (Mensageria Transacional / Transactional Messaging)
* **PT-BR:** Abstrai o envio de e-mails via API. O diferencial deste serviço é a resiliência: utilizamos blocos `try/catch` para garantir que instabilidades em serviços de terceiros (como o SendGrid) sejam tratadas sem interromper a experiência do usuário.
* **EN-US:** Abstracts email sending via API. The key differentiator for this service is resilience: we use `try/catch` blocks to ensure that instabilities in third-party services (like SendGrid) are handled without interrupting the user experience.

### 3. ☁️ S3Storage (Armazenamento em Nuvem / Cloud Storage)
* **PT-BR:** Gerencia o upload de arquivos para o AWS S3. Este serviço demonstra como a infraestrutura pode evoluir de um disco local para a nuvem de forma transparente para o resto do sistema.
* **EN-US:** Manages file uploads to AWS S3. This service demonstrates how infrastructure can evolve from a local disk to the cloud transparently for the rest of the system.

---

## 📂 Estrutura de Pastas / Directory Structure

O projeto utiliza o padrão **PSR-4** para carregamento automático (Autoloading).
The project follows the **PSR-4** standard for automatic class loading.

* **`Logging/`**: Implementação de persistência de histórico / Logging persistence implementation.
* **`Messaging/`**: Motores de comunicação e e-mail / Communication and email engines.
* **`Storage/`**: Gestão de arquivos e objetos em nuvem / File and cloud object management.
* **`vendor/`**: Diretório gerado pelo Composer que centraliza o autoload / Composer-generated directory for centralized autoloading.
* **`functions.php`**: Helpers e utilitários globais (como o `dd()`) / Global helpers and utilities (like `dd()`).

---

## 💡 Por que este projeto é interessante? / Why is this project interesting?

**PT-BR:** Este projeto é fascinante porque ele resolve o problema do "código espaguete". Em vez de espalhar configurações de API por toda a aplicação, criamos um porto seguro para a infraestrutura. O que mais me chamou a atenção foi ver como o **Composer** organiza o caos: ele transforma pastas simples em uma estrutura hierárquica profissional que segue padrões globais de desenvolvimento.
**EN-US:** This project is fascinating because it solves the "spaghetti code" problem. Instead of scattering API configurations throughout the application, we created a safe harbor for the infrastructure. What caught my attention most was seeing how **Composer** organizes chaos: it transforms simple folders into a professional hierarchical structure that follows global development standards.

---

## 🧠 O que eu aprendi? / What did I learn?

Neste módulo, dominei conceitos fundamentais de engenharia de software:
In this module, I mastered fundamental software engineering concepts:

1. **Namespaces & PSR-4:** Como organizar classes logicamente para que o PHP as encontre automaticamente, eliminando o uso manual de `include` ou `require`.
   *(How to logically organize classes so PHP finds them automatically, eliminating manual `include` or `require`).*
2. **Dependency Management (Composer):** Aprendi a configurar o `composer.json`, manipular o executável `composer.phar` e gerenciar o ciclo de vida das dependências.
   *(Learned to configure `composer.json`, handle the `composer.phar` executable, and manage dependency lifecycles).*
3. **Tratamento de Exceções (`Throwable`):** Implementei lógica robusta onde o sistema se recupera de falhas externas (como queda de conexão com o S3 ou SendGrid).
   *(Implemented robust logic where the system recovers from external failures like S3 or SendGrid connection drops).*
4. **Resolução de Ambiente (PHP.ini):** Aprendi a diagnosticar problemas de nível de sistema, como habilitar extensões (OpenSSL) para permitir conexões seguras por criptografia.
   *(Learned to diagnose system-level issues, such as enabling extensions like OpenSSL to allow secure encrypted connections).*

---

## 🧪 Como Testar / How to Test

**PT-BR:**
1. Verifique se o arquivo `composer.phar` está na raiz.
2. Execute `php composer.phar dump-autoload` para gerar o mapa de classes.
3. Inicie o servidor: `php -S localhost:8000`.
4. Acesse o navegador e veja a infraestrutura operando com logs, e-mails e storage confirmados.

**EN-US:**
1. Ensure the `composer.phar` file is in the root directory.
2. Run `php composer.phar dump-autoload` to generate the class map.
3. Start the server: `php -S localhost:8000`.
4. Access the browser to see the infrastructure operating with confirmed logs, emails, and storage.
