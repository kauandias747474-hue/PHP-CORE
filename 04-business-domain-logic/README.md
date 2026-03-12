# 📁 04-business-domain-logic

## 📖 Descrição / Description

**PT-BR:** Esta camada é o "cérebro" da aplicação. Aqui as regras de negócio são definidas de forma pura e isolada. O domínio não depende de bancos de dados, frameworks ou APIs externas. É o código que descreve como o negócio funciona na vida real.
**EN-US:** This layer is the "brain" of the application. Here, business rules are defined in a pure and isolated way. The domain does not depend on databases, frameworks, or external APIs. It is the code that describes how the business works in real life.

---

## 🛠️ Componentes do Domínio / Domain Components

### 1. Entities (Entidades)
**PT-BR:** Classes que representam objetos com identidade única. Elas controlam seu próprio estado e garantem que suas regras internas sejam seguidas.
**EN-US:** Classes representing objects with a unique identity. They control their own state and ensure their internal rules are followed.

### 2. Value Objects (Objetos de Valor)
**PT-BR:** Garantem a validade dos dados (ex: e-mail, CPF, moeda). Um objeto de valor não tem ID; ele é definido pelo que contém. Se o valor for inválido, o objeto nem chega a ser criado.
**EN-US:** They guarantee data validity (e.g., email, tax ID, currency). A value object has no ID; it is defined by its content. If the value is invalid, the object is not even created.

### 3. Service Layer (Serviços de Domínio)
**PT-BR:** Processamento de regras complexas que envolvem múltiplas entidades ou validações que não cabem em um único objeto.
**EN-US:** Processing complex rules involving multiple entities or validations that do not fit into a single object.

---

## 📂 Estrutura de Pastas / Directory Structure



* **`Entities/`**: 
    * **PT-BR:** Ex: `User.php`. Contém as propriedades e comportamentos do usuário.
    * **EN-US:** E.g., `User.php`. Contains user properties and behaviors.
* **`ValueObjects/`**: 
    * **PT-BR:** Ex: `Email.php`. Contém a lógica de validação de formato de e-mail.
    * **EN-US:** E.g., `Email.php`. Contains email format validation logic.
* **`Services/`**: 
    * **PT-BR:** Ex: `RegistrationService.php`. Orquestra a criação de novos usuários seguindo regras de negócio.
    * **EN-US:** E.g., `RegistrationService.php`. Orchestrates new user creation following business rules.

---

## 🚀 Benefícios de Engenharia / Engineering Benefits

* **Independência tecnológica:** O código não quebra se você trocar o banco de dados.
* **Fácil de Testar:** Como é PHP puro, os testes unitários rodam em milissegundos.
* **Expressividade:** O código foca no que o sistema **faz** e não em como ele **salva** os dados.

---

## 🧪 Como Testar / How to Test

**PT-BR:** Para demonstrar a eficácia desta camada, tente criar um usuário com um e-mail inválido. O sistema deve disparar um erro no **Value Object** antes mesmo de qualquer tentativa de salvar no banco. Isso prova que a "inteligência" está protegendo a integridade dos dados.
**EN-US:** To demonstrate this layer's effectiveness, try creating a user with an invalid email. The system should trigger an error in the **Value Object** before any database save attempt. This proves the "intelligence" is protecting data integrity.

---

> *O domínio é o coração do software. Tudo ao redor pode mudar, mas as regras de negócio são o que dão valor ao sistema.*
