# 📂 01 - Kernel & Autoloader (Core Engine)

Este repositório contém o **Core Engine** da aplicação, responsável por gerenciar o ciclo de vida inicial e preparar o ambiente para a execução da lógica de negócio. O foco é o controle total sobre o *bootstrapping* do sistema, garantindo performance e segurança desde a inicialização.

## 🎯 Objetivo
Gerenciar a inicialização do sistema, garantindo que o ambiente esteja configurado, as classes sejam carregadas automaticamente e os erros sejam tratados de forma profissional.

## 🛠️ Responsabilidades Técnicas

* **Autoloading (PSR-4):** Implementação manual de carregamento automático de classes, seguindo os padrões da PHP-FIG para eliminar o uso de `require` manuais.
* **Exception Handling (Security Shield):** Capturador global de erros que impede a exposição de dados sensíveis do servidor para o usuário final.
* **Environment Management:** Carregamento de variáveis de configuração via arquivos `.env`, isolando dados sensíveis do código-fonte (12-Factor App).
* **Padrão PSR-4: Interoperabilidade e organização moderna de arquivos.**
* **Arquitetura de Frameworks: Lógica de tratamento de erros e gestão de ambiente inspirada em Laravel e Symfony**
---

## 🚀 Demonstrações Práticas (PoC)

O diretório `/examples` contém scripts para validar cada pilar do motor:

1.  **`AutoLoaderTest.php`**: Valida a detecção e instanciação automática de classes via Namespaces.
2.  **`SecurityError.php`**: Demonstra o bloqueio de exibição de erros técnicos em ambiente de produção.
3.  **`ConfigEcho.php`**: Valida a leitura e injeção das configurações do arquivo `.env`.



---

## 🏗️ Estrutura do Módulo

```text
├── /src                # Código-fonte do motor
│   ├── Kernel.php      # Maestro do sistema
│   ├── Autoloader.php  # Motor PSR-4
│   └── Handler.php     # Tratamento de exceções
├── /examples           # Provas de Conceito (PoCs)
│   ├── AutoLoaderTest.php
│   ├── SecurityError.php
│   └── ConfigEcho.php
├── .env.example        # Modelo de configuração
└── README.md           # Documentação
