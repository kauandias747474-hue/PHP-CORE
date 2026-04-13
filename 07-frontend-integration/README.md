# 07)Front end Integration

## 📖 Descrição / Description

**PT-BR:** Esta camada é a engenharia de saída de dados. Ela atua como a ponte entre a lógica bruta do PHP e a interface do usuário. Hoje, transformamos o projeto em uma arquitetura modular profissional, garantindo que o back-end e o front-end sejam independentes e escaláveis.
**EN-US:** This layer is the data output engineering. It acts as the bridge between raw PHP logic and the user interface. Today, we transformed the project into a professional modular architecture, ensuring that the back-end and front-end are independent and scalable.

---

## 🛠️ O que construímos hoje / What we built today

### 1. Single Entry Point (index.php)
**PT-BR:** O "Maestro" do sistema. Ele gerencia o Autoload do Composer e distribui as tarefas para as classes corretas.
**EN-US:** The "Maestro" of the system. It handles Composer's Autoload and delegates tasks to the correct classes.

### 2. Asset Manager (assets/AssetHelper.php)
**PT-BR:** Resolve o problema de caminhos quebrados para CSS e Imagens, tornando o projeto portátil entre Windows, Docker e Produção.
**EN-US:** Solves the broken paths problem for CSS and Images, making the project portable between Windows, Docker, and Production.

### 3. View Engine (ViewEngine/Renderer.php)
**PT-BR:** Um motor que injeta dados dinâmicos em arquivos HTML de forma limpa, usando o método `extract()`.
**EN-US:** An engine that injects dynamic data into HTML files cleanly, using the `extract()` method.

---

## 📂 Estrutura de Pastas (Arquitetura Flat) / Directory Structure

* **`assets/`**: `AssetHelper.php` & CSS files.
* **`ViewEngine/`**: `Renderer.php` (The template engine).
* **`Presenters/`**: Data formatting (e.g., `UserPresenter.php`).
* **`Responses/`**: API standardizing (e.g., `JsonResponse.php`).
* **`Views/`**: Pure HTML/PHP templates.
* **`index.php`**: Application entry point.

---

## 🚀 Por que este módulo é interessante? / Why is this module interesting?

**PT-BR:** O grande destaque é o **Desacoplamento**. O sistema agora é "agnóstico" à interface: você pode entregar um site HTML ou uma API JSON mudando apenas uma linha de código, sem tocar na regra de negócio.
**EN-US:** The highlight is **Decoupling**. The system is now interface-agnostic: you can deliver an HTML site or a JSON API by changing just one line of code, without touching the business logic.

---

## 🛠️ Ferramentas Usadas / Tools Used

* **Docker:** PHP 8.2 Apache (Environment isolation).
* **Composer:** PSR-4 Autoloading (Zero `include/require` manual).
* **Intelephense:** PHP static analysis & indexing.
* **PHP CLI:** Syntax validation and terminal testing.

---

## ❌ Erros Corrigidos & Soluções / Corrected Errors & Solutions

### 1. Class "App\Presenters\UserPresenter" not found
* **Causa / Cause:** O Composer buscava uma pasta `App/` que não existia fisicamente. / Composer was looking for an `App/` folder that didn't exist physically.
* **Solução / Solution:** Ajuste no `composer.json` para `"App\\": ""`. / Adjust `composer.json` to `"App\\": ""`.
* **Comando / Command:** `php composer.phar dump-autoload -o`.

### 2. Erro P1009 (Undefined Type) - VS Code
* **Causa / Cause:** Cache do Intelephense desatualizado. / Outdated Intelephense cache.
* **Solução / Solution:** `Ctrl + Shift + P` -> `Intelephense: Index workspace`.

### 3. Diferença de Case (Windows vs Linux)
* **Causa / Cause:** Windows ignora maiúsculas, mas o Linux (Docker) e o PSR-4 não. / Windows ignores case, but Linux (Docker) and PSR-4 don't.
* **Solução / Solution:** Padronização rigorosa (Ex: `UserPresenter.php` deve ter `class UserPresenter`). / Strict standardization (e.g., `UserPresenter.php` must have `class UserPresenter`).

---

## 🧪 Como Testar / How to Test

**PT-BR:**
1. Rode `docker-compose up -d`.
2. Acesse `http://localhost:8080` para ver o HTML renderizado.
3. Acesse `http://localhost:8080?api=true` para ver o JSON estruturado.
4. Use o "Teste de Fogo" no terminal:
   `php -r "require 'vendor/autoload.php'; echo class_exists('App\Presenters\UserPresenter') ? 'Encontrou!' : 'Erro';"`.

**EN-US:**
1. Run `docker-compose up -d`.
2. Access `http://localhost:8080` to see the rendered HTML.
3. Access `http://localhost:8080?api=true` to see the structured JSON.
4. Use the terminal "Fire Test":
   `php -r "require 'vendor/autoload.php'; echo class_exists('App\Presenters\UserPresenter') ? 'Found!' : 'Error';"`.

---
