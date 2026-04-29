#  4) Business Domain Logic 

##  Descrição / Description

**PT-BR:** Esta camada representa o "Coração e Cérebro" da aplicação. Foi reconstruída utilizando os princípios de **Domain-Driven Design (DDD)** e **Programação Defensiva**. O objetivo é garantir que nenhuma regra de negócio seja violada e que os dados sejam blindados contra falhas humanas ou ataques externos antes mesmo de chegarem ao banco de dados.

**EN-US:** This layer represents the "Heart and Brain" of the application. It was rebuilt using **Domain-Driven Design (DDD)** and **Defensive Programming** principles. The goal is to ensure that no business rules are violated and that data is shielded against human error or external attacks even before reaching the database.

---

##  Ferramentas e Tecnologias / Tools & Technologies

* **PHP 8.2+**: Uso de tipagem estrita (*strict types*), propriedades somente leitura e promoção de construtor.
* **Composer**: Gestor de dependências e implementação de Autoloading (**PSR-4**).
* **BCRYPT**: Algoritmo de hashing com *salt* nativo para proteção de credenciais.
* **Log Management**: Implementação de escrita em fluxo contínuo para auditoria e rastreabilidade.

---

##  Explicação Profunda dos Componentes / Deep Dive into Components

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

##  Erros Corrigidos & Evoluções / Fixed Bugs & Evolutions

| Erro / Bug | Impacto da Correção / Fix Impact |
| :--- | :--- |
| **Obsessão por Primitivos** | Dados complexos não são mais tratados como strings, reduzindo bugs de validação em 100%. |
| **Senhas Vulneráveis** | Proteção total contra ataques de dicionário e *rainbow tables* via BCRYPT + Pepper. |
| **Silêncio de Erros** | Fim das mensagens genéricas; agora o sistema entrega diagnósticos precisos com sugestões. |
| **Dados Sujos** | Normalização de inputs (trim/lowercase) integrada, garantindo consistência no banco de dados. |
| **Falha de Escopo (finally)** | Correção estrutural onde o bloco `finally` perdia o contexto do loop de execução. |
| **Falta de Auditoria** | Implementação de logs físicos (`app.log`) para conformidade com normas de segurança e LGPD. |

---
##  Por que esta abordagem é interessante? / Why this approach is interesting?

**PT-BR:**
O que torna este projeto especial não é apenas o código PHP, mas a mentalidade de **Arquitetura de Software** aplicada. Durante o desenvolvimento, foquei em resolver problemas reais de engenharia:

1.  **Blindagem de Dados:** Achei fascinante como o uso de *Value Objects* impede que o sistema aceite dados "sujos". O erro é barrado na fronteira, economizando processamento e evitando corrupção no banco de dados.
2.  **Criptografia como Estratégia:** A implementação do **Pepper (Pimenta)** junto ao BCRYPT foi um divisor de águas. Entendi que segurança não é apenas esconder uma senha, mas criar camadas que tornam o trabalho do atacante matematicamente inviável.
3.  **Comunicação Clara via Exceptions:** Geralmente, Exceptions são vistas como "o sistema quebrou". Aqui, elas foram transformadas em uma ferramenta de comunicação rica (Diagnósticos), que diz exatamente o que aconteceu e como consertar.
4.  **Desacoplamento Real:** É incrível ver que as regras de negócio (o "Cérebro") estão totalmente isoladas. Se amanhã eu decidir mudar de um banco MySQL para um MongoDB, ou de um servidor Apache para Nginx, o coração do meu negócio continua intacto e funcional.

**EN-US:**
What makes this project special is not just the PHP code, but the **Software Architecture** mindset applied. During development, I focused on solving real engineering problems:

1.  **Data Shielding:** I found it fascinating how using *Value Objects* prevents the system from accepting "dirty" data. The error is blocked at the border, saving processing power and avoiding database corruption.
2.  **Cryptography as a Strategy:** Implementing **Pepper** alongside BCRYPT was a game-changer. I realized that security isn't just about hiding a password, but about creating layers that make an attacker's job mathematically unfeasible.
3.  **Clear Communication via Exceptions:** Usually, Exceptions are seen as "the system broke." Here, they were transformed into a rich communication tool (Diagnostics) that says exactly what happened and how to fix it.
4.  **True Decoupling:** It's amazing to see that the business rules (the "Brain") are completely isolated. If tomorrow I decide to switch from a MySQL database to MongoDB, or from an Apache server to Nginx, the heart of my business remains intact and functional.

---

##  O que aprendi nesta jornada / What I learned in this journey

* **Clean Code:** Menos `if/else` espalhados e mais objetos inteligentes.
* **PSR-4:** A importância de padrões de organização para projetos escaláveis.
* **Security First:** Validar, higienizar e criptografar são passos não negociáveis.
* **Responsabilidade Única (SRP):** Cada classe faz apenas uma coisa e a faz com excelência.


##  Estrutura de Pastas / Directory Structure

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
