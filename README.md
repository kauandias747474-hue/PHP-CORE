# PHP CORE 🐘 

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.3">
  <img src="https://img.shields.io/badge/Architecture-Pure%20Core-blue?style=for-the-badge" alt="Pure PHP Core">
  <img src="https://img.shields.io/badge/Pattern-Clean%20Architecture-darkgreen?style=for-the-badge" alt="Clean Arch">
  <img src="https://img.shields.io/badge/Standard-PSR--4%20%26%20PSR--7-orange?style=for-the-badge" alt="PSR Standards">
</p>

---

### 🌐 Overview | Visão Geral do Ecossistema

**EN:** This project is a rigorous exploration of **Pure PHP Core**, designed to demonstrate that high-level software engineering does not require heavy frameworks to be scalable, secure, and efficient. Instead of using "magic" shortcuts, every component—from the custom **PSR-4 Autoloader** and **Dependency Injection Container** to the **Front Controller** and **Routing Engine**—was built from the ground up. 

The architecture follows **Clean Architecture** and **Domain-Driven Design (DDD)** principles, ensuring that business logic remains isolated from infrastructure concerns. It serves as a high-performance execution engine capable of handling complex data persistence (ACID), resilient external service integrations (AWS S3, Stripe, SendGrid), and rigorous automated testing, all while maintaining sub-millisecond overhead by staying close to the PHP binary.

**PT:** Este projeto é uma exploração rigorosa do **PHP Core Puro**, projetado para demonstrar que a engenharia de software de alto nível não requer frameworks pesados para ser escalável, segura e eficiente. Em vez de utilizar atalhos "mágicos", cada componente — desde o **Autoloader PSR-4** e o **Container de Injeção de Dependência** até o **Front Controller** e o **Motor de Roteamento** — foi construído do zero.

A arquitetura segue os princípios de **Clean Architecture** e **Domain-Driven Design (DDD)**, garantindo que a lógica de negócio permaneça isolada das preocupações de infraestrutura. O sistema funciona como um motor de execução de alta performance capaz de lidar com persistência de dados complexos (ACID), integrações resilientes de serviços externos (AWS S3, Stripe, SendGrid) e testes automatizados rigorosos, tudo isso mantendo um overhead de sub-milissegundos por operar próximo ao binário nativo do PHP.



---

### 🚀 Pilares Técnicos | Technical Pillars

* **Zero Framework Dependency:** Independência total de pacotes externos para o core da aplicação.
* **Decoupled Infrastructure:** Camadas de abstração que permitem trocar serviços de e-mail ou storage sem alterar uma linha de lógica de negócio.
* **Defensive Programming:** Uso de *Value Objects* e *Strict Typing* para garantir a integridade dos dados desde a entrada.
* **Quality First:** Suíte de testes (Unit & Integration) com uso de *Mocks* para garantir estabilidade e previsibilidade.

# 💡 Proposta de Valor | Value Proposition

Como o projeto é focado em **PHP Core Puro**, a proposta de valor foi ajustada para destacar a construção das fundações que os frameworks geralmente ocultam. O diferencial reside em provar que é possível obter alta performance e organização rigorosa sem o "bloat" (excesso) de dependências externas. As referências a nomes anteriores e ciclos de frameworks foram removidas para focar em **Arquitetura de Baixo Nível** e no **Controle Total do Estado**.

---

### Por que este projeto é um diferencial? | Why is this project a standout?

**1. Foundation Mastery (Zero-Magic Policy)**
* **PT:** Diferente de aplicações que dependem de "magia" de frameworks, este projeto expõe as entranhas do PHP. Ao construir o próprio **Service Container** e **Router**, o sistema elimina o overhead de milhares de arquivos desnecessários, resultando em uma execução limpa e previsível.
* **EN:** Unlike applications that rely on framework "magic," this project exposes PHP's inner workings. By building a custom **Service Container** and **Router**, the system eliminates the overhead of thousands of unnecessary files, resulting in clean and predictable execution.

**2. Low-Level Efficiency & Bitwise Logic**
* **PT:** Implementamos gestão de estados e permissões via **Operações Bitwise**. Ao usar matemática de inteiros em vez de buscas relacionais pesadas ou arrays complexos, otimizamos o uso do cache L1/L2 da CPU, trazendo conceitos de Ciência da Computação para o alto nível do PHP.
* **EN:** We implemented state and permission management via **Bitwise Operations**. By using integer math instead of heavy relational lookups or complex arrays, we optimize CPU L1/L2 cache usage, bringing Computer Science concepts to high-level PHP.

**3. Architectural Sovereignty (Agnostic Core)**
* **PT:** A lógica de negócio reside no núcleo `04-business-domain-logic`, totalmente isolada. Isso significa que o sistema é soberano: você pode trocar o banco de dados, o servidor web ou a forma de entrega (API/CLI) sem alterar uma única regra de negócio.
* **EN:** The business logic resides in the `04-business-domain-logic` core, completely isolated. This means the system has architectural sovereignty: you can swap the database, web server, or delivery method (API/CLI) without changing a single business rule.

---

### 🛠️ O que foi refinado:

* **Foco no "Zero-Magic":** O valor agora está em entender o que acontece por baixo do capô, algo extremamente valorizado para cargos de nível Pleno/Sênior.
* **Eficiência Bitwise:** Mantivemos este ponto, pois ele demonstra domínio de Ciência da Computação aplicado ao PHP nativo.
* **Soberania Técnica:** Substituímos "Infrastructure-Agnostic" por "Soberania", reforçando que o desenvolvedor é o dono da arquitetura, e não o framework.

---

---

## 🏗️ Pilares de Engenharia | Engineering Pillars

### 🧠 Performance & Memory Strategy
* **Bitwise Operations:** * **PT:** Utilização de operadores binários para compactação extrema de dados. Ex: Gerenciamento de matrizes de permissão complexas em um único campo `integer`, reduzindo o consumo de memória e acelerando a comparação lógica.
  * **EN:** Use of binary operators for extreme data compaction. Ex: Managing complex permission matrices in a single `integer` field, reducing memory footprint and accelerating logical comparisons.
* **Big O Awareness ($O(1)$ Focus):** * **PT:** Seleção rigorosa de estruturas de dados e algoritmos para garantir que a latência permaneça constante, independentemente do crescimento do volume de dados.
  * **EN:** Rigorous selection of data structures and algorithms to ensure latency remains constant, regardless of data volume growth.
* **Long-Running Process Optimization:** * **PT:** Estratégias de gerenciamento de memória voltadas para processos de longa duração, minimizando ciclos de Garbage Collection e prevenindo *memory leaks* em execuções via CLI/Daemon.
  * **EN:** Memory management strategies for long-running processes, minimizing Garbage Collection cycles and preventing memory leaks in CLI/Daemon executions.

### 🛡️ Security-First Architecture
* **Cryptographic Sovereignty (AES-256-GCM + Pepper):** * **PT:** Implementação de criptografia autenticada de alto nível e hashing de senhas com estratégia de *Pepper* (segredo do servidor), garantindo integridade e sigilo contra ataques de dicionário.
  * **EN:** Implementation of high-level authenticated encryption and password hashing with a *Pepper* strategy (server secret), ensuring integrity and secrecy against dictionary attacks.
* **Strict Defensive Layer (DTOs & Value Objects):** * **PT:** Blindagem total contra *Mass Assignment* e estados inválidos. Os dados são validados e tipados rigidamente via **Value Objects** antes de atingirem o núcleo do sistema.
  * **EN:** Total shield against Mass Assignment and invalid states. Data is strictly validated and typed via **Value Objects** before reaching the system core.
* **Multi-Vector Input Sanitization:** * **PT:** Camada de defesa ativa e profunda contra Injeção (SQL, XSS, Command) em todos os pontos de entrada, utilizando filtragem nativa e *Prepared Statements*.
  * **EN:** Deep, active defense layer against Injections (SQL, XSS, Command) at all entry points, using native filtering and Prepared Statements.

---


## 📂 Arquitetura do Projeto | Project Structure

A organização segue uma hierarquia rigorosa de dependências. As camadas externas são isoladas através de interfaces, garantindo que o **Core** da aplicação seja imutável, testável e independente de tecnologias de terceiros.

* **`01-kernel-and-autoloader`** — **The Heart (Life Cycle Management)**
  * **PT:** Responsável pelo *Bootstrapping* de alta performance. Implementa o motor de carregamento automático (**PSR-4**) e o capturador global de exceções (**Security Shield**), garantindo que o ciclo de vida da aplicação inicie de forma segura e resiliente.
  * **EN:** Responsible for high-performance *Bootstrapping*. Implements the **PSR-4** autoloading engine and a global exception handler (**Security Shield**), ensuring the application lifecycle starts securely and resiliently.

* **`02-service-abstraction-and-di`** — **The Brain (Inversion of Control)**
  * **PT:** Gerencia o **Container de Serviços**. Implementa o Princípio de Inversão de Dependência (**DIP**), onde as classes dependem de abstrações (Interfaces), permitindo um sistema totalmente desacoplado e facilitando a substituição de componentes.
  * **EN:** Manages the **Service Container**. Implements the Dependency Inversion Principle (**DIP**), where classes rely on abstractions (Interfaces), enabling a fully decoupled system and facilitating component replacement.

* **`03-data-persistence-mysql`** — **The Memory (Persistence Layer)**
  * **PT:** Camada de infraestrutura de banco de dados. Utiliza o padrão **Repository** e **Transaction Managers** para garantir a integridade **ACID**. Foco em *Prepared Statements* nativos para blindagem absoluta contra SQL Injection.
  * **EN:** Database infrastructure layer. Utilizes the **Repository** pattern and **Transaction Managers** to ensure **ACID** integrity. Focused on native *Prepared Statements* for absolute SQL Injection shielding.

* **`04-business-domain-logic`** — **The Spirit (Domain-Driven Design)**
  * **PT:** O núcleo puro da aplicação. Utiliza **Value Objects** e **Entidades** para encapsular regras de negócio. O código é 100% agnóstico a drivers externos, focado em **Programação Defensiva** e invariantes de domínio.
  * **EN:** The pure core of the application. Uses **Value Objects** and **Entities** to encapsulate business rules. The code is 100% agnostic to external drivers, focused on **Defensive Programming** and domain invariants.

* **`05-utility-and-helpers`** — **The Tools (Technical Support)**
  * **PT:** Provê ferramentas transversais: validadores matemáticos, formatadores de localização (Brasil) e utilitários de sistema. Centraliza funções auxiliares que suportam o desenvolvimento sem poluir a lógica de negócio.
  * **EN:** Provides cross-cutting tools: mathematical validators, localization formatters, and system utilities. Centralizes helper functions that support development without polluting business logic.

* **`06-infrastructure-services`** — **The Arms (External Integrations)**
  * **PT:** Camada de integração com o mundo real. Abstrai serviços complexos como **AWS S3** para armazenamento, **SendGrid** para mensageria transacional e sistemas de log em fluxo contínuo para auditoria.
  * **EN:** Integration layer with the real world. Abstracts complex services such as **AWS S3** for storage, **SendGrid** for transactional messaging, and continuous stream logging systems for auditing.

* **`07-frontend-integration`** — **The Voice (View Engine & Presenters)**
  * **PT:** Engenharia de saída de dados. Implementa um motor de renderização customizado e **Presenters** que desacoplam a lógica de exibição, permitindo alternar entre respostas HTML e JSON de forma transparente.
  * **EN:** Data output engineering. Implements a custom rendering engine and **Presenters** that decouple display logic, allowing seamless switching between HTML and JSON responses.

* **`08-api-and-routing`** — **The Senses (Front Controller & Routing)**
  * **PT:** Orquestração de entrada e segurança de tráfego. Utiliza um **Dispatcher** centralizado e camadas de **Middleware** para validação de tokens e filtragem de requisições antes do processamento nos Controllers.
  * **EN:** Input orchestration and traffic security. Utilizes a centralized **Dispatcher** and **Middleware** layers for token validation and request filtering before Controller processing.

* **`09-quality-and-testing`** — **The Shield (Reliability Layer)**
  * **PT:** Camada de garantia de qualidade. Suíte de testes automatizados focada em **Unidade** e **Integração**, utilizando **Mocks** para isolar dependências externas e garantir 100% de previsibilidade no comportamento do motor.
  * **EN:** Quality assurance layer. Automated testing suite focused on **Unit** and **Integration**, utilizing **Mocks** to isolate external dependencies and ensure 100% predictability in engine behavior.




---


## 🛠️ Stack Tecnológica de Elite | Elite Tech Stack

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.3">
  <img src="https://img.shields.io/badge/Composer-2.7+-006191?style=for-the-badge&logo=composer&logoColor=white" alt="Composer">
  <img src="https://img.shields.io/badge/Standard-PSR--4-orange?style=for-the-badge" alt="PSR-4">
  <img src="https://img.shields.io/badge/Database-MySQL%208-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Security-AES--256--GCM-red?style=for-the-badge" alt="Security">
</p>

| Categoria | Tecnologia | Diferencial Técnico |
| :--- | :--- | :--- |
| **Engine** | **PHP 8.3 (Strict Types)** | Uso de tipagem estrita, *Readonly Properties* e *Constructor Promotion* para código limpo e imutável. |
| **Dependency Manager** | **Composer (PSR-4)** | Motor de orquestração de namespaces e autoloading otimizado, eliminando a necessidade de `requires` manuais. |
| **Architecture** | **Clean Architecture** | Independência total de frameworks; o Core da aplicação é isolado, soberano e altamente testável. |
| **Persistence** | **Native PDO (ACID)** | Gestão de transações atômicas e proteção nativa contra Injeção SQL sem o overhead de ORMs pesados. |
| **Security** | **OpenSSL & BCRYPT** | Criptografia de nível industrial com estratégia de *Salt* e *Pepper* para proteção de dados sensíveis. |
| **Infrastructure** | **Docker Ecosystem** | Containerização completa para garantir paridade entre ambientes de desenvolvimento e produção. |
| **Testing** | **Testing Suite (Mocks)** | Implementação de Dublês de Teste e Mocks para validar lógica de domínio sem dependência de infraestrutura. |
| **Analysis** | **Static Analysis** | Garantia de integridade do código através de verificação estática de tipos e detecção de *Dead Code*. |

---

### 📦 O Coração da Infraestrutura: Composer & PSR-4

Diferente de projetos básicos, aqui o **Composer** não é apenas um gerenciador de pacotes, mas a peça central que habilita a arquitetura modular:

* **Autoloading Otimizado:** Configuração manual do `composer.json` para mapear cada um dos 9 módulos diretamente, garantindo que o PHP localize as classes com máxima eficiência de I/O.
* **Decoupled Modules:** O Composer permite que a camada de infraestrutura (ex: AWS, Stripe) seja tratada como um serviço acoplável, mantendo o `04-business-domain-logic` sempre puro.
* **Standards Compliance:** Rigorosa adesão ao padrão **PSR-4**, alinhando o projeto com as melhores práticas da comunidade global de PHP (**PHP-FIG**).

---



## 👨‍💻 Author | Autoria

**Kauan Oliveira** *Software Engineer | PHP Specialist*

**PT:** Desenvolvedor focado em arquitetura de software, alta performance e sistemas robustos. Especialista em construir soluções escaláveis utilizando PHP Core e princípios sólidos de engenharia.

**EN:** Software Developer focused on architecture, high performance, and robust systems. Specialist in building scalable solutions using PHP Core and solid engineering principles.

---

### 📩 Contact / Contato
- **LinkedIn:** [Kauan Oliveira](https://www.linkedin.com/in/kauan-oliveira-324264378/)
- **GitHub:** [kauandias747474-hue](https://github.com/kauandias747474-hue)

---
