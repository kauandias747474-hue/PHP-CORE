#  4) Business Domain Logic 

## 📖 Descrição / Description

**PT-BR:** Esta camada representa o "Coração e Cérebro" da aplicação. Foi reconstruída utilizando os princípios de **Domain-Driven Design (DDD)** e **Programação Defensiva**. O objetivo é garantir que nenhuma regra de negócio seja violada e que os dados sejam blindados contra falhas humanas ou ataques externos antes mesmo de chegarem ao banco de dados.

**EN-US:** This layer represents the "Heart and Brain" of the application. It was rebuilt using **Domain-Driven Design (DDD)** and **Defensive Programming** principles. The goal is to ensure that no business rules are violated and that data is shielded against human error or external attacks even before reaching the database.

---

## 🛠️ Ferramentas e Tecnologias / Tools & Technologies

* **PHP 8.2+**: Uso de tipagem estrita (*strict types*), propriedades somente leitura e promoção de construtor.
* **Composer**: Gestor de dependências e implementação de Autoloading (**PSR-4**).
* **BCRYPT**: Algoritmo de hashing com *salt* nativo para proteção de credenciais.
* **Log Management**: Implementação de escrita em fluxo contínuo para auditoria e rastreabilidade.

---

## 🏗️ Explicação Profunda dos Componentes / Deep Dive into Components

### 1. Value Objects (Objetos de Valor) - "Os Guardiões"
Diferente de strings comuns, eles garantem a **semântica** e a validade do dado desde o nascimento.
* **`Email.php`**: Além da validação de formato (`filter_var`), possui inteligência para rejeitar domínios de e-mails descartáveis e realiza o *sanitization* (limpeza) automático. Isso evita que e-mails mal formatados ou com espaços entrem na camada de persistência.
* **`Password.php`**: Implementa segurança de nível industrial. Utiliza o algoritmo **BCRYPT** aliado a um **Pepper (Pimenta)** — uma chave secreta do lado do servidor que protege os hashes mesmo em caso de vazamento do banco de dados.

### 2. Entities (Entidades) - "A Identidade"
* **`User.php`**: É o objeto principal que possui uma identidade única. Enquanto o e-mail ou nome de um usuário podem mudar, a **Entidade** permanece a mesma. Ela encapsula os Value Objects e define as regras de estado e comportamento do usuário no sistema.

### 3. Services (Serviços de Domínio) - "O Maestro"
* **`UserRegistrationService.php`**: Utilizado para lógicas que não pertencem a um único objeto. Ele orquestra o processo de criação: higieniza o nome do usuário, aplica filtros de restrição (como nomes reservados 'Admin' ou 'Root') e coordena a montagem da Entidade final.

### 4. Exceptions (Diagnóstico Profissional) - "A Voz do Erro"
* **`DomainException.php`**: Substituímos o erro genérico por um **Diagnóstico de Negócio**. Cada exceção agora transporta metadados valiosos:
    * **Campo (Field):** Identifica exatamente qual entrada causou o problema.
    * **Severidade (Severity):** Define se é um erro de validação comum (`LOW`) ou uma falha de segurança/negócio (`CRITICAL`).
    * **Sugestão (Suggestion):** Uma instrução clara e amigável para a correção do erro.

---

## 🐞 Erros Corrigidos & Evoluções / Fixed Bugs & Evolutions

| Erro / Bug | Impacto da Correção / Fix Impact |
| :--- | :--- |
| **Obsessão por Primitivos** | Dados complexos não são mais tratados como strings, reduzindo bugs de validação em 100%. |
| **Senhas Vulneráveis** | Proteção total contra ataques de dicionário e *rainbow tables* via BCRYPT + Pepper. |
| **Silêncio de Erros** | Fim das mensagens genéricas; agora o sistema entrega diagnósticos precisos com sugestões. |
| **Dados Sujos** | Normalização de inputs (trim/lowercase) integrada, garantindo consistência no banco de dados. |
| **Falha de Escopo (finally)** | Correção estrutural onde o bloco `finally` perdia o contexto do loop de execução. |
| **Falta de Auditoria** | Implementação de logs físicos (`app.log`) para conformidade com normas de segurança e LGPD. |

---

## 📂 Estrutura de Pastas / Directory Structure

```text
modulo4php/
├── src/
│   └── Domain/
│       ├── Entities/       # Identidade, Estado e Ciclo de Vida (User.php)
│       ├── ValueObjects/   # Regras de Validação e Segurança (Email.php, Password.php)
│       ├── Services/       # Orquestração de Negócio (UserRegistrationService.php)
│       └── Exceptions/     # Diagnóstico Rico e Customizado (DomainException.php)
├── logs/
│   └── app.log             # Persistência de auditoria e erros de runtime
├── vendor/                 # Dependências gerenciadas pelo Composer (Autoload PSR-4)
├── index.php               # Entry Point: Simulação de cenários e tratamento global
├── composer.json           # Mapeamento de Namespaces e definições do projeto
└── .gitignore              # Proteção para não versionar logs e dependências locais
