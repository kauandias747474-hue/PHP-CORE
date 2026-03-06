# 📂 01 - Kernel & Autoloader (Core Engine)

[English Version Below]

---

## 🇧🇷 Versão em Português

Este repositório contém o **Core Engine** da aplicação, responsável por gerenciar o ciclo de vida inicial e preparar o ambiente para a execução da lógica de negócio. O foco é o controle total sobre o *bootstrapping* do sistema, garantindo performance e segurança desde a inicialização.

### 🎯 Objetivo
Gerenciar a inicialização do sistema, garantindo que o ambiente esteja configurado, as classes sejam carregadas automaticamente e os erros sejam tratados de forma profissional.

### 🛠️ Responsabilidades Técnicas
* **Autoloading (PSR-4):** Implementação manual de carregamento automático de classes, seguindo os padrões da **PHP-FIG** para eliminar o uso de `require` manuais.
* **Exception Handling (Security Shield):** Capturador global de erros que impede a exposição de dados sensíveis do servidor para o usuário final.
* **Environment Management:** Carregamento de variáveis de configuração via arquivos `.env`, isolando dados sensíveis conforme as boas práticas do **12-Factor App**.

### 🚀 Demonstrações Práticas (PoC)
Localizados na pasta `/examples`, estes scripts validam os pilares do motor:
1. **`AutoLoaderTest.php`**: Valida a detecção e instanciação automática de classes via Namespaces.
2. **`SecurityError.php`**: Demonstra o bloqueio de exibição de erros técnicos em ambiente de produção.
3. **`ConfigEcho.php`**: Valida a leitura e injeção das configurações do arquivo `.env`.

---

## 🇺🇸 English Version

This repository contains the **Core Engine** of the application, responsible for managing the initial lifecycle and preparing the environment for business logic execution. The focus is total control over the system *bootstrapping*, ensuring performance and security from the start.

### 🎯 Objective
To manage system initialization, ensuring the environment is configured, classes are automatically loaded, and errors are handled professionally.

### 🛠️ Technical Responsibilities
* **Autoloading (PSR-4):** Manual implementation of automatic class loading, following **PHP-FIG** standards to eliminate manual `require` calls.
* **Exception Handling (Security Shield):** A global error capturer that prevents sensitive server data from being exposed to the end user.
* **Environment Management:** Loading configuration variables via `.env` files, isolating sensitive data according to **12-Factor App** best practices.

### 🚀 Practical Demonstrations (PoC)
Located in the `/examples` folder, these scripts validate the core pillars:
1. **`AutoLoaderTest.php`**: Validates automatic class detection and instantiation via Namespaces.
2. **`SecurityError.php`**: Demonstrates the blocking of technical error displays in production environments.
3. **`ConfigEcho.php`**: Validates the reading and injection of `.env` file configurations.

---

## 🏗️ Structure / Estrutura

```text
├── /src                # Source code (Core)
│   ├── Kernel.php      # System Master
│   ├── Autoloader.php  # PSR-4 Engine
│   └── Handler.php     # Exception Handling
├── /examples           # Proof of Concepts (PoCs)
│   ├── AutoLoaderTest.php
│   ├── SecurityError.php
│   └── ConfigEcho.php
├── .env.example        # Configuration template
└── README.md           # Documentation
