# 🧪 Provas de Conceito (PoCs) / Proof of Concepts

Este diretório centraliza os scripts de validação do **Core Engine**. Eles servem para garantir que as engrenagens de Autoloading, Segurança e Configuração estejam funcionando antes da implementação das regras de negócio.

---

## 🇧🇷 Versão em Português

### 🚀 Scripts de Validação

#### 1. 📂 AutoLoaderTest.php
* **Objetivo:** Validar o mapeamento de Namespaces e o carregamento automático.
* **O que faz:** Tenta instanciar classes localizadas em subdiretórios da pasta `src/` sem utilizar comandos `require` ou `include`.
* **Resultado esperado:** A classe deve ser carregada silenciosamente pelo motor **PSR-4**, provando que a organização de pastas está correta.

#### 2. 🛡️ SecurityError.php
* **Objetivo:** Demonstrar o bloqueio de exibição de erros técnicos em produção.
* **O que faz:** Dispara uma exceção proposital após a inicialização do Kernel para testar o **Global Exception Handler**.
* **Resultado esperado:** Se `APP_DEBUG=false` no `.env`, o script deve ocultar detalhes sensíveis (como caminhos de arquivos) e exibir apenas uma mensagem segura.

#### 3. ⚙️ ConfigEcho.php
* **Objetivo:** Validar a leitura e injeção das configurações do arquivo `.env`.
* **O que faz:** Solicita ao Kernel um valor específico que foi definido externamente no arquivo de ambiente.
* **Resultado esperado:** O valor exibido deve corresponder exatamente ao que está no `.env`, validando a gestão de ambiente (**12-Factor App**).

---

## 🇺🇸 English Version

### 🚀 Validation Scripts

#### 1. 📂 AutoLoaderTest.php
* **Goal:** Validate Namespace mapping and automatic loading.
* **What it does:** Attempts to instantiate classes located in `src/` subdirectories without using `require` or `include` commands.
* **Expected result:** The class should be silently loaded by the **PSR-4** engine, proving the folder structure is correct.

#### 2. 🛡️ SecurityError.php
* **Goal:** Demonstrate the blocking of technical error displays in production.
* **What it does:** Triggers an intentional exception after Kernel initialization to test the **Global Exception Handler**.
* **Expected result:** If `APP_DEBUG=false` in the `.env`, the script must hide sensitive details (like file paths) and display only a secure message.

#### 3. ⚙️ ConfigEcho.php
* **Goal:** Validate the reading and injection of `.env` file configurations.
* **What it does:** Requests a specific value from the Kernel that was defined externally in the environment file.
* **Expected result:** The displayed value must match exactly what is in the `.env`, validating environment management (**12-Factor App**).
## 🏛️ Alinhamento com Frameworks Modernos / Modern Framework Alignment

Este Core Engine foi desenvolvido seguindo os padrões arquiteturais de frameworks *Enterprise-level*, servindo como uma implementação pedagógica de:

* **Laravel & Symfony (PHP):** Implementação de Ciclo de Vida (Bootstrapping) e Manuseio Global de Exceções (Global Exception Handling).
* **Spring Boot (Java):** Lógica de inicialização centralizada no Kernel, garantindo que o ambiente esteja pronto antes da execução.
* **Composer Standards:** Autoloading 100% compatível com a norma **PSR-4**, facilitando a migração para projetos de grande escala.

---

This Core Engine was developed following the architectural patterns of Enterprise-level frameworks, serving as a pedagogical implementation of:

* **Laravel & Symfony (PHP):** Lifecycle implementation (Bootstrapping) and Global Exception Handling.
* **Spring Boot (Java):** Centralized Kernel initialization logic, ensuring the environment is ready before execution.
* **Composer Standards:** 100% **PSR-4** compliant Autoloading, facilitating migration to large-scale projects.
---

## 💻 Como Rodar / How to Run

Acesse a raiz do projeto e execute os comandos via CLI:

```bash
# Testar Autoloader
php examples/AutoLoaderTest.php

# Testar Escudo de Segurança
php examples/SecurityError.php

# Testar Variáveis de Ambiente
php examples/ConfigEcho.php
