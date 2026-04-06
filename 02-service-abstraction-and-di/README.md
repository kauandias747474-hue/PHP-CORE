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
| **Testabilidade / Testability** | Facilita a substituição de serviços reais por "Mocks" ou objetos falsos em testes unitários, isolando a lógica de negócio. | Facilitates replacing real services with "Mocks" or fake objects in unit tests, isolating the business logic. |
| **Flexibilidade / Flexibility** | Permite trocar implementações (ex: de E-mail para SMS) alterando apenas uma única linha de código dentro do Container. | Allows swapping implementations (e.g., from Email to SMS) by changing just a single line of code inside the Container. |
| **Manutenibilidade / Maintainability** | Mantém o código limpo, organizado e fiel aos princípios **SOLID**, especialmente o Princípio de Inversão de Dependência. | Keeps the code clean, organized, and faithful to **SOLID** principles, especially the Dependency Inversion Principle. |

---
## Integração dos Componentes / Component Integration

**PT-BR:** A "mágica" deste projeto acontece na resolução de dependências. Quando o sistema solicita um serviço de notificação, o `ServiceContainer` realiza um processo em cadeia:
1. Ele identifica que a classe `EmailNotification` precisa de um `ILogger` para ser criada.
2. O Container busca em seu mapa interno qual classe concreta está "assinando" o contrato `ILogger` (neste caso, o `ConsoleLogger`).
3. Ele instancia o `ConsoleLogger` primeiro e o injeta no construtor da `EmailNotification`.
4. Por fim, ele entrega o serviço de notificação pronto para uso, com todas as suas ferramentas internas já montadas.

**EN-US:**
The "magic" of this project happens in dependency resolution. When the system requests a notification service, the `ServiceContainer` performs a chain process:
1. It identifies that the `EmailNotification` class needs an `ILogger` to be created.
2. The Container looks up in its internal map which concrete class is "signing" the `ILogger` contract (in this case, `ConsoleLogger`).
3. It instantiates `ConsoleLogger` first and injects it into the `EmailNotification` constructor.
4. Finally, it delivers the notification service ready for use, with all its internal tools already assembled.


> **Nota Técnica / Technical Note:** > Ao utilizar esta abordagem, sua aplicação deixa de ser um bloco rígido de código e passa a ser um conjunto de peças modulares que podem ser atualizadas de forma independente.
> 
> By using this approach, your application stops being a rigid block of code and becomes a set of modular pieces that can be updated independently.
>

---

## Por que este projeto é interessante? / Why is this project interesting?

**PT-BR:**
Achei este projeto fascinante porque ele toca no coração da engenharia de software moderna. Estudar **Abstração e DI** (Injeção de Dependência) é interessante por três motivos principais:
* **Liberdade de Escolha:** Entendi que o código não deve ficar "preso" a uma ferramenta. Se eu quiser mudar o log do Console para um Banco de Dados, mudo apenas a implementação, não o sistema todo.
* **Domínio do Framework:** Frameworks como Laravel e Symfony usam esses mesmos conceitos. Criar um container manualmente me deu a clareza de como as grandes ferramentas funcionam por "baixo do capô".
* **Código Profissional:** Este projeto marca a transição de um "escritor de scripts" para um "arquiteto de sistemas", focando em escalabilidade e organização de alto nível.

**EN-US:**
I found this project fascinating because it touches the heart of modern software engineering. Studying **Abstraction and DI** is interesting for three main reasons:
* **Freedom of Choice:** I realized that code shouldn't be "trapped" by a tool. If I want to change the log from Console to a Database, I only change the implementation, not the entire system.
* **Framework Mastery:** Frameworks like Laravel and Symfony use these same concepts. Creating a container manually gave me clarity on how big tools work "under the hood".
* **Professional Code:** This project marks the transition from a "script writer" to a "systems architect," focusing on high-level scalability and organization.
  
---

##  Como funciona / How it works

**PT-BR:** No `index.php`, o container mapeia a interface ao serviço real. Quando o `EmailNotification` solicita um `ILogger`, o container entrega automaticamente a instância de `ConsoleLogger`.

**EN-US:** In `index.php`, the container maps the interface to the real service. When `EmailNotification` requests an `ILogger`, the container automatically delivers the `ConsoleLogger` instance.

```php
// Exemplo de configuração / Setup example
$container->bind(ILogger::class, fn() => new ConsoleLogger());
$container->bind(INotificationService::class, fn($c) => new EmailNotification($c->get(ILogger::class)));
