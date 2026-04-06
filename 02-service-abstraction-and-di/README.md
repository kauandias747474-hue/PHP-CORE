#  02-service-abstraction-and-di

##  Descrição / Description

**PT-BR:** Este módulo implementa um sistema de **Inversão de Controle (IoC)** e **Injeção de Dependência (DI)** manual em PHP. O objetivo é desacoplar a lógica de negócio das implementações de infraestrutura, utilizando um `Service Container` para gerenciar a criação e a vida dos objetos.

**EN-US:** This module implements a manual **Inversion of Control (IoC)** and **Dependency Injection (DI)** system in PHP. The goal is to decouple business logic from infrastructure implementations by using a `Service Container` to manage object creation and lifecycle.

---

##  Conceitos Aplicados / Applied Concepts

* **DIP (Dependency Inversion Principle):** As classes dependem de interfaces (`contracts/`), não de implementações concretas.
* **Dependency Injection (DI):** Dependências são injetadas via construtor, facilitando testes e manutenção.
* **Service Container:** Centraliza a "receita" de criação dos serviços em um único lugar.

---

##  Estrutura de Arquivos / File Structure

| Pasta / Folder | Arquivo / File | Descrição / Description |
| :--- | :--- | :--- |
| `contracts/` | `ILogger.php` | Interface de Log / Logging Interface |
| `contracts/` | `INotificationService.php` | Interface de Notificação / Notification Interface |
| `implementations/` | `ConsoleLogger.php` | Log via Terminal / Terminal Logging |
| `implementations/` | `EmailNotification.php` | Notificação via E-mail / E-mail Notification |
| `container/` | `ServiceContainer.php` | O motor do DI / The DI Engine |
| `root` | `index.php` | Ponto de entrada (União de tudo) / Entry point (Joining all) |

---

##  Benefícios / Benefits

| Conceito / Concept | Descrição / Description (PT-BR) | Description (EN-US) |
| :--- | :--- | :--- |
| ** Testabilidade / Testability** | Facilita a substituição de serviços reais por "Mocks" ou objetos falsos em testes unitários, isolando a lógica de negócio. | Facilitates replacing real services with "Mocks" or fake objects in unit tests, isolating the business logic. |
| ** Flexibilidade / Flexibility** | Permite trocar implementações (ex: de E-mail para SMS) alterando apenas uma única linha de código dentro do Container. | Allows swapping implementations (e.g., from Email to SMS) by changing just a single line of code inside the Container. |
| ** Manutenibilidade / Maintainability** | Mantém o código limpo, organizado e fiel aos princípios **SOLID**, especialmente o Princípio de Inversão de Dependência. | Keeps the code clean, organized, and faithful to **SOLID** principles, especially the Dependency Inversion Principle. |

---

> ** Nota Técnica / Technical Note:** > Ao utilizar esta abordagem, sua aplicação deixa de ser um bloco rígido de código e passa a ser um conjunto de peças modulares que podem ser atualizadas de forma independente.
> 
> By using this approach, your application stops being a rigid block of code and becomes a set of modular pieces that can be updated independently.
> 


##  Como funciona / How it works

**PT-BR:** No `index.php`, o container mapeia a interface ao serviço real. Quando o `EmailNotification` solicita um `ILogger`, o container entrega automaticamente a instância de `ConsoleLogger`.

**EN-US:** In `index.php`, the container maps the interface to the real service. When `EmailNotification` requests an `ILogger`, the container automatically delivers the `ConsoleLogger` instance.

```php
// Exemplo de configuração / Setup example
$container->bind(ILogger::class, fn() => new ConsoleLogger());
$container->bind(INotificationService::class, fn($c) => new EmailNotification($c->get(ILogger::class)));
