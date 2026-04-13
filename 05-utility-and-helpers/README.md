#  05) Utility and Helpers 

## 📖 Descrição / Description

**PT-BR:** Este módulo foca na criação de uma camada de suporte técnica robusta. Desenvolvemos ferramentas de uso geral que dão suporte a todas as outras partes do sistema através de funções puras e classes utilitárias. O objetivo é a reutilização de código e a padronização de formatações e validações, separando a lógica de "infraestrutura" da lógica de "negócio".

**EN-US:** This module focuses on creating a robust technical support layer. We developed general-purpose tools that support all other parts of the system through pure functions and utility classes. The goal is code reuse and standardization of formatting and validation, separating "infrastructure" logic from "business" logic.

---

## 💡 Por que este projeto é interessante? / Why is this project interesting?

**PT-BR:** O que torna este projeto fascinante é a transição do "código que apenas funciona" para o "código que escala". Em vez de um arquivo único e bagunçado, criamos um ecossistema onde cada peça tem um papel definido. É interessante porque:
* **Previsibilidade:** Você sabe exatamente onde encontrar a lógica de formatação ou validação.
* **Segurança Silenciosa:** O uso de *Value Objects* impede erros antes mesmo que eles cheguem ao banco de dados.
* **Profissionalismo:** Utiliza os mesmos padrões (PSR-4 e Composer) usados por grandes frameworks como Laravel e Symfony.

**EN-US:** What makes this project fascinating is the transition from "code that just works" to "code that scales." Instead of a single messy file, we created an ecosystem where every piece has a defined role. It is interesting because:
* **Predictability:** You know exactly where to find formatting or validation logic.
* **Silent Security:** Using *Value Objects* prevents errors even before they reach the database.
* **Professionalism:** It uses the same standards (PSR-4 and Composer) used by major frameworks like Laravel and Symfony.

---

## 🏛️ Arquitetura do Sistema / System Architecture

**PT-BR:** O sistema é dividido em 3 camadas principais:
**EN-US:** The system is divided into 3 main layers:

1.  **Domínio (Domain):** `Entities`, `Value Objects` e `Services`.
2.  **Suporte (Support):** `Formatters`, `Validators` e `Helpers`.
3.  **Orquestração (Orchestration):** `index.php` e `Composer Autoload`.



---

## 📂 Detalhamento dos Códigos / Code Details

### 🛠️ Utility & Helpers
* **Formatters:** Moedas (R$) e Datas (Y-m-d para d/m/Y).
* **Validators:** Algoritmo matemático para validação de CPF.
* **Helpers:** Geração de Slugs para URLs amigáveis.
* **Global Functions:** Utilitário `dd()` para depuração rápida.

---

## 🧠 Conceitos Aplicados / Applied Concepts

**PT-BR:**
* **PSR-4 Autoloading:** Carregamento automático de classes via Composer.
* **Encapsulamento:** Proteção de estado com propriedades privadas.
* **Programação Defensiva:** Validação rigorosa na entrada de dados.
* **Tratamento de Erros:** Uso de `try-catch` capturando `Throwable`.

**EN-US:**
* **PSR-4 Autoloading:** Automatic class loading via Composer.
* **Encapsulation:** State protection with private properties.
* **Defensive Programming:** Rigorous validation on data entry.
* **Error Handling:** Using `try-catch` capturing `Throwable`.

---

## 🛠️ Erros Corrigidos / Bug Fixes

* **Case Sensitivity:** Compatibilidade entre Windows (local) e Linux (servidor).
* **Namespace Mismatch:** Alinhamento entre declaração de código e estrutura de pastas.
* **Composer Mapping:** Configuração da diretiva `"files"` para carregar o `functions.php`.

---

## 🚀 Como Executar / How to Run

1.  **Sincronizar o mapa de classes:**
    ```bash
    php composer.phar dump-autoload
    ```

2.  **Iniciar servidor:**
    ```bash
    php -S localhost:8000
    ```

---
