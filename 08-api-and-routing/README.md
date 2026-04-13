# 📁 08-api-routing-engine (Pro-Architect Version)

## 📖 Descrição / Description

**PT-BR:** Esta camada é o "Cérebro de Navegação" do projeto. Abandonamos o acesso direto a arquivos `.php` para implementar um **Front Controller** robusto. O sistema agora centraliza todas as requisições no `index.php`, utiliza um **Dispatcher** para orquestrar rotas, e aplica **Middlewares** para garantir segurança antes que qualquer lógica de negócio seja executada.

**EN-US:** This layer is the project's "Navigation Brain." We have moved away from direct `.php` file access to implement a robust **Front Controller**. The system now centralizes all requests in `index.php`, uses a **Dispatcher** to orchestrate routes, and applies **Middlewares** to ensure security before any business logic is executed.

---

## 🛠️ O que construímos / What we built

### 1. Autoloading & PSR-4 (The Backbone)
* **PT-BR:** Configuramos o **Composer** para mapear o namespace `App\` diretamente para a raiz do projeto, eliminando a necessidade de `require` manuais e garantindo uma arquitetura profissional.
* **EN-US:** We configured **Composer** to map the `App\` namespace directly to the project root, eliminating the need for manual `require` statements and ensuring a professional architecture.

### 2. Front Controller Pattern
* **PT-BR:** O `index.php` agora captura todas as URIs e as entrega para o motor de rotas, servindo como o ponto único de entrada da aplicação.
* **EN-US:** `index.php` now captures all URIs and hands them over to the routing engine, serving as the single point of entry for the application.

### 3. Dispatcher & Collections
* **PT-BR:** Implementamos um roteador que diferencia métodos **GET** e **POST** e permite a inclusão de coleções externas de rotas (`ApiRoutes.php`), mantendo o arquivo `web.php` organizado.
* **EN-US:** We implemented a router that differentiates between **GET** and **POST** methods and allows external route collections (`ApiRoutes.php`), keeping the `web.php` file organized.

### 4. Middleware Security Layer
* **PT-BR:** Criamos o `Authenticate.php`, um "segurança" que valida tokens de acesso antes de liberar o acesso aos Controllers.
* **EN-US:** We created `Authenticate.php`, a "security guard" that validates access tokens before granting access to the Controllers.

---

## 📂 Estrutura de Pastas / Directory Structure

* **`index.php`**: O ponto de entrada (Recepcionista).
* **`web.php`**: O mapa principal de rotas (Cardápio).
* **`Router/Dispatcher.php`**: O motor que decide para onde enviar a requisição (Gerente).
* **`Middlewares/`**: Camada de proteção e filtros (Segurança).
* **`Controllers/`**: Onde a lógica de resposta reside (Cozinha/Execução).
* **`Collections/`**: Agrupamento lógico de rotas específicas, como APIs.

---

## 🌟 Por que este projeto é interessante? / Why is this project interesting?

**PT-BR:** Este projeto representa o "divisor de águas" para qualquer desenvolvedor PHP. Ao invés de depender de arquivos soltos que o servidor lê aleatoriamente, construímos um sistema que **nós controlamos**. É a base de como grandes frameworks como Laravel e Symfony funcionam. Ver uma URL limpa se transformar em uma resposta lógica através de várias camadas de código é a verdadeira essência da engenharia de software.

**EN-US:** This project represents a "turning point" for any PHP developer. Instead of relying on loose files that the server reads randomly, we built a system that **we control**. It is the foundation of how major frameworks like Laravel and Symfony work. Seeing a clean URL transform into a logical response through multiple code layers is the true essence of software engineering.

---

## 🧠 Lições Aprendidas & Erros Superados / Lessons Learned & Errors Overcome

**PT-BR:**
Durante o desenvolvimento, enfrentamos desafios reais que serviram de grande aprendizado:
1. **O Rigor do Composer:** Aprendi que o `composer.json` não aceita erros de sintaxe; um único caractere invisível ou erro de codificação pode corromper a execução (como o erro na linha 28). A solução foi garantir um arquivo limpo em UTF-8.
2. **Case-Sensitivity:** No Windows, às vezes ignoramos maiúsculas, mas o Autoloading PSR-4 é rígido. Aprendi que a pasta `Controllers` deve ser chamada exatamente assim no código.
3. **Namespaces vs Pastas:** Entendi que o `namespace` dentro do arquivo deve ser o "espelho" fiel da estrutura de pastas para que as classes sejam encontradas automaticamente.

**EN-US:**
During development, we faced real challenges that served as great lessons:
1. **Composer Strictness:** I learned that `composer.json` accepts no syntax errors; a single invisible character or encoding error can break execution (like the line 28 error). The solution was ensuring a clean file in UTF-8.
2. **Case-Sensitivity:** On Windows, we sometimes ignore casing, but PSR-4 Autoloading is strict. I learned that the `Controllers` folder must be referenced exactly as named.
3. **Namespaces vs Folders:** I realized that the `namespace` inside the file must be a faithful "mirror" of the folder structure for classes to be found automatically.


---
# 2. Cenários de Teste / Test Scenarios
**Acesso Livre (Home):** http://localhost:8000/

(PT-BR: Visualização da página inicial | EN-US: Home page view)

**Acesso Bloqueado (Middleware):** http://localhost:8000/perfil

(PT-BR: Deve retornar 401 Unauthorized | EN-US: Should return 401 Unauthorized)

**Acesso Autorizado (Token):** http://localhost:8000/perfil?token=secret123

(PT-BR: Deve liberar o acesso ao Controller | EN-US: Should grant access to the Controller)

## 🛠️ Tecnologias Utilizadas / Tech Stack
**PHP 8.x (Core):**
PT-BR: Linguagem base para o desenvolvimento da lógica e motor de rotas.

EN-US: Core language for developing logic and the routing engine.

**Composer:** 
PT-BR: Gerenciamento de dependências e implementação do padrão PSR-4 Autoloading.

EN-US: Dependency management and implementation of the PSR-4 Autoloading standard.

**JSON:** 
PT-BR: Utilizado para configuração de metadados e mapeamento do projeto.

EN-US: Used for metadata configuration and project mapping.

**PowerShell:**
PT-BR: Utilizado para automação de comandos, gerenciamento de arquivos e execução do servidor.

EN-US: Used for command automation, file management, and server execution.


## 🧪 Como Executar e Testar / How to Run and Test

### 1. Preparar o Ambiente / Set up Environment
```powershell
php composer.phar dump-autoload -o
