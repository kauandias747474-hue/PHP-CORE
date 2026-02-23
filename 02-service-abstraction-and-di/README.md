# 📁 02-service-abstraction-and-di

## 📖 Descrição / Description

**PT-BR:** Esta camada é responsável pelo gerenciamento de dependências e inversão de controle (IoC). Em vez de instanciar classes manualmente em todo o projeto, utilizamos um **Service Container** que resolve e injeta as dependências necessárias. Isso garante que o sistema seja testável, flexível e siga o princípio da inversão de dependência (D do SOLID).

**EN-US:** This layer is responsible for dependency management and Inversion of Control (IoC). Instead of manually instantiating classes throughout the project, we use a **Service Container** that resolves and injects the required dependencies. This ensures the system is testable, flexible, and follows the Dependency Inversion Principle (D in SOLID).

---

## 🛠️ Componentes Principais / Key Components

### 1. Service Container
O coração da pasta. Um objeto central que armazena a "receita" de como criar cada serviço da aplicação. Ele permite o uso de **Singletons** para economizar memória em serviços globais (como conexão com banco de dados).

### 2. Dependency Injection (DI)
Mecanismo que entrega as instâncias necessárias para os construtores das classes de serviço e repositórios, eliminando o acoplamento rígido (*hard-coding*).

### 3. Service Contracts (Interfaces)
Definição de interfaces que servem como "contratos". A lógica de negócio depende da interface, não da implementação real, permitindo trocar componentes (ex: trocar envio de e-mail via SMTP por API externa) sem alterar o código principal.

---

## 🚀 Benefícios de Engenharia / Engineering Benefits

* **Testabilidade:** Facilita a substituição de serviços reais por "Mocks" durante os testes unitários.
* **Desacoplamento:** A lógica de negócio (`04-business-domain-logic`) não precisa saber como os serviços de infraestrutura são criados.
* **Manutenibilidade:** Alterações na forma como um objeto é construído são feitas em um único lugar (no Container).

---

## 💻 Exemplo de Uso / Usage Example

```php
// Registro de um serviço no Container
$container->set(UserRepositoryInterface::class, function($c) {
    return new MySQLUserRepository($c->get(PDO::class));
});

// Resolução automática
$userService = $container->get(UserService::class);
