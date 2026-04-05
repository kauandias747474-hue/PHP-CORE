# PHP CORE 🐘

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.3">
  <img src="https://img.shields.io/badge/Framework-Laravel%2011%20|%20Octane-ff2d20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel Octane">
  <img src="https://img.shields.io/badge/Runtime-Swoole-ff6c37?style=for-the-badge" alt="Swoole">
  <img src="https://img.shields.io/badge/Architecture-Hexagonal-blue?style=for-the-badge" alt="Architecture">
</p>

---

### 🌐 Overview | Visão Geral do Ecossistema

**EN:** **Octane-Bit-Engine** is more than a boilerplate; it is a high-performance execution engine designed for sub-millisecond response times in distributed environments. It demonstrates the convergence of **Advanced Software Engineering** (Clean Architecture), **Computer Science** (Bitwise Algorithms), and **Modern Runtimes** (Swoole/Octane), creating a robust foundation for financial systems and high-traffic APIs.

**PT:** O **Octane-Bit-Engine** é mais que um boilerplate; é um motor de execução de alta performance projetado para tempos de resposta sub-milissegundos em ambientes distribuídos. Ele demonstra a convergência de **Engenharia de Software Avançada** (Arquitetura Limpa), **Ciência da Computação** (Algoritmos Bitwise) e **Runtimes Modernos** (Swoole/Octane), criando uma base robusta para sistemas financeiros e APIs de alto tráfego.

---

## 💡 Proposta de Valor | Value Proposition

### Por que este projeto é disruptivo? | Why is this project disruptive?

**1. Break the FPM Cycle:** Traditional PHP-FPM destroys and rebuilds the application state on every request. **Octane-Bit-Engine** stays in memory, utilizing **Connection Pooling** for databases and keeping the Dependency Injection container "warm" for instant execution.

**2. Low-Level Efficiency in a High-Level Language:**
By implementing **Bitwise Flag Management**, we handle complex permission matrices and system states using integer math instead of heavy relational lookups or object-heavy arrays, optimizing L1/L2 cache usage in the CPU.

**3. Infrastructure-Agnostic Core:**
The business logic is strictly decoupled. You can swap the delivery mechanism (API, CLI, RoadRunner) or the persistence layer without touching the core `04-business-domain-logic`.

---

## 🏗️ Pilares de Engenharia | Engineering Pillars

### 🧠 Performance & Memory Strategy
* **Bitwise Operations:** Utilização de operadores binários para compactação de dados. Ex: Gerenciar 32 permissões de usuário em um único campo `integer` de 4 bytes.
* **Big O Awareness:** Estruturas de dados selecionadas para garantir que o crescimento da massa de dados não degrade a latência (foco em $O(1)$).
* **Garbage Collector Tuning:** Estratégias para minimizar ciclos de GC em processos de longa duração (Long-running processes).

### 🛡️ Security-First Architecture
* **Cryptographic Rigor:** Implementação de **AES-256-GCM** (Authenticated Encryption), garantindo não apenas o sigilo, mas a integridade dos dados cifrados.
* **Mass Assignment Defense:** Uso estrito de **DTOs (Data Transfer Objects)** e **Value Objects** para impedir vulnerabilidades de atribuição em massa.
* **Input Sanitization:** Camada de defesa ativa contra injeção em todos os pontos de entrada (API/CLI).

---

## 📂 Arquitetura do Projeto | Project Structure

A organização numerada reflete o fluxo de dependência (Camadas externas não podem afetar o Core):

* **`1-kernel-and-autoloader`**: O "Coração". Bootstrapping de alta performance, tratamento de erros resiliente e registro de Service Providers.
* **`02-service-abstraction-and-di`**: O "Cérebro". Abstração total de contratos via Interfaces. Implementa o **Dependency Inversion Principle (DIP)**.
* **`03-data-persistence-mysql`**: A "Memória". Camada PDO otimizada. Foco em transações atômicas e performance bruta em queries SQL.
* **`04-business-domain-logic`**: O "Espírito". Lógica pura. Nada de frameworks aqui. Apenas regras que ditam como o negócio funciona.
* **`05-utility-and-helpers`**: As "Ferramentas". Utilitários de sistema, manipulação de buffers e segurança criptográfica.
* **`06-infrastructure-services`**: Os "Braços". Integrações externas (AWS SDK, Mailers, RabbitMQ). Onde o motor se conecta ao mundo.
* **`07-frontend-integration`**: A "Voz". Transformadores de saída, serialização JSON otimizada e adapters de interface.
* **`08-api-and-routing`**: Os "Sentidos". Orquestração de rotas ultra-veloz via `FastRoute` e gestão de Middlewares.
* **`09-quality-and-testing`**: O "Escudo". Testes de Mutação (`Infection`), Testes de Arquitetura e TDD rigoroso.

---

## 🛠️ Stack Tecnológica de Elite

| Categoria | Tecnologia | Diferencial Técnico |
| :--- | :--- | :--- |
| **Engine** | **PHP 8.3 (JIT Enabled)** | Uso de Just-In-Time compilation para tarefas intensivas de CPU. |
| **High-Perf** | **Swoole / Octane** | Corrotinas para I/O assíncrono e paralelismo real. |
| **Framework** | **Laravel 11 / Symfony** | Apenas os componentes essenciais para máxima agilidade. |
| **Testing** | **Pest PHP & Infection** | Testes de mutação para garantir que os testes são à prova de falhas. |
| **Static Analysis** | **PHPStan Lvl 9** | Máximo rigor de tipagem, eliminando `null pointer exceptions`. |

---

## 👨‍💻 Author | Autoria
**Kauan Oliveira** - *Systems & Security Engineer*

**EN:** Specialist in high-availability systems, performance tuning, and technical sovereignty. Focused on building backends that don't just work, but scale with engineering precision.  
**PT:** Especialista em sistemas de alta disponibilidade, tuning de performance e soberania técnica. Focado em construir backends que não apenas funcionam, mas escalam com precisão de engenharia.

### 📩 Contact / Contato
- **LinkedIn:** [Kauan Oliveira](https://www.linkedin.com/in/kauan-oliveira-324264378/)
- **GitHub:** [kauandias747474-hue](https://github.com/kauandias747474-hue)

---
