# 📁 02-service-abstraction-and-di

## 📖 Descrição / Description

**PT-BR:** Este módulo implementa um sistema de **Inversão de Controle (IoC)** e **Injeção de Dependência (DI)** manual em PHP. O objetivo é desacoplar a lógica de negócio das implementações de infraestrutura, utilizando um `Service Container` para gerenciar a criação e o ciclo de vida dos objetos.

**EN-US:** This module implements a manual **Inversion of Control (IoC)** and **Dependency Injection (DI)** system in PHP. The goal is to decouple business logic from infrastructure implementations by using a `Service Container` to manage object creation and lifecycle.

---

## 🛠️ Conceitos Aplicados / Applied Concepts

* **DIP (Dependency Inversion Principle):** As classes dependem de interfaces (`contracts/`), não de implementações concretas.
* **Dependency Injection (DI):** Dependências são injetadas via construtor, facilitando testes e manutenção.
* **Service Container:** Centraliza a "receita" de criação dos serviços em um único lugar.
* **PSR-4 Autoloading:** Gerenciamento automático de classes via Composer e Namespaces.

---

## 📂 Estrutura de Arquivos / File Structure

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

## 🚀 Benefícios / Benefits

| Conceito / Concept | Descrição / Description (PT-BR) | Description (EN-US) |
| :--- | :--- | :--- |
| **Testabilidade / Testability** | Facilita a substituição de serviços reais por "Mocks" em testes unitários. | Facilitates replacing real services with "Mocks" in unit tests. |
| **Flexibilidade / Flexibility** | Permite trocar implementações (ex: E-mail para SMS) alterando apenas uma linha no Container. | Allows swapping implementations (e.g., Email to SMS) by changing one line in the Container. |
| **Manutenibilidade / Maintainability** | Mantém o código limpo e fiel aos princípios **SOLID**. | Keeps the code clean and faithful to **SOLID** principles. |

---

## 🧩 Integração & Lógica / Integration & Logic

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

## 💡 Por que este projeto é interessante? / Why is this project interesting?

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

---

## 🛠️ Fundamentos Técnicos / Technical Foundations

| Conceito / Concept | Descrição / Description |
| :--- | :--- |
| **Abstração (Interfaces)** | Define **o que** deve ser feito, ignorando o **como**. |
| **Injeção de Dependência (DI)** | Técnica de passar dependências via construtor (New is Glue). |
| **Service Container** | Objeto central que gerencia a criação e árvores de dependência. |

```php
// Exemplo de configuração no index.php / Setup example
$container->bind(ILogger::class, fn() => new ConsoleLogger());
$container->bind(INotificationService::class, fn($c) => new EmailNotification($c->get(ILogger::class)));
