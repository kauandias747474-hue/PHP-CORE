#  02 service abstraction and di

##  Descrição / Description

**PT-BR:** Este módulo implementa um sistema de **Inversão de Controle (IoC)** e **Injeção de Dependência (DI)** manual em PHP. O objetivo é desacoplar a lógica de negócio das implementações de infraestrutura, utilizando um `Service Container` para gerenciar a criação e o ciclo de vida dos objetos.

**EN-US:** This module implements a manual **Inversion of Control (IoC)** and **Dependency Injection (DI)** system in PHP. The goal is to decouple business logic from infrastructure implementations by using a `Service Container` to manage object creation and lifecycle.

---

## 🛠️ Conceitos Aplicados / Applied Concepts

* **DIP (Dependency Inversion Principle):** As classes dependem de interfaces (`contracts/`), não de implementações concretas.
* **Dependency Injection (DI):** Dependências são injetadas via construtor, facilitando testes e manutenção.
* **Service Container:** Centraliza a "receita" de criação dos serviços em um único lugar.
* **PSR-4 Autoloading:** Gerenciamento automático de classes via Composer e Namespaces.

---

##  Estrutura de Arquivos / File Structure

| Pasta / Folder | Arquivo / File | Descrição / Description |
| :--- | :--- | :--- |
| `src/contracts/` | `ILogger.php` | Interface de Log / Logging Interface |
| `src/contracts/` | `INotificationService.php` | Interface de Notificação / Notification Interface |
| `src/implementations/` | `ConsoleLogger.php` | Log via Terminal / Terminal Logging |
| `src/implementations/` | `EmailNotification.php` | Notificação via E-mail / E-mail Notification |
| `src/container/` | `ServiceContainer.php` | O motor do DI / The DI Engine |
| `root` | `index.php` | Ponto de entrada (União de tudo) / Entry point |
| `root` | `composer.json` | Configuração de Autoload / Autoload Setup |

---

##  Benefícios / Benefits

| Conceito / Concept | Descrição / Description (PT-BR) | Description (EN-US) |
| :--- | :--- | :--- |
| **Testabilidade / Testability** | Facilita a substituição de serviços reais por "Mocks" em testes unitários. | Facilitates replacing real services with "Mocks" in unit tests. |
| **Flexibilidade / Flexibility** | Permite trocar implementações (ex: E-mail para SMS) alterando apenas uma linha no Container. | Allows swapping implementations (e.g., Email to SMS) by changing one line in the Container. |
| **Manutenibilidade / Maintainability** | Mantém o código limpo e fiel aos princípios **SOLID**. | Keeps the code clean and faithful to **SOLID** principles. |

---

##  Integração & Lógica / Integration & Logic

**PT-BR:** A "mágica" deste projeto acontece na resolução automática de dependências. O fluxo segue uma hierarquia inteligente:
1. **Mapeamento:** No `index.php`, registramos qual classe real deve responder a cada interface.
2. **Resolução:** Ao solicitar o `EmailNotification`, o Container percebe que ele exige um `ILogger`.
3. **Injeção:** O Container instancia o `ConsoleLogger` e o "injeta" no construtor da notificação automaticamente.
4. **Desacoplamento:** O serviço de e-mail funciona sem saber se o log vai para o console ou banco de dados.

**EN-US:** The "magic" happens in automatic dependency resolution. The flow follows an intelligent hierarchy:
1. **Mapping:** In `index.php`, we register which real class should respond to each interface.
2. **Resolution:** When requesting `EmailNotification`, the Container notices it requires an `ILogger`.
3. **Injection:** The Container instantiates `ConsoleLogger` and "injects" it into the notification constructor automatically.
4. **Decoupling:** The email service works without knowing if the log goes to the console or a database.

---

## Por que este projeto é interessante? / Why is this project interesting?

**PT-BR:**
Este projeto é fascinante porque toca no coração da engenharia de software moderna:
* **Liberdade de Escolha:** O código não fica "preso" a uma ferramenta. Posso trocar componentes sem tocar na regra de negócio.
* **Domínio do Framework:** Criar um container manualmente traz clareza sobre como grandes ferramentas (Laravel/Symfony) funcionam "sob o capô".
* **Código Profissional:** Marca a transição de um "escritor de scripts" para um "arquiteto de sistemas".

**EN-US:**
This project is fascinating because it touches the heart of modern software engineering:
* **Freedom of Choice:** Code isn't "trapped" by a tool. I can swap components without touching business rules.
* **Framework Mastery:** Building a container manually provides clarity on how major tools (Laravel/Symfony) work "under the hood".
* **Professional Code:** It marks the transition from a "script writer" to a "systems architect".

##  Ecossistema & Ferramentas Sugeridas / Ecosystem & Suggested Tools

**PT-BR:**
Embora este projeto utilize um container manual para fins de aprendizado, no mercado de trabalho utilizamos ferramentas consagradas e padrões que seguem estes mesmos princípios para escalar aplicações:

* **Composer:** Essencial para o gerenciamento de pacotes e o funcionamento do **Autoload PSR-4**, conectando os Namespaces às pastas físicas e eliminando a necessidade de `require` manuais.
* **PHP-DI:** Um framework especializado que permite implementar a injeção de dependência via **Auto-wiring** (resolução automática), eliminando o mapeamento manual de cada classe.
* **Frameworks (Laravel & Symfony):** Exemplos de implementação em larga escala. O Laravel utiliza **Service Providers** para gerenciar dependências, enquanto o Symfony foca em componentes de alta performance e desacoplamento.
* **PHPUnit:** Fundamental para a criação de **testes unitários**. A injeção de dependência facilita o uso de **Mocks** (objetos simulados), permitindo testar a lógica de negócio sem disparar e-mails ou logs reais.
* **PSR-11:** Este projeto visa a compatibilidade com a interface padrão de containers do PHP, garantindo que o Container siga os padrões universais estabelecidos pelo PHP-FIG.

**EN-US:**
While this project uses a manual container for learning purposes, professional projects use established tools and standards following these same principles to scale applications:

* **Composer:** Essential for package management and **PSR-4 Autoloading**, linking Namespaces to physical directories and eliminating the need for manual `requires`.
* **PHP-DI:** A specialized framework to implement dependency injection via **Auto-wiring** (automatic resolution), removing the need for manual mapping of every class.
* **Frameworks (Laravel & Symfony):** Examples of large-scale implementations. Laravel uses **Service Providers** to manage dependencies, while Symfony focuses on high-performance components and decoupling.
* **PHPUnit:** Crucial for **unit testing**. Dependency Injection facilitates the use of **Mocks** (simulated objects), allowing business logic to be tested without firing real emails or logs.
* **PSR-11:** This project aims to be compatible with the standard PHP container interface, ensuring the Container follows universal standards established by the PHP-FIG.
---

##  Fundamentos Técnicos / Technical Foundations

| Conceito / Concept | Descrição / Description |
| :--- | :--- |
| **Abstração (Interfaces)** | Define **o que** deve ser feito, ignorando o **como**. |
| **Injeção de Dependência (DI)** | Técnica de passar dependências via construtor (New is Glue). |
| **Service Container** | Objeto central que gerencia a criação e árvores de dependência. |

```php
// Exemplo de configuração no index.php / Setup example
$container->bind(ILogger::class, fn() => new ConsoleLogger());
$container->bind(INotificationService::class, fn($c) => new EmailNotification($c->get(ILogger::class)));
